<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreLibraryRequest;
use App\Http\Requests\UpdateLibraryRequest;
use App\Traits\Base\BaseAdminController;

class AdminLibraryController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = Library::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['libraries'] = $this->model::all();
        return view('ar.library.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.library.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryRequest $request)
    {
        $this->checkPermission('create');
        $library = new $this->model();
        $image = $request->image->store('home/library', 'public');
        $file = $request->file->store('home/library', 'public');

        $library->title = $request->title;
        $library->description = $request->description;
        $library->doc_image = $image;
        $library->doc_file = $file;
        $library->url = $request->url;
        $library->meta_title = $request->meta_title;
        $library->meta_description = $request->meta_description;
        $library->keywords = $request->title;
        // $library->is_active = true;

        $library->save();
        Alert::success('Library Updated Successfully');
        return redirect()->route('admin.library.index');
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
        $this->checkPermission('update');
        $this->data['library'] = $this->model::find($id);
        return view('ar.library.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLibraryRequest $request, $id)
    {
        $this->checkPermission('update');
        $library = $this->model::find($id);

        if ($request->has('image') && ($request->image != '')) {
            $imagePath = $library->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $library->deleteImage();
            }
            $image = $request->image->store('home/library', 'public');
            $library->doc_image = $image;
        }

        if ($request->has('file') && ($request->file != '')) {
            $imagePath = $library->file;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $library->deleteImage();
            }
            $file = $request->file->store('home/library', 'public');
            $library->doc_file = $file;
        }

        $library->title = $request->title;
        $library->description = $request->description;
        $library->url = $request->url;
        $library->meta_title = $request->meta_title;
        $library->meta_description = $request->meta_description;
        $library->keywords = $request->title;

        $library->save();
        Alert::success('Library Updated Successfully');
        return redirect()->route('admin.library.index');
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
        $library = $this->model::find($id);
        $imagePath = $library->image;
        if (File::exists($imagePath)) {
            unlink($imagePath);
            $library->deleteImage();
        }
        $imagePath = $library->file;
        if (File::exists($imagePath)) {
            unlink($imagePath);
            $library->deleteFile();
        }
        $library->delete();
        Alert::success('Library Deleted Successfully');
        return redirect()->back();
    }
}
