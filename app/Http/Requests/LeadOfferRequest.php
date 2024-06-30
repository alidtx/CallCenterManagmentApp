<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type'=>'required',
            'amount'=>'required',
        ];
    }

    public function messages()
    {
          return [
                'type.required'=>'Please select offers type!',
                'amount.required'=>'please put amount!',

          ];
    }
}
