<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryRequest extends FormRequest
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
            'amount'=>'required|numeric',
           'employee_id' => 'required|unique:salaries,employee_id',
            'designation_id'=>'required',
            'department_id'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'amount.required'=>'Please enter employee salary!!',
            'amount.numeric'=>'Amount is only be numeric value!!',
            'employee_id'=>'Please select employee name!!',
            'employee_id.unique' => 'This employee has already been assigned a salary!!',
            'designation_id'=>'Please select employee designation!!',
            'department_id'=>'Please select employee department!! ',
        ]; 
    }
}
