<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'business_name' => 'required',
            'looking_amount' => 'required|numeric',
            'credit_score' => 'required|numeric',
            'phone' => 'required|numeric',
            'campaign_id' => 'required',
            'isDnc' => 'required',
        ];
    }

    public function messages() 
    
    {

          return [

            'first_name.required'=>'Please enter first name',
            'last_name.required'=>'Please enter last name',
            'email.required'=>'Please enter email',
            'business_name.required'=>'Please enter business name',
            'looking_amount.required'=>'Please enter looking amount',
            'looking_amount.numeric'=>'Looking amount must be a numeric!!',
            'credit_score.required'=>'Please enter credit score',
            'credit_score.numeric'=>'Credit Score must be a numeric!!',
            'phone.required'=>'Please enter phone number',
            'phone.numeric'=>'Phone must be a numeric!!',
            'campaign_id.required'=>'Please select campaign name',
            'isDnc.required'=>'Please tab yes or no',
              
          ];

    }



}
