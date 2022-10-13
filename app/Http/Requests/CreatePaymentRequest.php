<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'PassName'          => ['required', 'min:5', 'max:50'],
            'PassLastName'      => ['required', 'min:2', 'max:50'],
            'email'             => ['required', 'min:5', 'max:50'],
            'tel'               => ['required', 'max:50'],
            'PassCountry'       => ['required', 'min:5', 'max:50'],
            'PassCity'          => ['required', 'min:5', 'max:50'],
            'PassExtraPerson'   => ['min:0', 'max:10'],
            'payment_platform'  => ['required', 'exist:payment_platform,id'],
        ];
    }
}
