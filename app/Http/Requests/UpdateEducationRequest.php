<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
        $route = $this->route('education');
        $id_check = ($route) ? "," . $route : ",NULL";
        return [
            'title' => 'required|unique:info_educations,title',
            'description' => 'required|max:250',
            'start_date' => 'required',
            'end_date' => 'required',
            'education_image' => 'required|max:20000',
            'university' => 'nullable',
            'grades' => 'required',
            'no_of_year' => 'required',
            'is_active' => 'nullable',
        ];
    }
}
