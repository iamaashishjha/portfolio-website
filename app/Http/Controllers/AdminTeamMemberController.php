<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\Leadership;
use App\Models\Types;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Traits\Base\BaseCrudController;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTeamMemberController extends BaseCrudController
{
    protected $model;
    public function __construct()
    {
        $this->model = TeamMember::class;
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
        $this->data['posts'] = Types::whereIn('id', [41, 42, 43, 44, 45, 46])->get();
        $this->data['totalData'] = count($this->model::all());
        return view('ar.team-member.index', $this->data);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterSearch(Request $request)
    {
        $postId = $request->post_id;
        $this->checkPermission('list');
        $this->data['members'] = $this->model::where('post_id', $postId)->get();
        $this->data['posts'] = Types::whereIn('id', [41, 42, 43, 44, 45, 46])->get();
        $this->data['totalData'] = count($this->model::all());
        return response()->json($this->data['members']);
        // return view('ar.team-member.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        $this->data['posts'] = Types::whereIn('id', [41, 42, 43, 44, 45, 46])->get();
        $this->data['committees'] = Leadership::all();
        return view('ar.team-member.form', $this->data);
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
        $dataArr = $request->only([
            'name', 'email', 'phone_number', 'post_id', 'image',
            'facebook_link', 'twitter_link', 'instagram_link',
            'tenure_start_date_np', 'tenure_start_date_en', 'tenure_end_date_np', 'tenure_end_date_en',
            'committee_id',
            'display_order'
        ]);
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
        $this->data['posts'] = Types::whereIn('id', [41, 42, 43, 44, 45, 46])->get();
        $this->data['committees'] = Leadership::all();
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
        $dataArr = $request->only([
            'name', 'email', 'phone_number', 'post_id', 'image',
            'facebook_link', 'twitter_link', 'instagram_link',
            'tenure_start_date_np', 'tenure_start_date_en', 'tenure_end_date_np', 'tenure_end_date_en',
            'committee_id',
            'display_order'
        ]);
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
