<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEducationRequest extends FormRequest
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
            'title' => 'required|unique:info_educations,title',
            'description' => 'required|max:250',
            'start_date' => 'required',
            'end_date' => 'required',
            'education_image' => 'required|max:20000',
            'institution' => 'required',
            'university' => 'nullable',
            'grades' => 'required',
            'no_of_year' => 'required',
            'is_active' => 'nullable',
        ];
    }

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
            'title' => 'Education Title',
            'description' => 'Education Description',
            'start_date' => 'Education Start Date',
            'end_date' => 'Education End Date',
            'education_image' => 'Education Image',
            'institution' => 'Education Institution Name',
            'university' => 'Education University',
            'grades' => 'Education Grades',
            'no_of_year' => 'No of Years',
            'is_active' => 'Is Active',
        ];
    }
}
