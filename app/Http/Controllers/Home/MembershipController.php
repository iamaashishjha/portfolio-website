<?php

namespace App\Http\Controllers\Home;

use App\Models\Gender;
use App\Models\Province;
use App\Models\Membership;
use App\Models\AppSettings;
use App\Models\LocalLevelType;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreMemberRequest;
use App\Traits\Base\BaseHomeController;

class MembershipController extends BaseHomeController
{
    public $data;
    public function create()
    {
        $this->data['provinces'] = Province::all();
        $this->data['genders'] = Gender::all();
        $this->data['localleveltypes'] = LocalLevelType::all();
        $this->data['appSetting'] = AppSettings::first();
        return view('member.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
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
        Alert::success('Membership form submitted successfully. We will get back to you soon');
        return redirect('/');
    }

    public function getApprovedMembers()
    {
        $this->data['members'] = Membership::approvedMember()->get();
        return view('customHome.member.approved-member', $this->data);
    }
}
