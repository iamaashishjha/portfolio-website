<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAppSettingRequest;
use App\Http\Requests\UpdateAppSettingRequest;
use App\Traits\Base\BaseAdminController;

class AdminAppSettingsController extends BaseAdminController
{
    protected $model;
    public function __construct()
    {
        $this->model = AppSettings::class;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['appSettings'] = $this->model::all();
        $this->data['totalData'] = count($this->model::all());
        return view('ar.appSetting.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        $totalData = count($this->model::all());
        // $totalData = $this->model->count();
        if ($totalData < 1) {
            return view('ar.appSetting.form');
        } else {
            Alert::error('Header/Footer Data alreadty exists');
            return redirect()->route('admin.app-setting.index');
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
        $this->checkPermission('create');
        $totalData = count($this->model::all());
        if ($totalData <= 1) {
            $path = $request->site_title_image->store('home/app-setting', 'public');
            $appSetting = new $this->model();
            $appSetting->site_title = $request->site_title;
            $appSetting->site_title_image = $path;
            $appSetting->meta_description = $request->meta_description;
            $appSetting->meta_title = $request->meta_title;
            $appSetting->keywords = $request->keywords;
            $appSetting->created_by = Auth::user()->id;
            $appSetting->save();
            Alert::success('Header/Footer Created Successfully');
            return redirect()->route('admin.app-setting.index');
        } else {
            Alert::error('Header/Footer Data alreadty exists');
            return redirect()->route('admin.app-setting.index');
        }
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
        $this->data['appSetting'] = $this->model::find($id);
        return view('ar.appSetting.form', $this->data);
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
        $this->checkPermission('update');
        $appSetting = $this->model::find($id);
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
        $appSetting->meta_description = $request->meta_description;
        $appSetting->meta_title = $request->meta_title;
        $appSetting->keywords = $request->keywords;

        $appSetting->updated_by = Auth::user()->id;


        $appSetting->save();
        Alert::toast('Header/Footer Updated Successfully', 'success');
        return redirect()->route('admin.app-setting.index');
    }
}
