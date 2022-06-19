<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibraryRequest extends FormRequest
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
            'file' => 'nullable',
            'url' => 'required',
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
            'title' => 'Book Title',
            'description' => 'Book Description',
            'image' => 'Book Image',
            'file' => 'Book File',
            'is_active' => 'Book Active Status',
            'meta_title' => 'Book Meta Title',
            'meta_description' => 'Book Meta Description',
            'keywords' => 'Book keywords',
        ];
    }
}
