<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            return [
                'name_en' => 'nullable',
                'name_lc' => 'nullable',
                'gender_id' => 'nullable',
                'birth_date_ad' => 'nullable',
                'birth_date_bs' => 'nullable',
                'citizen_province_id' => 'nullable',
                'citizen_district_id' => 'nullable',
                'citizenship_number' => 'nullable',
                'passport_number' => 'nullable',
                'voter_id_number' => 'nullable',
                'perm_province_id' => 'nullable',
                'perm_district_id' => 'nullable',
                'perm_local_level_id' => 'nullable',
                'perm_local_level_type_id' => 'nullable',
                'perm_ward_number' => 'nullable',
                'perm_tole' => 'nullable',
                'temp_province_id' => 'nullable',
                'temp_district_id' => 'nullable',
                'temp_local_level_id' => 'nullable',
                'temp_local_level_type_id' => 'nullable',
                'temp_ward_number' => 'nullable',
                'temp_tole' => 'nullable',
                'email' => 'nullable',
                'phone_number' => 'nullable',
                'mobile_number' => 'nullable',
                'cast' => 'nullable',
                'category' => 'nullable',
                'category_source' => 'nullable',
                'education_qualification' => 'nullable',
                'blood_group' => 'nullable',
                'other_identity' => 'nullable',
                'father_name' => 'nullable',
                'mother_name' => 'nullable',
                'grand_father_name' => 'nullable',
                'grand_mother_name' => 'nullable',
                'mariatal_status_id' => 'nullable',
                'wife_name' => 'nullable',
                'total_family_member' => 'nullable',
                'profession' => 'nullable',
                'source_income' => 'nullable',
                'property_cash' => 'nullable',
                'property_fixed' => 'nullable',
                'property_share' => 'nullable',
                'property_other' => 'nullable',
                'party_post' => 'nullable',
                'committee_name' => 'nullable',
                'party_lebidar' => 'nullable',
                'party_joined_date_ad' => 'nullable',
                'party_joined_date_bs' => 'nullable',
                'party_location' => 'nullable',
                'political_background' => 'nullable',
                'own_image' => 'nullable',
                'sign_image' => 'nullable',
                'citizenship_front' => 'nullable',
                'citizenship_back' => 'nullable',
                'passport_front' => 'nullable',
                'passport_back' => 'nullable',
                'license_image' => 'nullable',
                'pan_front' => 'nullable',
                'pan_back' => 'nullable',
            ];
        ];
    }
}
