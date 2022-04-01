<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogTagsRequest extends FormRequest
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
            'title' => 'required|unique:blog_categories,title',
            'description' => 'required|max:250',
            'tag_image' => 'required|max:20000',
            'slug' => 'required|unique:blog_categories,title',
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
            'title' => 'Tag Title',
            'description' => 'Tag Description',
            'tag_image' => 'Tag Image',
            'slug' => 'Tag Slug',
            'meta_description' => 'Tag Meta Description',
            'keywords' => 'Tag Keywords',
            'meta_title' => 'Tag Meta Title'
        ];
    }
}
