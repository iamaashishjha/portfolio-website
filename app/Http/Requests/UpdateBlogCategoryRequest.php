<?php

namespace App\Http\Requests;

use App\Models\BlogCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogCategoryRequest extends FormRequest
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
        $route = $this->route('category');
        $id_check = ($route) ? "," . $route : ",NULL";

        return [
            'title' => 'required|unique:blog_categories,title'.$id_check,
            'description' => 'required|max:250',
            'category_image' => 'nullable|max:20000',
            // 'slug' => 'required|unique:blog_categories,title'.$id_check,
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
