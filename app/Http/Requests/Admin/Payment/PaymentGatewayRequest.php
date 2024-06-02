<?php

namespace App\Http\Requests\Admin\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentGatewayRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required',
            'base_url' => 'required',
            'image' => 'nullable',
            'secret_key' => 'nullable',
            'signing_key' => 'nullable',
            'is_active' => 'nullable',
        ];
    }
}
