<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreHeaderFooterRequest;
use App\Http\Requests\UpdateHeaderFooterRequest;
use App\Models\HeaderFooter;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use UxWeb\SweetAlert\SweetAlert;

class AdminHeaderFooterController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['headerFooters'] = HeaderFooter::all();
        return view('ar.headerFooter.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ar.headerFooter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHeaderFooterRequest $request)
    {
        $path = $request->logo_image->store('home/header-footer', 'public');
        $headerFooter = new HeaderFooter();

        $headerFooter->name = $request->name;
        $headerFooter->logo = $path;

        $headerFooter->telephone = $request->telephone;
        $headerFooter->phone1 = $request->phone1;
        $headerFooter->phone2 = $request->phone2;
        $headerFooter->email = $request->email;
        $headerFooter->address = $request->address;
        $headerFooter->start_date = $request->start_date;

        $headerFooter->meta_description = $request->meta_description;
        $headerFooter->meta_title = $request->meta_title;
        $headerFooter->keywords = $request->keywords;

        $headerFooter->created_by = Auth::user()->id;
        if ($request->has('is_active')) {
            $headerFooter->is_active = 1;
        } else {
            $headerFooter->is_active = 0;
        }
        $headerFooter->save();

        Alert::toast('Header/Footer Created Successfully', 'success');
        return redirect()->route('admin.home.headerFooter.index');
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
        $this->data['headerFooter'] = HeaderFooter::find($id);
        return view('ar.headerFooter.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHeaderFooterRequest $request, $id)
    {
        $headerFooter = HeaderFooter::find($id);

        $headerFooter->name = $request->name;

        if ($request->has('logo') && ($request->logo_image != '')) {
            $imagePath = $headerFooter->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $headerFooter->deleteImage();
            }
            $path = $request->logo_image->store('home/header-footer', 'public');
            $headerFooter->logo = $path;
        }

        $headerFooter->telephone = $request->telephone;
        $headerFooter->phone1 = $request->phone1;
        $headerFooter->phone2 = $request->phone2;
        $headerFooter->email = $request->email;
        $headerFooter->address = $request->address;
        $headerFooter->start_date = $request->start_date;

        $headerFooter->meta_description = $request->meta_description;
        $headerFooter->meta_title = $request->meta_title;
        $headerFooter->keywords = $request->keywords;
        $headerFooter->updated_at = now();
        if ($request->has('is_active')) {
            $headerFooter->is_active = 1;
        } else {
            $headerFooter->is_active = 0;
        }

        $headerFooter->save();
        Alert::toast('Header/Footer Updated Successfully', 'success');
        return redirect()->route('admin.home.headerFooter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $headerFooter = HeaderFooter::find($id);
        $imagePath = $headerFooter->logo;
        if (File::exists($imagePath)) {
            unlink($imagePath);
            $headerFooter->deleteImage();
        }
        $headerFooter->delete();

        Alert::toast('Header/Footer Deleted Successfully', 'success');
        return redirect()->back();
    }
}
