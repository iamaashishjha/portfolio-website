<?php

namespace App\Http\Controllers\Admin\Leadership;

use App\Models\Leadership;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;

class LeadershipController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = Leadership::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['leaderships'] =  $this->model::all();
        return view('ar.leadership.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['members'] = TeamMember::all();
        return view('ar.leadership.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkPermission('create');
        $members = $request->members;
        $modelInstance = new $this->model();
        $modelInstance->title = $request->title;
        $modelInstance->description = $request->description;
        // $modelInstance->members = $members;
        $modelInstance->save();
        Alert::success('Leadership Created Successfully');
        return redirect()->route('admin.leadership.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['members'] = TeamMember::all();
        $this->data['leadership'] =  $this->model::find($id);
        return view('ar.leadership.form', $this->data);
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
        $this->checkPermission('create');
        $members = $request->members;
        $modelInstance = $this->model::find($id);
        $modelInstance->title = $request->title;
        $modelInstance->description = $request->description;
        $modelInstance->members = $members;
        $modelInstance->save();
        Alert::success('Leadership Updated Successfully');
        return redirect()->route('admin.leadership.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelInstance = $this->model::find($id);
        $modelInstance->delete();
        Alert::success('Leadership Deleted Successfully');
        return redirect()->route('admin.leadership.index');
    }
}
