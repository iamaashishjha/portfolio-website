<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;

class AdminHistoryController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = History::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['histories'] = $this->model::all();
        return view('ar.history.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ar.history.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data['history'] = new $this->model();
        $dataArr = $request->only('title', 'description', 'content', 'image', 'file');
        $this->data['history']->create($dataArr);
        Alert::success('History Created successfully');
        return redirect()->route('admin.history.index');
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
        $this->data['history'] = $this->model::find($id);
        return view('ar.history.form', $this->data);
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
        $this->data['history'] = $this->model::find($id);
        $dataArr = $request->only('title', 'description', 'content', 'image', 'file');
        $this->data['history']->update($dataArr);
        Alert::success('History Updated successfully');
        return redirect()->route('admin.history.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->data['history'] = $this->model::find($id);
        $this->data['history']->delete();
        Alert::success('History Deleted successfully');
        return redirect()->route('admin.history.index');
    }
}
