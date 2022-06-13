<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreDocumentsRequest;
use App\Http\Requests\UpdateDocumentsRequest;
use App\Http\Controllers\Admin\BaseController;

class AdminDocumentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['documents'] = Document::all();
        return view('ar.documents.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ar.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentsRequest $request)
    {
        $doc = new Document();

        $image = $request->image->store('home/documents', 'public');
        $file = $request->file->store('home/documents', 'public');

        $doc->title = $request->title;
        $doc->description = $request->description;
        $doc->doc_image = $image;
        $doc->doc_file = $file;
        $doc->url = $request->url;
        $doc->meta_title = $request->meta_title;
        $doc->meta_description = $request->meta_description;
        $doc->keywords = $request->title;
        // $doc->is_active = true;

        $doc->save();
        Alert::success('Document Updated Successfully');
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
        $this->data['document'] = Document::find($id);
        return view('ar.documents.create', $this->data);
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
        $doc = Document::find($id);

        if ($request->has('image') && ($request->image != '')) {
            $imagePath = $doc->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $doc->deleteImage();
            }
            $image = $request->image->store('home/documents', 'public');
            $doc->doc_image = $image;
        }

        if ($request->has('file') && ($request->file != '')) {
            $imagePath = $doc->file;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $doc->deleteImage();
            }
            $file = $request->file->store('home/documents', 'public');
            $doc->doc_file = $file;
        }

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
