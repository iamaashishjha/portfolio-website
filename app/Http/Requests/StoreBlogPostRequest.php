<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPostRequest extends FormRequest
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
            'slug' => 'required|unique:blog_posts,title',
            'meta_description' => 'required',
            'keywords' => 'required',
            'meta_title' => 'required',
            'status' => ' nullable',
            'tags' => 'nullable',
            'category_id' => 'required'
        ];
    }
}
