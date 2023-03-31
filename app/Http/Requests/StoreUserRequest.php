<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'email' => 'required|string|email|min:5|max:255|unique:users',
            'password' => 'string|min:5|max:255|confirmed',
            'image_path' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'User Name Field',
            'email' => 'User Email Field',
            'password' => 'User Password Field',
            'image_path' => 'User Image Field',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute is required',
            'min' => 'The :attribute must be minimum :min characters',
            'max' => 'The :attribute must be maximum :max characters',
            'string' => 'The :attribute must be String (Text)',
            'email' => 'The :attribute must be an email Id',
            'email.unique' => 'Email is already taken. Try another Email.',
        ];
    }
}
