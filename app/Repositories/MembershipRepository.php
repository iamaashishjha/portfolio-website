<?php

namespace App\Repositories;

use App\Traits\FileTrait;
use App\Models\Member;
use Illuminate\Support\Str;
use App\Repositories\Interfaces\MembershipInterface;

class MembershipRepository implements MembershipInterface
{
    use FileTrait;

    protected $model;

    public function __construct(Member $model)
    {
        $this->model = $model;
    }


    public function generateMembershipId()
    {
        return Str::uuid()->toString();
    }

    public function storeOrUpdateMembership(array $requestsArr, int $modelId){

        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }

        $ownImage = $this->uploadFileToDiskFromArray($requestsArr, 'own_image', 'member/profile');
        $signImage = $this->uploadFileToDiskFromArray($requestsArr, 'sign_image', 'member/profile');
        $citizenshipFront = $this->uploadFileToDiskFromArray($requestsArr, 'citizenship_front', 'member/citizenship');
        $citizenshipBack = $this->uploadFileToDiskFromArray($requestsArr, 'citizenship_back', 'member/citizenship');
        $passportFront = $this->uploadFileToDiskFromArray($requestsArr, 'passport_front', 'member/passport');
        $passportBack = $this->uploadFileToDiskFromArray($requestsArr, 'passport_back', 'member/passport');
        $licenseImage = $this->uploadFileToDiskFromArray($requestsArr, 'license_image', 'member/license');
        $panFront = $this->uploadFileToDiskFromArray($requestsArr, 'pan_front', 'member/pan');
        $panBack = $this->uploadFileToDiskFromArray($requestsArr, 'pan_back', 'member/pan');
        $this->model->create($requestsArr);

        // $member = new Member();

        // $member->name_en = $request->name_en;
        // $member->name_lc = $request->name_lc;
        // $member->gender_id = $request->gender_id;
        // $member->birth_date_ad = $request->birth_date_ad;
        // $member->birth_date_bs = $request->birth_date_bs;
        // $member->citizen_province_id = $request->citizen_province_id;
        // $member->citizen_district_id = $request->citizen_district_id;
        // $member->citizenship_number = $request->citizenship_number;
        // $member->passport_number = $request->passport_number;
        // $member->voter_id_number = $request->voter_id_number;
        // $member->perm_province_id = $request->perm_province_id;
        // $member->perm_district_id = $request->perm_district_id;
        // $member->perm_local_level_id = $request->perm_local_level_id
        // $member->perm_local_level_type_id = $request->perm_local_level_type_id;
        // $member->perm_ward_number = $request->perm_ward_number;
        // $member->perm_tole = $request->perm_tole;
        // $member->temp_province_id = $request->temp_province_id;
        // $member->temp_district_id = $request->temp_district_id;
        // $member->temp_local_level_id = $request->temp_local_level_id;
        // $member->temp_local_level_type_id = $request->temp_local_level_type_id;
        // $member->temp_ward_number = $request->temp_ward_number;
        // $member->temp_tole = $request->temp_tole;
        // $member->email = $request->email;
        // $member->phone_number = $request->phone_number;
        // $member->mobile_number = $request->mobile_number;
        // $member->cast = $request->cast;
        // $member->category = $request->category;
        // $member->category_source = $request->category_source;
        // $member->education_qualification = $request->education_qualification;
        // $member->blood_group = $request->blood_group;
        // $member->other_identity = $request->other_identity;
        // $member->father_name = $request->father_name;
        // $member->mother_name = $request->mother_name;
        // $member->grand_father_name = $request->grand_father_name;
        // $member->grand_mother_name = $request->grand_mother_name;
        // $member->mariatal_status_id = $request->mariatal_status_id;
        // $member->wife_name = $request->wife_name;
        // $member->total_family_member = $request->total_family_member;
        // $member->profession = $request->profession;
        // $member->source_income = $request->source_income;
        // $member->property_cash = $request->property_cash;
        // $member->property_fixed = $request->property_fixed;
        // $member->property_share = $request->property_share;
        // $member->property_other = $request->property_other;
        // $member->party_post = $request->party_post;
        // $member->committee_name = $request->committee_name;
        // $member->party_lebidar = $request->party_lebidar;
        // $member->party_joined_date_ad = $request->party_joined_date_ad;
        // $member->party_joined_date_bs = $request->party_joined_date_bs;
        // $member->party_location = $request->party_location;
        // $member->political_background = $request->political_background;

        // $member->own_image = $ownImage;
        // $member->sign_image = $signImage;
        // $member->citizenship_front = $citizenshipFront;

        // $member->citizenship_back = $citizenshipBack;
        // $member->passport_front = $passportFront;
        // $member->passport_back = $passportBack;

        // $member->license_image = $licenseImage;
        // $member->pan_front = $panFront;
        // $member->pan_back = $panBack;

        // $member->save();
    }

}