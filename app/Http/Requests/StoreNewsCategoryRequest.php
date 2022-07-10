<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsCategoryRequest extends FormRequest
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
            'description' => 'required|max:250',
            'category_image' => 'required|max:20000',
            'slug' => 'required',
            'meta_description' => 'required',
            'keywords' => 'required',
            'meta_title' => 'required',
            'status' => ' nullable'
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
            'title' => 'Category Title',
            'description' => 'Category Description',
            'category_image' => 'Category Image',
            'slug' => 'Category Slug',
            'meta_description' => 'Category Meta Description',
            'keywords' => 'Category Keywords',
            'meta_title' => 'Category Meta Title'
        ];
    }
}
