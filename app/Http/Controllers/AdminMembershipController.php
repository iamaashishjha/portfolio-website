<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\LocalLevelType;
use App\Models\Membership;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use RealRashid\SweetAlert\Facades\Alert;

class AdminMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['members'] = Membership::all();
        return view('ar.membership.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['provinces'] = Province::all();
        $this->data['genders'] = Gender::all();
        $this->data['localleveltypes'] = LocalLevelType::all();
        return view('ar.membership.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('own_image')) {
            $ownImage = $request->own_image->store('member/profile', 'public');
        }else{
            $ownImage = null;
        }
        if ($request->has('sign_image')) {
            $signImage = $request->sign_image->store('member/profile', 'public');
        }else{
            $signImage = null;
        }
        if ($request->has('citizenship_front')) {
            $citizenshipFront = $request->citizenship_front->store('member/citizenship', 'public');
        }else{
            $citizenshipFront = null;
        }

        if ($request->has('citizenship_back')) {
            $citizenshipBack = $request->citizenship_back->store('member/citizenship', 'public');
        }else{
            $citizenshipBack = null;
        }
        if ($request->has('passport_front')) {
            $passportFront = $request->passport_front->store('member/passport', 'public');
        }else{
            $passportFront = null;
        }
        if ($request->has('passport_back')) {
            $passportBack = $request->passport_back->store('member/passport', 'public');
        }else{
            $passportBack = null;
        }

        if ($request->has('license_image')) {
            $licenseImage = $request->license_image->store('member/license', 'public');
        }else{
            $licenseImage = null;
        }
        if ($request->has('pan_front')) {
            $panFront = $request->pan_front->store('member/pan', 'public');
        }else{
            $panFront = null;
        }
        if ($request->has('pan_back')) {
            $panBack = $request->pan_back->store('member/pan', 'public');
        }else{
            $panBack = null;
        }
        $member = new Membership();

        $member->name_en = $request->name_en;
        $member->name_lc = $request->name_lc;
        $member->gender_id = $request->gender_id;

        $member->birth_date_ad = $request->birth_date_ad;
        $member->birth_date_bs = $request->birth_date_bs;
        $member->citizen_province_id = $request->citizen_province_id;

        $member->citizen_district_id = $request->citizen_district_id;
        $member->citizenship_number = $request->citizenship_number;
        $member->passport_number = $request->passport_number;

        $member->voter_id_number = $request->voter_id_number;

        $member->perm_province_id = $request->perm_province_id;
        $member->perm_district_id = $request->perm_district_id;
        $member->perm_local_level_id = $request->perm_local_level_id;

        $member->perm_local_level_type_id = $request->perm_local_level_type_id;
        $member->perm_ward_number = $request->perm_ward_number;
        $member->perm_tole = $request->perm_tole;

        $member->temp_province_id = $request->temp_province_id;
        $member->temp_district_id = $request->temp_district_id;
        $member->temp_local_level_id = $request->temp_local_level_id;

        $member->temp_local_level_type_id = $request->temp_local_level_type_id;
        $member->temp_ward_number = $request->temp_ward_number;
        $member->temp_tole = $request->temp_tole;


        $member->email = $request->email;
        $member->phone_number = $request->phone_number;
        $member->mobile_number = $request->mobile_number;

        $member->cast = $request->cast;
        $member->category = $request->category;
        $member->category_source = $request->category_source;

        $member->education_qualification = $request->education_qualification;
        $member->blood_group = $request->blood_group;
        $member->other_identity = $request->other_identity;

        $member->father_name = $request->father_name;
        $member->mother_name = $request->mother_name;
        $member->grand_father_name = $request->grand_father_name;

        $member->grand_mother_name = $request->grand_mother_name;

        $member->mariatal_status_id = $request->mariatal_status_id;
        $member->wife_name = $request->wife_name;
        $member->total_family_member = $request->total_family_member;


        $member->profession = $request->profession;
        $member->source_income = $request->source_income;

        $member->property_cash = $request->property_cash;
        $member->property_fixed = $request->property_fixed;
        $member->property_share = $request->property_share;

        $member->property_other = $request->property_other;

        $member->party_post = $request->party_post;
        $member->committee_name = $request->committee_name;
        $member->party_lebidar = $request->party_lebidar;

        $member->party_joined_date_ad = $request->party_joined_date_ad;
        $member->party_joined_date_bs = $request->party_joined_date_bs;
        $member->party_location = $request->party_location;

        $member->political_background = $request->political_background;

        $member->own_image = $ownImage;
        $member->sign_image = $signImage;
        $member->citizenship_front = $citizenshipFront;

        $member->citizenship_back = $citizenshipBack;
        $member->passport_front = $passportFront;
        $member->passport_back = $passportBack;

        $member->license_image = $licenseImage;
        $member->pan_front = $panFront;
        $member->pan_back = $panBack;

        $member->save();
        Alert::toast('New Member Created Successfully', 'success');
        return redirect()->route('admin.member.index');
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
        $this->data['member'] = Membership::find($id);
        $this->data['provinces'] = Province::all();
        $this->data['genders'] = Gender::all();
        $this->data['localleveltypes'] = LocalLevelType::all();
        return view('ar.membership.create', $this->data);
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

        $member = Membership::find($id);

        $member->name_en = $request->name_en;
        $member->name_lc = $request->name_lc;
        $member->gender_id = $request->gender_id;

        $member->birth_date_ad = $request->birth_date_ad;
        $member->birth_date_bs = $request->birth_date_bs;
        $member->citizen_province_id = $request->citizen_province_id;

        $member->citizen_district_id = $request->citizen_district_id;
        $member->citizenship_number = $request->citizenship_number;
        $member->passport_number = $request->passport_number;

        $member->voter_id_number = $request->voter_id_number;

        $member->perm_province_id = $request->perm_province_id;
        $member->perm_district_id = $request->perm_district_id;
        $member->perm_local_level_id = $request->perm_local_level_id;

        $member->perm_local_level_type_id = $request->perm_local_level_type_id;
        $member->perm_ward_number = $request->perm_ward_number;
        $member->perm_tole = $request->perm_tole;

        $member->temp_province_id = $request->temp_province_id;
        $member->temp_district_id = $request->temp_district_id;
        $member->temp_local_level_id = $request->temp_local_level_id;

        $member->temp_local_level_type_id = $request->temp_local_level_type_id;
        $member->temp_ward_number = $request->temp_ward_number;
        $member->temp_tole = $request->temp_tole;


        $member->email = $request->email;
        $member->phone_number = $request->phone_number;
        $member->mobile_number = $request->mobile_number;

        $member->cast = $request->cast;
        $member->category = $request->category;
        $member->category_source = $request->category_source;

        $member->education_qualification = $request->education_qualification;
        $member->blood_group = $request->blood_group;
        $member->other_identity = $request->other_identity;

        $member->father_name = $request->father_name;
        $member->mother_name = $request->mother_name;
        $member->grand_father_name = $request->grand_father_name;

        $member->grand_mother_name = $request->grand_mother_name;

        $member->mariatal_status_id = $request->mariatal_status_id;
        $member->wife_name = $request->wife_name;
        $member->total_family_member = $request->total_family_member;


        $member->profession = $request->profession;
        $member->source_income = $request->source_income;

        $member->property_cash = $request->property_cash;
        $member->property_fixed = $request->property_fixed;
        $member->property_share = $request->property_share;

        $member->property_other = $request->property_other;

        $member->party_post = $request->party_post;
        $member->committee_name = $request->committee_name;
        $member->party_lebidar = $request->party_lebidar;

        $member->party_joined_date_ad = $request->party_joined_date_ad;
        $member->party_joined_date_bs = $request->party_joined_date_bs;
        $member->party_location = $request->party_location;

        $member->political_background = $request->political_background;

        if ($request->has('own_image') && ($request->own_image != '')) {
            $ownImagePath = $member->own_image;
            if (File::exists($ownImagePath)) {
                unlink($ownImagePath);
                $member->deleteImage();
            }
            $ownImage = $request->own_image->store('member/profile', 'public');
            $member->own_image = $ownImage;
        }else{
            $member->own_image = null;
        }
        if ($request->has('sign_image') && ($request->sign_image != '')) {
            $signImagePath = $member->sign_image;
            if (File::exists($signImagePath)) {
                unlink($signImagePath);
                $member->deleteImage();
            }
            $signImage = $request->sign_image->store('member/profile', 'public');
            $member->sign_image = $signImage;
        }else{
            $member->sign_image = null;
        }
        if ($request->has('citizenship_front') && ($request->citizenship_front != '')) {
            $citizenshipFrontPath = $member->citizenship_front;
            if (File::exists($citizenshipFrontPath)) {
                unlink($citizenshipFrontPath);
                $member->deleteImage();
            }
            $citizenshipFront = $request->citizenship_front->store('member/citizenship', 'public');
            $member->citizenship_front = $citizenshipFront;
        }else{
            $member->citizenship_front = null;
        }

        if ($request->has('citizenship_back') && ($request->citizenship_back != '')) {
            $citizenshipBackPath = $member->citizenship_back;
            if (File::exists($citizenshipBackPath)) {
                unlink($citizenshipBackPath);
                $member->deleteImage();
            }
            $citizenshipBack = $request->citizenship_back->store('member/citizenship', 'public');
            $member->citizenship_back = $citizenshipBack;
        }else{
            $member->citizenship_back = null;
        }
        if ($request->has('passport_front') && ($request->passport_front != '')) {
            $passportFrontPath = $member->passport_front;
            if (File::exists($passportFrontPath)) {
                unlink($passportFrontPath);
                $member->deleteImage();
            }
            $passportFront = $request->passport_front->store('member/passport', 'public');
            $member->passport_front = $passportFront;
        }else{
            $member->passport_front = null;
        }
        if ($request->has('passport_back') && ($request->passport_back != '')) {
            $passportBackPath = $member->passport_back;
            if (File::exists($passportBackPath)) {
                unlink($passportBackPath);
                $member->deleteImage();
            }
            $passportBack = $request->passport_back->store('member/passport', 'public');
            $member->passport_back = $passportBack;
        }else{
            $member->passport_back = null;
        }

        if ($request->has('license_image') && ($request->license_image != '')) {
            $licenseImagePath = $member->license_image;
            if (File::exists($licenseImagePath)) {
                unlink($licenseImagePath);
                $member->deleteImage();
            }
            $licenseImage = $request->license_image->store('member/license', 'public');
            $member->license_image = $licenseImage;
        }else{
            $member->license_image = null;
        }
        if ($request->has('pan_front') && ($request->pan_front != '')) {
            $panFrontPath = $member->pan_front;
            if (File::exists($panFrontPath)) {
                unlink($panFrontPath);
                $member->deleteImage();
            }
            $panFront = $request->pan_front->store('member/pan', 'public');
            $member->pan_front = $panFront;
        }else{
            $member->pan_front = null;
        }
        if ($request->has('pan_back') && ($request->pan_back != '')) {
            $panBackPath = $member->pan_back;
            if (File::exists($panBackPath)) {
                unlink($panBackPath);
                $member->deleteImage();
            }
            $panBack = $request->pan_back->store('member/pan', 'public');
            $member->pan_back = $panBack;
        }else{
            $member->pan_back = null;
        }

        $member->save();
        Alert::toast('Member Updated Successfully', 'success');
        return redirect()->route('admin.member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Membership::find($id);
        $ownImagePath = $member->own_image;
        if (File::exists($ownImagePath)) {
            unlink($ownImagePath);
            $member->deleteImage();
        }
        $signImagePath = $member->sign_image;
        if (File::exists($signImagePath)) {
            unlink($signImagePath);
            $member->deleteImage();
        }
        $citizenshipFrontPath = $member->citizenship_front;
        if (File::exists($citizenshipFrontPath)) {
            unlink($citizenshipFrontPath);
            $member->deleteImage();
        }

        $citizenshipBackPath = $member->citizenship_back;
        if (File::exists($citizenshipBackPath)) {
            unlink($citizenshipBackPath);
            $member->deleteImage();
        }
        $passportFrontPath = $member->passport_front;
        if (File::exists($passportFrontPath)) {
            unlink($passportFrontPath);
            $member->deleteImage();
        }
        $passportBackPath = $member->passport_back;
        if (File::exists($passportBackPath)) {
            unlink($passportBackPath);
            $member->deleteImage();
        }

        $licenseImagePath = $member->license_image;
        if (File::exists($licenseImagePath)) {
            unlink($licenseImagePath);
            $member->deleteImage();
        }
        $panFrontPath = $member->pan_front;
        if (File::exists($panFrontPath)) {
            unlink($panFrontPath);
            $member->deleteImage();
        }
        $panBackPath = $member->pan_back;
        if (File::exists($panBackPath)) {
            unlink($panBackPath);
            $member->deleteImage();
        }

        $member->delete();
        Alert::toast('Member Deleted Successfully', 'success');
        return redirect()->back();
    }
}
