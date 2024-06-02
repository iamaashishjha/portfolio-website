<?php

namespace App\Http\Controllers\Admin\ContentPages;

use App\Models\Parliament;
use Illuminate\Http\Request;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;

class ParliamentController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = Parliament::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['parliaments'] = $this->model::all();
        return view('ar.parliament.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ar.parliament.form');
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
        $dataArr = $request->only('title', 'description', 'content', 'image', 'file');
        $modelInstance->create($dataArr);
        Alert::success('Parliament Created successfully');
        return redirect()->route('admin.parliament.index');
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
        $this->data['parliament'] = $this->model::find($id);
        return view('ar.parliament.form', $this->data);
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
        $dataArr = $request->only('title', 'description', 'content', 'image', 'file');
        $modelInstance->update($dataArr);
        Alert::success('Parliament Updated successfully');
        return redirect()->route('admin.parliament.index');
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
        Alert::success('Parliament Deleted successfully');
        return redirect()->route('admin.parliament.index');
    }
}
