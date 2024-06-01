<?php

namespace App\Http\Requests\Memeber;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
        // dd(request()->all());
        return [

            //Membership
            'membership.name_en' => 'required|max:255',
            'membership.name_lc' => 'required|max:255',
            'membership.gender_id' => 'required|exists:genders,id',
            'membership.email' => 'required|email|unique:users,email',
            'membership.phone_number' => 'required',
            'membership.mobile_number' => 'required|max:10|min:10',
            'membership.birth_date_ad' => 'required|date',
            'membership.birth_date_bs' => 'required',

            //GENERAL DETAILS
            'general_details.cast' => 'nullable',
            'general_details.category' => 'nullable',
            'general_details.category_source' => 'nullable',
            'general_details.education_qualification' => 'nullable',
            'general_details.blood_group' => 'nullable',
            'general_details.father_name' => 'nullable',
            'general_details.mother_name' => 'nullable',
            'general_details.grand_father_name' => 'nullable',
            'general_details.grand_mother_name' => 'nullable',
            'general_details.mariatal_status_id' => 'nullable',
            'general_details.wife_name' => 'nullable',
            'general_details.total_family_member' => 'nullable',

            //IDENTITY DETAILS
            'identity.identity_number' => 'required|max:255',
            'identity.identity_issued_date_ad' => 'required',
            'identity.identity_issued_date_bs' => 'required',
            'identity.identity_image' => 'nullable',
            'identity.identity_issued_province_id' => 'required|exists:provinces,id',
            'identity.identity_issued_district_id' => 'required|exists:districts,id',
            'identity.identity_type_id' => 'nullable|exists:identity_types,id',

            //ADDRESS DETAILS
            'address.perm_province_id' => 'required|exists:provinces,id',
            'address.perm_district_id' => 'required|exists:districts,id',
            'address.perm_local_level_id' => 'required|exists:local_levels,id',
            'address.perm_ward_number' => 'required|integer',
            'address.perm_tole' => 'nullable|string',
            'address.temp_province_id' => 'nullable|exists:provinces,id',
            'address.temp_district_id' => 'nullable|exists:districts,id',
            'address.temp_local_level_id' => 'nullable|exists:local_levels,id',
            'address.temp_ward_number' => 'nullable|integer',
            'address.temp_tole' => 'nullable|string',

            //PROPERTY DETAILS
            'property.profession' => 'nullable|string|max:255',
            'property.source_income' => 'nullable|string|max:255',
            'property.property_cash' => 'nullable|string|max:255',
            'property.property_fixed' => 'nullable|string|max:255',
            'property.property_share' => 'nullable|string|max:255',
            'property.property_other' => 'nullable|string|max:255',

            //PARTY DETAILS
            'party.party_post' => 'nullable|string|max:255',
            'party.party_committee_name' => 'nullable|string|max:255',
            'party.party_lebidar' => 'nullable|string|max:255',
            'party.party_joined_date_ad' => 'nullable|string|max:255',
            'party.party_joined_date_bs' => 'nullable|string|max:255',
            'party.party_location' => 'nullable|string|max:255',
            'party.political_background' => 'nullable|string|max:255',

        ];
    }
}
