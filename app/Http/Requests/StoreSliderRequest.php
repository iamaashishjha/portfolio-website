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
            'slider_image_a' => 'required',
            'heading1' => 'required',
            'subheading1' => 'required',
            'slider_image_b' => 'nullable',
            'heading2' => 'nullable',
            'subheading2' => 'nullable',
            'slider_image_c' => 'nullable',
            'heading3' => 'nullable',
            'subheading3' => 'nullable',
            'slider_image_d' => 'nullable',
            'heading4' => 'nullable',
            'subheading4' => 'nullable',
            'slider_image_e' => 'nullable',
            'heading5' => 'nullable',
            'subheading5' => 'nullable',
        ];
    }
}
