<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentsRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            // 'file' => 'required',
            // 'url' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'keywords' => 'required',
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
            'title' => 'Document Title',
            'description' => 'Document Description',
            'image' => 'Document Image',
            'file' => 'Document File',
            'is_active' => 'Document Active Status',
            'meta_title' => 'Document Meta Title',
            'meta_description' => 'Document Meta Description',
            'keywords' => 'Document keywords',
        ];
    }
}
