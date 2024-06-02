<?php

namespace App\Http\Controllers\Admin\ContentPages;

use App\Models\MassOrganization;
use Illuminate\Http\Request;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;


class MassOrganizationController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = MassOrganization::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['massOrganizations'] = $this->model::all();
        $this->data['totalData'] = count($this->model::all());
        return view('ar.mass-organization.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ar.mass-organization.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modelInstance = new $this->model();
        $dataArr = $request->only('content');
        $dataArr['title'] = 'Donation Details';
        $dataArr['description'] = 'Donation Details';
        $modelInstance->create($dataArr);
        Alert::success('Mass Organization Created successfully');
        return redirect()->route('admin.mass-organization.index');
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
        $this->data['massOrganization'] = $this->model::find($id);
        return view('ar.mass-organization.form', $this->data);
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
        $modelInstance = $this->model::find($id);
        $dataArr = $request->only('content');
        $dataArr['title'] = 'Donation Details';
        $dataArr['description'] = 'Donation Details';
        $modelInstance->update($dataArr);
        Alert::success('Mas Organization Updated successfully');
        return redirect()->route('admin.mass-organization.index');
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
        Alert::success('Mass Organization Deleted successfully');
        return redirect()->route('admin.mass-organization.index');
    }
}
