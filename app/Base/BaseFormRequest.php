<?php

namespace App\Base;

use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
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
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'The :attribute field is required',
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
            // 'site_title' => 'Site Title',
            // 'site_title_image' => 'Site Title Image',
            // 'meta_description' => 'Site Meta Description',
            // 'keywords' => 'Site Keywords',
            // 'meta_title' => 'Site Meta Title'
        ];
    }
}
