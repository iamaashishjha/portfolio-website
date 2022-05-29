<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\StoreAppSettingRequest;
use App\Http\Requests\UpdateAppSettingRequest;
use App\Models\AppSettings;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAppSettingsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['appSettings'] = AppSettings::all();
        $this->data['totalData'] = count(AppSettings::all());
        return view('ar.appSetting.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $totalData = count(AppSettings::all());

        if ($totalData < 1) {
            return view('ar.appSetting.create');
        } else {
            Alert::error('Header/Footer Data alreadty exists');
            return redirect()->route('admin.home.appSetting.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppSettingRequest $request)
    {

        // dd($request, request()->all(), $request->site_title_image, request()->site_title_image, );
        $totalData = count(AppSettings::all());

        if ($totalData <= 1) {
            // $path = $request->logo_image->store('home/header-footer', 'public');


            // $appSetting->name = $request->name;
            // $appSetting->company_description = $request->company_description;
            // $appSetting->logo = $path;

            // $appSetting->telephone = $request->telephone;
            // $appSetting->phone1 = $request->phone1;
            // $appSetting->phone2 = $request->phone2;
            // $appSetting->email = $request->email;
            // $appSetting->address = $request->address;
            // $appSetting->start_date = $request->start_date;

            $path = $request->site_title_image->store('home/app-setting', 'public');
            $appSetting = new AppSettings();

            $appSetting->site_title = $request->site_title;
            $appSetting->site_title_image = $path;

            $appSetting->meta_description = $request->meta_description;
            $appSetting->meta_title = $request->meta_title;
            $appSetting->keywords = $request->keywords;

            $appSetting->created_by = Auth::user()->id;

            $appSetting->save();

            Alert::success('Header/Footer Created Successfully');
            return redirect()->route('admin.home.appSetting.index');
        } else {
            Alert::error('Header/Footer Data alreadty exists');
            return redirect()->route('admin.home.appSetting.index');
        }
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
        $this->data['appSetting'] = AppSettings::find($id);
        return view('ar.appSetting.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppSettingRequest $request, $id)
    {
        $appSetting = AppSettings::find($id);

        if ($request->has('site_title_image') && ($request->site_title_image != '')) {
            $imagePath = $appSetting->image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $appSetting->deleteImage();
            }
            $path = $request->site_title_image->store('home/app-setting', 'public');
            $appSetting->site_title_image = $path;
        }

        $appSetting->site_title = $request->site_title;
        $appSetting->site_title_image = $path;

        $appSetting->meta_description = $request->meta_description;
        $appSetting->meta_title = $request->meta_title;
        $appSetting->keywords = $request->keywords;

        $appSetting->updated_by = Auth::user()->id;


        $appSetting->save();
        Alert::toast('Header/Footer Updated Successfully', 'success');
        return redirect()->route('admin.home.appSetting.index');
    }
}
