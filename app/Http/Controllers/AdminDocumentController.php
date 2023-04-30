<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Traits\AuthTrait;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreDocumentsRequest;
use App\Http\Requests\UpdateDocumentsRequest;
use App\Traits\Base\BaseCrudController;

class AdminDocumentController extends BaseCrudController
{
    protected $model;
    public function __construct()
    {
        $this->model = Document::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['documents'] = $this->model::all();
        return view('ar.documents.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.documents.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentsRequest $request)
    {
        $this->checkPermission('create');
        $destinationPath = 'home/documents';
        $image = $this->uploadFileToDisk($request, 'image', $destinationPath);
        $file = $this->uploadFileToDisk($request, 'file', $destinationPath);
        $doc = new Document();
        $doc->doc_image = $image;
        $doc->doc_file = $file;
        $doc->title = $request->title;
        $doc->description = $request->description;
        $doc->doc_image = $image;
        $doc->doc_file = $file;
        $doc->url = $request->url;
        $doc->meta_title = $request->meta_title;
        $doc->meta_description = $request->meta_description;
        $doc->keywords = $request->title;
        $doc->save();
        Alert::success('Document Created Successfully');
        return redirect()->route('admin.document.index');
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
        $this->data['document'] = $this->model::find($id);
        return view('ar.documents.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentsRequest $request, $id)
    {
        $this->checkPermission('update');
        $doc = $this->model::find($id);
        $destinationPath = 'home/documents';

        $image = $this->uploadFileToDisk($request, 'image', $destinationPath, $doc->image);
        $file = $this->uploadFileToDisk($request, 'file', $destinationPath, $doc->file);
        $doc->doc_image = $image;
        $doc->doc_file = $file;
        $doc->title = $request->title;
        $doc->description = $request->description;
        $doc->url = $request->url;
        $doc->meta_title = $request->meta_title;
        $doc->meta_description = $request->meta_description;
        $doc->keywords = $request->title;
        $doc->save();
        Alert::success('Document Updated Successfully');
        return redirect()->route('admin.document.index');
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
        $doc = Document::find($id);
        $imagePath = $doc->image;
        if (File::exists($imagePath)) {
            unlink($imagePath);
            $doc->deleteImage();
        }
        $imagePath = $doc->file;
        if (File::exists($imagePath)) {
            unlink($imagePath);
            $doc->deleteFile();
        }
        $doc->delete();
        Alert::success('Document Deleted Successfully');
        return redirect()->back();
    }
}
