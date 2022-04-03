<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Education;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\InfoEducation;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class AdminInfoEducationController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = InfoEducation::all();
        return view('ar.info.education.index')
        ->with('educations', $educations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ar.info.education.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationRequest $request)
    {
        //
        $education = new InfoEducation();

        $path = $request->education_image->store('information/info-education', 'public');
        $education->title = $request->title;
        $education->description = $request->description;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->education_image = $path;
        $education->institution = $request->institution;
        $education->university = $request->university;
        $education->grades = $request->grades;
        $education->no_of_year = $request->no_of_year;

        if ($request->has('is_active')) {
            //Checkbox checked
            $education->is_active = 1;
        } else {
            //Checkbox not checked
            $education->is_active = 0;
        }
        
        $education->created_by = Auth::user()->id;
        $education->save();

        Alert::toast('Education Created Successfully', 'success');
        return redirect()->route('education.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(InfoEducation $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $education = InfoEducation::find($id);
        return view('ar.info.education.create')->with('education', $education);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEducationRequest  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationRequest $request, $id)
    {
        $education = InfoEducation::find($id);


        if ($request->has('education_image') && ($request->education_image != '')) {
            $imagePath = $education->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $education->deleteImage();
            }
        $path = $request->education_image->store('information/info-education', 'public');
            $education->education_image = $path;
        }

        $education->title = $request->title;
        $education->description = $request->description;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->institution = $request->institution;
        $education->university = $request->university;
        $education->grades = $request->grades;
        $education->no_of_year = $request->no_of_year;

        if ($request->has('is_active')) {
            //Checkbox checked
            $education->is_active = 1;
        } else {
            //Checkbox not checked
            $education->is_active = 0;
        }
        
        $education->created_by = Auth::user()->id;
        $education->save();

        Alert::toast('Education Updated Successfully', 'success');
        return redirect()->route('education.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = InfoEducation::find($id);
        $imagePath = $education->image;
        if (File::exists($imagePath)) {
            unlink($imagePath);
            $education->deleteImage();
        }
        $education->delete();
        Alert::toast('Education Deleted Successfully', 'success');
        return redirect()->back();
    }
}
