<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
            'slider_title' => 'required',
            'slider_description' => 'required',
            'image_a' => 'required',
            'heading1' => 'required',
            'subheading1' => 'required',
            'image_b' => 'nullable',
            'heading2' => 'nullable',
            'subheading2' => 'nullable',
            'image_c' => 'nullable',
            'heading3' => 'nullable',
            'subheading3' => 'nullable',
            'image_d' => 'nullable',
            'heading4' => 'nullable',
            'subheading4' => 'nullable',
            'image_e' => 'nullable',
            'heading5' => 'nullable',
            'subheading5' => 'nullable',
        ];
    }
}
