<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreLibraryRequest;
use App\Http\Requests\UpdateLibraryRequest;

class AdminLibraryController extends Controller
{
    use AuthTrait;
    public $data;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkCRUDPermission('App\Models\Library', 'list');
        $this->data['libraries'] = Library::all();
        return view('ar.library.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkCRUDPermission('App\Models\Library', 'create');
        return view('ar.library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibraryRequest $request)
    {
        $this->checkCRUDPermission('App\Models\Library', 'create');
        $library = new Library();

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
        $this->checkCRUDPermission('App\Models\Library', 'update');
        $this->data['library'] = Library::find($id);
        return view('ar.library.create', $this->data);
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
        $this->checkCRUDPermission('App\Models\Library', 'update');
        $library = Library::find($id);

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
        $this->checkCRUDPermission('App\Models\Library', 'delete');
        $library = Library::find($id);
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
