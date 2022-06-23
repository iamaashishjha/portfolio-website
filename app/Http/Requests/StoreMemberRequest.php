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
        
        // ,except,id
        return [
            'name_en' => 'nullable',
            'name_lc' => 'nullable',
            'gender_id' => 'nullable',
            'birth_date_ad' => 'nullable',
            'birth_date_bs' => 'nullable',
            'citizen_province_id' => 'integer',
            'citizen_district_id' => 'integer',
            'citizenship_number' => 'required|unique:memberships,citizenship_number',
            'passport_number' => 'integer',
            'voter_id_number' => 'integer',
            'perm_province_id' => 'integer',
            'perm_district_id' => 'integer',
            'perm_local_level_id' => 'integer',
            'perm_local_level_type_id' => 'integer',
            'perm_ward_number' => 'integer',
            'perm_tole' => 'nullable',
            'temp_province_id' => 'integer',
            'temp_district_id' => 'integer',
            'temp_local_level_id' => 'integer',
            'temp_local_level_type_id' => 'integer',
            'temp_ward_number' => 'integer',
            'temp_tole' => 'nullable',
            'email' => 'email|required|unique:memberships,email',
            'phone_number' => 'integer|required|unique:memberships,phone_number',
            'mobile_number' => 'integer|required|unique:memberships,mobile_number',
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
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'title.required' => 'A title is required',
            // 'body.required' => 'A message is required',
            // 'same' => 'The :attribute and :other must match.',
            // 'size' => 'The :attribute must be exactly :size.',
            // 'between' => 'The :attribute value :input is not between :min - :max.',
            // 'in' => 'The :attribute must be one of the following types: :values',
            'unique' => 'The :attribute must be unique',
            'required' => 'The :attribute field is required',
            'max' => 'The :attribute size cannot be greater than :max'

        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'citizen_province_id' => 'Citizenship Province',
            'citizen_district_id' => 'Citizenship Disrict',
            'perm_province_id' => 'Permanent Address Print',
            'perm_district_id' => 'Permanent Address District',
            'perm_local_level_id' => 'Permanent Local Level',
            'perm_local_level_type_id' => 'Permanenet Local Level Type',
            'temp_province_id' => 'Tag Meta Title',
            'temp_district_id' => 'Tag Meta Title',
            'temp_local_level_id' => 'Tag Meta Title',
            'temp_local_level_type_id' => 'Tag Meta Title',
            'temp_ward_number' => 'Tag Meta Title',
            'temp_tole' => 'Tag Meta Title',
            'phone_number' => 'Tag Meta Title',
            'mobile_number' => 'Tag Meta Title',
        ];
    }
}
