<?php

namespace App\Repositories;

use Exception;
use App\Models\Gender;
use App\Models\Province;
use App\Traits\FileTrait;
use Illuminate\Support\Str;
use App\Models\PaymentGateways;
use App\Models\Membership\Member;
use Illuminate\Support\Facades\DB;
use App\Traits\Base\BaseRepository;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendMembershipApprovalMailJob;
use App\Repositories\Interfaces\MembershipInterface;

class MembershipRepository extends BaseRepository implements MembershipInterface
{
    use FileTrait;
    protected $model;
    public function __construct(Member $model)
    {
        $this->model = $model;
    }

    public function getMembershipFormData()
    {
        return [
            "genders" => Gender::all(),
            "provinces" => Province::all(),
            "payment_gateways" => PaymentGateways::all(),
        ];
    }

    public function getRegisteredMemebers()
    {
        return $this->model->where('is_verified', false)->get();
    }

    public function getApprovedMemebers()
    {
        return $this->model->where('is_verified', true)->get();
    }

    public function storeOrUpdateMembership(array $requestsArr, ?int $modelId): Member
    {
        return DB::transaction(function () use ($requestsArr, $modelId) {
            $membershipRqstArr = $requestsArr['membership'];
            $membershipRqstArr['membership_id'] = $this->generateMembershipId();
            $addressRqstArr = $requestsArr['address'];
            $identityRqstArr = $requestsArr['identity'];
            $identityRqstArr['identity_type_id'] = 1;
            $userRqstArr = $requestsArr['user'];
            if ($modelId) {
                $member = $this->model->findOrFail($modelId);
                $member->update($membershipRqstArr);
                $member->addressesEntity()->delete();
                $member->identityEntities()->delete();
                $userRqstArr['name'] = $member->name;
                if (isset($userRqstArr['email'])) {
                    $member->userEntity()->update($userRqstArr);
                }
            } else {
                $member = $this->model->create($membershipRqstArr);
                $userRqstArr['password'] = Hash::make('Password@12345');
                $member->userEntity()->create($userRqstArr);
            }
            $member->addressesEntity()->create($addressRqstArr);
            $member->identityEntities()->create($identityRqstArr);
            return $member;
        });


        // $ownImage = $this->uploadFileToDiskFromArray($requestsArr, 'own_image', 'member/profile');
        // $signImage = $this->uploadFileToDiskFromArray($requestsArr, 'sign_image', 'member/profile');
        // $citizenshipFront = $this->uploadFileToDiskFromArray($requestsArr, 'citizenship_front', 'member/citizenship');
        // $citizenshipBack = $this->uploadFileToDiskFromArray($requestsArr, 'citizenship_back', 'member/citizenship');
        // $passportFront = $this->uploadFileToDiskFromArray($requestsArr, 'passport_front', 'member/passport');
        // $passportBack = $this->uploadFileToDiskFromArray($requestsArr, 'passport_back', 'member/passport');
        // $licenseImage = $this->uploadFileToDiskFromArray($requestsArr, 'license_image', 'member/license');
        // $panFront = $this->uploadFileToDiskFromArray($requestsArr, 'pan_front', 'member/pan');
        // $panBack = $this->uploadFileToDiskFromArray($requestsArr, 'pan_back', 'member/pan');
        // $this->model->create($requestsArr);

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

    public function approveMember(int $modelId): void
    {
        $member = $this->model->with('userEntity')->findOrFail($modelId);
        if ($member->is_verified) {
            throw new Exception("Member Already Approved", 400);
        } else {
            DB::transaction(function () use ($member) {
                $member->is_verified = true;
                $member->verified_by = auth()->id();
                $member->verified_at = now();
                $member->save();
            });
            dispatch(new SendMembershipApprovalMailJob($member, $member->userEntity->email));
        }
    }

    private function generateMembershipId()
    {
        return Str::uuid()->toString();
    }
}
