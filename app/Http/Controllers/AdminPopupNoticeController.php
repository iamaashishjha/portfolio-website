<?php

namespace App\Http\Controllers;

use App\Models\PopupNotice;
use Illuminate\Http\Request;
use App\Traits\Base\BaseCrudController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;


class AdminPopupNoticeController extends BaseCrudController
{
    protected $model;
    public function __construct()
    {
        $this->model = PopupNotice::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['popupNotices'] = $this->model::all();
        return view('ar.popup-notice.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.popup-notice.form');
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
        $filePath = $this->uploadFileToDisk($request,'file','popup-notice');
        $modelInstance = new $this->model();
        $modelInstance->title = $request->title;
        $modelInstance->content = $request->content;
        $modelInstance->file = $filePath;
        $modelInstance->type = $request->type;
        $modelInstance->save();
        Alert::success('Pop Up Notice Created Successfully');
        return redirect()->route('admin.popup-notice.index');
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
        $this->data['popupNotice'] = $this->model::find($id);
        return view('ar.popup-notice.form', $this->data);
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
        $modelInstance = $this->model::find($id);
        $filePath = $this->uploadFileToDisk($request,'file','popup-notice', $modelInstance->file);
        $modelInstance->title = $request->title;
        $modelInstance->content = $request->content;
        $modelInstance->file = $filePath;
        $modelInstance->type = $request->type;
        $modelInstance->save();
        Alert::success('Popup Notice Updated Successfully');
        return redirect()->route('admin.popup-notice.index');
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
        Alert::success('Popup Notice Deleted Successfully');
        return redirect()->back();
    }
}
