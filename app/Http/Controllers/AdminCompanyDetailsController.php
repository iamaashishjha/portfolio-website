<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['companyDetails'] = CompanyDetails::all();
        $this->data['totalData'] = count(CompanyDetails::all());
        return view('ar.companyDetails.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ar.companyDetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cp = new CompanyDetails();
        $cp->company_name_en = $request->company_name_en;
        $cp->company_name_lc = $request->company_name_lc;
        $cp->company_description = $request->company_description;
        $cp->phone_number = $request->phone_number;
        $cp->mobile_number = $request->mobile_number;
        $cp->email_address = $request->email_address;
        $cp->company_address = $request->company_address;
        $cp->total_members = $request->total_members;
        $cp->google_map = $request->google_map;
        $cp->about_us = $request->about_us;
        $cp->our_history = $request->our_history;
        $cp->our_vision = $request->our_vision;
        $cp->home_about_content = $request->home_about_content;
        $cp->home_about_image_1 = $request->home_about_image_1;
        $cp->home_about_image_2 = $request->home_about_image_2;
        $cp->home_about_image_3 = $request->home_about_image_3;
        $cp->home_about_accordion_title_1 = $request->home_about_accordion_title_1;
        $cp->home_about_accordion_title_2 = $request->home_about_accordion_title_2;
        $cp->home_about_accordion_title_3 = $request->home_about_accordion_title_3;
        $cp->home_about_accordion_content_1 = $request->home_about_accordion_content_1;
        $cp->home_about_accordion_content_2 = $request->home_about_accordion_content_2;
        $cp->home_about_accordion_title_3 = $request->home_about_accordion_title_3;
        $cp->created_by = Auth::user()->id;
        $cp->save();

        Alert::success('Company Detail Created successfully');

        return redirect()->route('admin.home.companyDetails.index');
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
        $this->data['companyDetail'] = CompanyDetails::find($id);
        return view('ar.companyDetails.create', $this->data);
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
        $cp = CompanyDetails::find($id);
        $cp->company_name_en = $request->company_name_en;
        $cp->company_name_lc = $request->company_name_lc;
        $cp->company_description = $request->company_description;
        $cp->phone_number = $request->phone_number;
        $cp->mobile_number = $request->mobile_number;
        $cp->email_address = $request->email_address;
        $cp->company_address = $request->company_address;
        $cp->total_members = $request->total_members;
        $cp->google_map = $request->google_map;
        $cp->about_us = $request->about_us;
        $cp->our_history = $request->our_history;
        $cp->our_vision = $request->our_vision;
        $cp->home_about_content = $request->home_about_content;
        $cp->home_about_image_1 = $request->home_about_image_1;
        $cp->home_about_image_2 = $request->home_about_image_2;
        $cp->home_about_image_3 = $request->home_about_image_3;
        $cp->home_about_accordion_title_1 = $request->home_about_accordion_title_1;
        $cp->home_about_accordion_title_2 = $request->home_about_accordion_title_2;
        $cp->home_about_accordion_title_3 = $request->home_about_accordion_title_3;
        $cp->home_about_accordion_content_1 = $request->home_about_accordion_content_1;
        $cp->home_about_accordion_content_2 = $request->home_about_accordion_content_2;
        $cp->home_about_accordion_title_3 = $request->home_about_accordion_title_3;
        $cp->updated_by = Auth::user()->id;
        $cp->save();

        Alert::success('Company Detail Created successfully');

        return redirect()->route('admin.home.companyDetails.index');
    }

}
