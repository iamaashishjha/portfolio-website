<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\AuthTrait;
use Illuminate\Http\Request;
use App\Models\CompanyDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCompanyDetailsController extends BaseAdminController
{
    public $data;

    protected $model;
    public function __construct()
    {
        $this->model = CompanyDetails::class;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkPermission('list');
        $this->data['authUser'] = User::find(Auth::id());
        $this->data['companyDetails'] = $this->model::all();
        $this->data['totalData'] = count($this->model::all());
        return view('ar.companyDetails.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        return view('ar.companyDetails.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkCRUDPermission('App\Models\CompanyDetails', 'create');
        $logo_image = $request->logo_image->store('home/comapany-details', 'public');
        $president_image = $request->president_image->store('home/comapany-details', 'public');
        $our_mission_image = $request->our_mission_image->store('home/comapany-details', 'public');
        $our_vision_image = $request->our_vision_image->store('home/comapany-details', 'public');

        $cp = new CompanyDetails();
        $cp->company_name_en = $request->company_name_en;
        $cp->company_name_lc = $request->company_name_lc;
        $cp->company_description = $request->company_description;
        $cp->logo_image = $logo_image;
        $cp->phone_number = $request->phone_number;
        $cp->mobile_number = $request->mobile_number;
        $cp->email_address = $request->email_address;
        $cp->company_address = $request->company_address;
        $cp->facebook_link = $request->facebook_link;
        $cp->twitter_link = $request->twitter_link;
        $cp->instagram_link = $request->instagram_link;
        $cp->total_members = $request->total_members;
        $cp->google_map = $request->google_map;
        $cp->about_us = $request->about_us;
        $cp->our_history = $request->our_history;
        $cp->our_vision = $request->our_vision;
        $cp->home_about_content = $request->home_about_content;
        $cp->president_image = $president_image;
        $cp->message_from_president = $request->message_from_president;
        $cp->president_name = $request->president_name;
        $cp->our_misson_image = $our_mission_image;
        $cp->our_vision_image = $our_vision_image;
        $cp->created_by = Auth::user()->id;
        $cp->save();

        Alert::success('Company Detail Created successfully');

        return redirect()->route('admin.company-details.index');
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
        $this->data['companyDetail'] = $this->model::find($id);
        return view('ar.companyDetails.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkPermission('update');
        $cp = $this->model::find($id);
        $destinationPath = 'home/comapany-details';

        $president_image = $this->uploadFileToDisk($request, 'president_image', $destinationPath, $cp->president_image);

        if ($request->has('logo_image') && ($request->logo_image != '')) {
            $imagePath = $cp->logo;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $cp->deleteLogoImage();
            }
            $logo = $request->logo_image->store($destinationPath, 'public');
            $cp->logo_image = $logo;
        }

        if ($request->has('president_image') && ($request->president_image != '')) {
            $imagePath = $cp->president_image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $cp->deleteAboutImage1();
            }
            $path = $request->president_image->store($destinationPath, 'public');
            $cp->president_image = $path;
        }

        if ($request->has('our_mission_image') && ($request->our_mission_image != '')) {
            $imagePath = $cp->our_mission_image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $cp->deleteOurMissionImage();
            }
            $path = $request->our_mission_image->store($destinationPath, 'public');
            $cp->our_mission_image = $path;
        }

        if ($request->has('our_vision_image') && ($request->our_vision_image != '')) {
            $imagePath = $cp->our_vision_image;
            if (File::exists($imagePath)) {
                unlink($imagePath);
                $cp->deleteOurVisionImage();
            }
            $path = $request->our_vision_image->store($destinationPath, 'public');
            $cp->our_vision_image = $path;
        }


        $cp->company_name_en = $request->company_name_en;
        $cp->company_name_lc = $request->company_name_lc;
        $cp->company_description = $request->company_description;

        $cp->phone_number = $request->phone_number;
        $cp->mobile_number = $request->mobile_number;
        $cp->email_address = $request->email_address;

        $cp->company_address = $request->company_address;

        $cp->facebook_link = $request->facebook_link;
        $cp->twitter_link = $request->twitter_link;
        $cp->instagram_link = $request->instagram_link;
        $cp->total_members = $request->total_members;
        $cp->google_map = $request->google_map;

        $cp->about_us = $request->about_us;
        $cp->our_history = $request->our_history;
        $cp->our_vision = $request->our_vision;
        $cp->our_mission = $request->our_mission;

        $cp->home_about_content = $request->home_about_content;
        $cp->president_image = $request->president_image;
        $cp->message_from_president = $request->message_from_president;
        $cp->president_name = $request->president_name;
        $cp->president_image = $president_image;

        $cp->updated_by = Auth::user()->id;

        $cp->save();

        Alert::success('Company Detail Updated successfully');

        return redirect()->route('admin.company-details.index');
    }
}
