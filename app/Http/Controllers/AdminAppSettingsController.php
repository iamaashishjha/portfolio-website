<?php

namespace App\Http\Controllers;

use App\Traits\AuthTrait;
use App\Models\AppSettings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAppSettingRequest;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\UpdateAppSettingRequest;

class AdminAppSettingsController extends BaseController
{
    use AuthTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkCRUDPermission('App\Models\AppSettings', 'list');
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
        $this->checkCRUDPermission('App\Models\AppSettings', 'create');
        $totalData = count(AppSettings::all());

        if ($totalData < 1) {
            return view('ar.appSetting.create');
        } else {
            Alert::error('Header/Footer Data alreadty exists');
            return redirect()->route('admin.home.app-setting.index');
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
        $this->checkCRUDPermission('App\Models\AppSettings', 'create');

        // dd($request, request()->all(), $request->site_title_image, request()->site_title_image, );
        $totalData = count(AppSettings::all());

        if ($totalData <= 1) {
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
            return redirect()->route('admin.home.app-setting.index');
        } else {
            Alert::error('Header/Footer Data alreadty exists');
            return redirect()->route('admin.home.app-setting.index');
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
        $this->checkCRUDPermission('App\Models\AppSettings', 'update');
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
        $this->checkCRUDPermission('App\Models\AppSettings', 'update');
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
        // $appSetting->site_title_image = $path;

        $appSetting->meta_description = $request->meta_description;
        $appSetting->meta_title = $request->meta_title;
        $appSetting->keywords = $request->keywords;

        $appSetting->updated_by = Auth::user()->id;


        $appSetting->save();
        Alert::toast('Header/Footer Updated Successfully', 'success');
        return redirect()->route('admin.home.app-setting.index');
    }
}
