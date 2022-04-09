<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserBlogPostRequest extends FormRequest
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
            'title' => 'required|unique:blog_posts,title',
            'description' => 'required|max:250',
            'content' => 'required',
            'post_image' => 'required|max:20000',
            'alt_text' => 'required',
            'slug' => 'required|unique:blog_posts,slug',
            'meta_description' => 'required',
            'keywords' => 'required',
            'meta_title' => 'required',
            'status' => ' nullable',
            'tags' => 'required|nullable',
            'category_id' => 'required',
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
            'title' => 'Post Title',
            'description' => 'Post Description',
            'content' => 'Post Content',
            'post_image' => 'Post Imgae',
            'alt_text' => 'Post Image Alt-Text',
            'slug' => 'Post Slug',
            'meta_description' => 'Post Meta Description',
            'keywords' => 'Post Keywords',
            'meta_title' => 'Post Meta Title',
            'status' => ' Post Status',
            'tags' => 'Post Tags',
            'category_id' => 'Post Category',
        ];
    }
}
