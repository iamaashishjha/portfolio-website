<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Traits\Base\BaseCrudController;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTeamMemberController extends BaseCrudController
{
    protected $model;
    public function __construct(TeamMember $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['members'] = $this->model::all();
        return view('ar.team-member.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.team-member.form');
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
        $dataArr = $request->only(['name', 'email', 'phone_number', 'post', 'image', 'facebook_link', 'twitter_link', 'instagram_link', 'tenure_start_date_np', 'tenure_start_date_en', 'tenure_end_date_np','tenure_end_date_en']);
        $member = new $this->model();
        $member->create($dataArr);
        Alert::success('Member Created successfully');
        return redirect()->route('admin.team-member.index');
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
        $this->data['member'] = $this->model::find($id);
        return view('ar.team-member.form', $this->data);
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
        $this->checkPermission('update');
        $member = $this->model::find($id);
        $dataArr = $request->only(['name', 'email', 'phone_number', 'post', 'image', 'facebook_link', 'twitter_link', 'instagram_link', 'tenure_start_date_np', 'tenure_start_date_en', 'tenure_end_date_np','tenure_end_date_en']);
        $member->update($dataArr);
        Alert::success('Member Updated successfully');
        return redirect()->route('admin.team-member.index');
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
        $member = $this->model::find($id);
        $member->delete();
        Alert::success('Member Deleted successfully');
        return redirect()->route('admin.team-member.index');
    }
}
