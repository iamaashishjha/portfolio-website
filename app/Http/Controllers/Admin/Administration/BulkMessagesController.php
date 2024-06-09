<?php

namespace App\Http\Controllers\Admin\Administration;

use App\Models\Types;
use App\Models\Member;
use App\Models\BulkMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;

class BulkMessagesController extends BaseAdminController
{
    protected $model, $repo, $context;

    public function __construct(BulkMessage $model)
    {
        parent::__construct($model);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $this->checkPermission('list');
            $this->data['bulkMessages'] = $this->repo->index()->transform(function ($item) {
                $members = Member::findMany($item->members);
                $emailArr = $members->pluck('email')->toArray();
                $phoneNumberArr = $members->pluck('phone_number')->toArray();
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'status' => $item->status,
                    'content' => $item->content,
                    'created_by' => $item->createdByEntity->name,
                    'created_at' => $item->created_at->format('d-M-Y'),
                    'email' => $emailArr,
                    'phone_number' => $phoneNumberArr,
                ];
            });
            $this->data['members'] = Member::all();
            return view('ar.bulk-message.index', $this->data);
        } catch (\Exception $ex) {
            Log::error($this->context . "@index => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $this->checkPermission('create');
            $this->data['members'] = Member::all();
            $this->data['types'] = Types::whereIn('id', [1, 2])->get();
            return view('ar.bulk-message.form', $this->data);
        } catch (\Exception $ex) {
            Log::error($this->context . "@create => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
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
            } elseif ($medium == Types::MOBILE) {
                dispatch(new \App\Jobs\SendBulkMessageMobileMessageJob($modelInstance, $members));
            } else {
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
        $this->data['types'] = Types::whereIn('id', [1, 2])->get();
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
            } elseif ($medium == Types::MOBILE) {
                dispatch(new \App\Jobs\SendBulkMessageMailJob($modelInstance, $emailArr));
            } else {
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
