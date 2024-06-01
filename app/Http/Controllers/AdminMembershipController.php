<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Gender;
use App\Models\Province;
use App\Traits\AuthTrait;
use App\Traits\FileTrait;

use App\Mail\ApproveMember;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LocalLevelType;
use App\Models\PaymentGateways;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Traits\Base\BaseAdminController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Jobs\SendMembershipApprovalMailJob;
use App\Http\Requests\Memeber\MemberRequest;
use App\Models\Membership\Member;
use App\Repositories\MembershipRepository;

class AdminMembershipController extends BaseAdminController
{
    use FileTrait;
    protected $repo;
    public function __construct(MembershipRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getRegisteredMembers()
    {
        // $this->checkPermission('list');
        $this->data['members'] = $this->repo->getRegisteredMemebers();
        return view('ar.membership.registered-members', $this->data);
    }

    public function getApprovedMembers()
    {
        // $this->checkPermission('list');
        $this->data['members'] = $this->repo->getApprovedMemebers();
        return view('ar.membership.approved-members', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkPermission('create');
        $this->data  = $this->repo->getMembershipFormData();
        return view('ar.membership.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        try {
            // $this->checkPermission('create');
            $member = $this->repo->storeOrUpdateMembership($request->validated());
            return response()->json(['data' => $member], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
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
        // $this->checkPermission('update');
        $this->data['member'] = $this->model::find($id);
        $this->data['provinces'] = Province::all();
        $this->data['genders'] = Gender::all();
        $this->data['localleveltypes'] = LocalLevelType::all();
        return view('ar.membership.form', $this->data);
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
        try {
            $destinationPath = 'member/';
            DB::beginTransaction();
            $member = $this->model::find($id);
            $ownImage = $this->uploadFileToDisk($request, 'own_image', $destinationPath, $member->own_image);
            $signImage = $this->uploadFileToDisk($request, 'sign_image', $destinationPath, $member->sign_image);
            $citizenshipFront = $this->uploadFileToDisk($request, 'citizenship_front', $destinationPath, $member->citizenship_front);
            $citizenshipBack = $this->uploadFileToDisk($request, 'citizenship_back', $destinationPath, $member->citizenship_back);
            $passportFront = $this->uploadFileToDisk($request, 'passport_front', $destinationPath, $member->passport_front);
            $passportBack = $this->uploadFileToDisk($request, 'passport_back', $destinationPath, $member->passport_back);
            $licenseImage = $this->uploadFileToDisk($request, 'license_image', $destinationPath, $member->license_image);
            $panFront = $this->uploadFileToDisk($request, 'pan_front', $destinationPath, $member->pan_front);
            $panBack = $this->uploadFileToDisk($request, 'pan_back', $destinationPath, $member->pan_back);
            $memberArr = [
                'name_en' => $request->name_en,
                'name_lc' => $request->name_lc,
                'gender_id' => $request->gender_id,
                'birth_date_ad' => $request->birth_date_ad,
                'birth_date_bs' => $request->birth_date_bs,
                'citizen_province_id' => $request->citizen_province_id,
                'citizen_district_id' => $request->citizen_district_id,
                'citizenship_number' => $request->citizenship_number,
                'passport_number' => $request->passport_number,
                'voter_id_number' => $request->voter_id_number,
                'perm_province_id' => $request->perm_province_id,
                'perm_district_id' => $request->perm_district_id,
                'perm_local_level_id' => $request->perm_local_level_id,
                'perm_local_level_type_id' => $request->perm_local_level_type_id,
                'perm_ward_number' => $request->perm_ward_number,
                'perm_tole' => $request->perm_tole,
                'temp_province_id' => $request->temp_province_id,
                'temp_district_id' => $request->temp_district_id,
                'temp_local_level_id' => $request->temp_local_level_id,
                'temp_local_level_type_id' => $request->temp_local_level_type_id,
                'temp_ward_number' => $request->temp_ward_number,
                'temp_tole' => $request->temp_tole,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'mobile_number' => $request->mobile_number,
                'cast' => $request->cast,
                'category' => $request->category,
                'category_source' => $request->category_source,
                'education_qualification' => $request->education_qualification,
                'blood_group' => $request->blood_group,
                'other_identity' => $request->other_identity,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'grand_father_name' => $request->grand_father_name,
                'grand_mother_name' => $request->grand_mother_name,
                'mariatal_status_id' => $request->mariatal_status_id,
                'wife_name' => $request->wife_name,
                'total_family_member' => $request->total_family_member,
                'profession' => $request->profession,
                'source_income' => $request->source_income,
                'property_cash' => $request->property_cash,
                'property_fixed' => $request->property_fixed,
                'property_share' => $request->property_share,
                'property_other' => $request->property_other,
                'party_post' => $request->party_post,
                'committee_name' => $request->committee_name,
                'party_lebidar' => $request->party_lebidar,
                'party_joined_date_ad' => $request->party_joined_date_ad,
                'party_joined_date_bs' => $request->party_joined_date_bs,
                'party_location' => $request->party_location,
                'party_lebidar' => $request->political_background,
                'political_background' => $ownImage,
                'party_lebidar' => $ownImage,
                'party_lebidar' => $ownImage,
                // Images and File
                'own_image' => $ownImage,
                'sign_image' => $signImage,
                'citizenship_front' => $citizenshipFront,
                'citizenship_back' => $citizenshipBack,
                'passport_front' => $passportFront,
                'passport_back' => $passportBack,
                'license_image' => $licenseImage,
                'pan_front' => $panFront,
                'pan_back' => $panBack,
                'updated_by' => Auth::id(),
            ];
            $member->update($memberArr);
            DB::commit();
            Alert::toast('Member Updated Successfully', 'success');
            return redirect()->route('admin.member.index');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('admin.member.index');
            Alert::toast($th->getMessage(), 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkPermission('delete');
        $member = $this->model::find($id);
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
        $member->deleted_by = Auth::id();
        $member->deleted_at = now();
        $member->save();
        Alert::toast('Member Deleted Successfully', 'success');
        return redirect()->back();
    }


    public function approveMember($id)
    {
        try {
            $this->repo->approveMember($id);
            Alert::success('Member Approved');
            return redirect()->back();
        } catch (\Throwable $th) {
            Alert::error($th->getMessage());
            return redirect()->back();
        }
    }
}
