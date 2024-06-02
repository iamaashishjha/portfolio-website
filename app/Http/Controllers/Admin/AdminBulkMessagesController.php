<?php

namespace App\Http\Controllers\Admin;

use App\Models\Types;
use App\Models\Member;
use App\Models\BulkMessage;
use Illuminate\Http\Request;
use App\Mail\BulkMessageMail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBulkMessagesController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = BulkMessage::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['bulkMessages'] = $this->model::all();
        foreach ($this->data['bulkMessages'] as $msg) {
            $members = Member::findMany($msg->members);
            $emailArr = $members->pluck('email')->toArray();
            $phoneNumberArr = $members->pluck('phone_number')->toArray();
            $msg->email = $emailArr;
            $msg->phone_number = $phoneNumberArr;
        }
        $this->data['members'] = Member::all();
        // dd($this->data['bulkMessages']);
        return view('ar.bulk-message.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        $this->data['members'] = Member::all();
        $this->data['types'] = Types::whereIn('id', [1,2])->get();
        return view('ar.bulk-message.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emailArr = [];
        $phoneNumberArr = [];

        $members = $request->members;

        foreach ($request->members as $memeberId) {
            $member = Member::find($memeberId);
            $emailArr[] = $member->email;
            $phoneNumberArr[] = $member->phone_number;
        }
        $this->checkPermission('create');
        $modelInstance = new $this->model();
        $modelInstance->title = $request->title;
        $modelInstance->content = $request->content;
        $modelInstance->members = $members;
        $modelInstance->medium = $request->medium;
        $modelInstance->save();

        $mediums = $request->medium;
        foreach ($mediums as $medium) {
            if ($medium == Types::EMAIL) {
                dispatch(new \App\Jobs\SendBulkMessageMailJob($modelInstance, $members));
            }elseif($medium == Types::MOBILE){
                dispatch(new \App\Jobs\SendBulkMessageMobileMessageJob($modelInstance, $members));
            }else{
                return;
            }
        }
        Alert::success('Bulk Message Created and Sent Successfully');
        return redirect()->route('admin.bulk-message.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkPermission('update');
        $this->data['bulkMessage'] = $this->model::find($id);
        $this->data['members'] = Member::all();
        $this->data['types'] = Types::whereIn('id', [1,2])->get();
        return view('ar.bulk-message.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $emailArr = [];
        $phoneNumberArr = [];

        foreach ($request->members as $memeberId) {
            $member = Member::find($memeberId);
            $emailArr[] = $member->email;
            $phoneNumberArr[] = $member->phone_number;
        }
        $this->checkPermission('update');
        $modelInstance = $this->model::find($id);
        $modelInstance->title = $request->title;
        $modelInstance->content = $request->content;
        $modelInstance->email = $emailArr;
        $modelInstance->phone_number = $phoneNumberArr;
        $modelInstance->medium = $request->medium;
        $modelInstance->save();

        $mediums = $request->medium;
        foreach ($mediums as $medium) {
            if ($medium == Types::EMAIL) {
                dispatch(new \App\Jobs\SendBulkMessageMailJob($modelInstance, $emailArr));
            }elseif($medium == Types::MOBILE){
                dispatch(new \App\Jobs\SendBulkMessageMailJob($modelInstance, $emailArr));
            }else{
                return;
            }
        }
        Alert::success('Bulk Message Updated Successfully');
        return redirect()->route('admin.bulk-message.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkPermission('delete');
        $modelInstance = $this->model::find($id);
        $filePath = $modelInstance->file;
        if (File::exists($filePath)) {
            unlink($filePath);
            $modelInstance->deleteImage();
        }
        $modelInstance->delete();
        Alert::success('Bulk Message Deleted Successfully');
        return redirect()->back();
    }
}
