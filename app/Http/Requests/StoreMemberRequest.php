<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_en' => 'required',
            'name_lc' => 'required',
            'gender_id' => 'required',
            'birth_date_ad' => 'required',
            'birth_date_bs' => 'required',
            'citizen_province_id' => 'required',
            'citizen_district_id' => 'required',
            'citizenship_number' => 'required',
            'passport_number' => 'required',
            'voter_id_number' => 'required',
            'perm_province_id' => 'required',
            'perm_district_id' => 'required',
            'perm_local_level_id' => 'required',
            'perm_local_level_type_id' => 'required',
            'perm_ward_number' => 'required',
            'perm_tole' => 'required',
            'temp_province_id' => 'required',
            'temp_district_id' => 'required',
            'temp_local_level_id' => 'required',
            'temp_local_level_type_id' => 'required',
            'temp_ward_number' => 'required',
            'temp_tole' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'mobile_number' => 'required',
            'cast' => 'required',
            'category' => 'required',
            'category_source' => 'required',
            'education_qualification' => 'required',
            'blood_group' => 'required',
            'other_identity' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'grand_father_name' => 'required',
            'grand_mother_name' => 'required',
            'mariatal_status_id' => 'required',
            'wife_name' => 'required',
            'total_family_member' => 'required',
            'profession' => 'required',
            'source_income' => 'required',
            'property_cash' => 'required',
            'property_fixed' => 'required',
            'property_share' => 'required',
            'property_other' => 'required',
            'party_post' => 'required',
            'committee_name' => 'required',
            'party_lebidar' => 'required',
            'party_joined_date_ad' => 'required',
            'party_joined_date_bs' => 'required',
            'party_location' => 'required',
            'political_background' => 'nullable',
            'own_image' => 'required',
            'sign_image' => 'required',
            'citizenship_front' => 'required',
            'citizenship_back' => 'required',
            'passport_front' => 'required',
            'passport_back' => 'required',
            'license_image' => 'required',
            'pan_front' => 'required',
            'pan_back' => 'required',
        ];
    }
}
