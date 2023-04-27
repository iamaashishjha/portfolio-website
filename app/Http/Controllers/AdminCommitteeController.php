<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Traits\Base\BaseCrudController;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCommitteeController extends BaseCrudController
{
    protected $model;
    public function __construct()
    {
        $this->model = Committee::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['committees'] =  $this->model::all();
        return view('ar.commitee.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['members'] = TeamMember::all();
        return view('ar.commitee.form', $this->data);
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
        Alert::success('Committee Created Successfully');
        return redirect()->route('admin.committee.index');
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
        $this->data['committee'] =  $this->model::find($id);
        return view('ar.commitee.form', $this->data);
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
        Alert::success('Committee Updated Successfully');
        return redirect()->route('admin.committee.index');
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
        Alert::success('Committee Deleted Successfully');
        return redirect()->route('admin.committee.index');
    }
}
