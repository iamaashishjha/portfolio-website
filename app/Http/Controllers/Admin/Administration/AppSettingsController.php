<?php

namespace App\Http\Controllers\Admin\Administration;

use App\Models\AppSettings;
use Illuminate\Support\Facades\Log;

use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAppSettingRequest;
use App\Http\Requests\UpdateAppSettingRequest;

class AppSettingsController extends BaseAdminController
{
    protected $model, $repo, $context;

    public function __construct(AppSettings $model)
    {
        parent::__construct($model);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $this->checkPermission('list');
            $this->data['appSettings'] = $this->repo->index();
            $this->data['totalData'] = count($this->data['appSettings']);
            return view('ar.appSetting.index', $this->data);
        } catch (\Exception $ex) {
            Log::error($this->context . "@index => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $this->checkPermission('create');
            $totalData = count($this->repo->index());
            if ($totalData < 1) {
                return view('ar.appSetting.form');
            } else {
                Alert::error('Header/Footer Data alreadty exists');
                return redirect()->route('admin.app-setting.index');
            }
        } catch (\Exception $ex) {
            Log::error($this->context . "@create => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
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
        try {
            $this->checkPermission('create');
            $totalData = count($this->repo->index());
            if ($totalData <= 1) {
                $this->repo->storeOrUpdate($request->validated());
                Alert::success('Header/Footer Created Successfully');
                return redirect()->route('admin.app-setting.index');
            } else {
                Alert::error('Header/Footer Data alreadty exists');
                return redirect()->route('admin.app-setting.index');
            }
            return redirect()->back()->with('success', "App Setting Successfully Added.");
        } catch (\Exception $ex) {
            Log::error($this->context . "@store => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
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
        try {
            $this->checkPermission('update');
            $this->data['appSetting'] = $this->repo->find($id);
            return view('ar.appSetting.form', $this->data);
        } catch (\Exception $ex) {
            Log::error($this->context . "@edit => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }
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

        try {
            $this->checkPermission('update');
            $this->repo->storeOrUpdate($request->validated(), $id);
            return redirect()->route('admin.app-setting.index')->with('success', "App Setting Successfully Updated.");
        } catch (\Exception $ex) {
            Log::error($this->context . "@store => ", ["error_message" => $ex->getMessage()]);
            return redirect()->back()->with('error', "Oops! Something went wrong.");
        }

        // $appSetting = $this->model::find($id);
        // if ($request->has('site_title_image') && ($request->site_title_image != '')) {
        //     $imagePath = $appSetting->image;
        //     if (File::exists($imagePath)) {
        //         unlink($imagePath);
        //         $appSetting->deleteImage();
        //     }
        //     $path = $request->site_title_image->store('home/app-setting', 'public');
        //     $appSetting->site_title_image = $path;
        // }

        // $appSetting->site_title = $request->site_title;
        // $appSetting->meta_description = $request->meta_description;
        // $appSetting->meta_title = $request->meta_title;
        // $appSetting->keywords = $request->keywords;

        // $appSetting->updated_by = Auth::user()->id;


        // $appSetting->save();
        // Alert::toast('Header/Footer Updated Successfully', 'success');
        // return redirect()->route('admin.app-setting.index');
    }
}
