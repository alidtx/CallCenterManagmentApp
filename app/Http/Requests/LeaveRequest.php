<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
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
             'employee_id'=>'required',
             'designation_id'=>'required',
             'department_id'=>'required',
             'date_of_leave'=>'required',
             'until'=>'required',
             'total_working_day'=>'required',
             'next_join_day'=>'required',
             'leave_category'=>'required',
             'reason'=>'required',
             'phone'=>'required',
        ];
    }

    public function messages()
    {
       return [

            'employee_id.required'=>'Please select employee!!',
            'designation.required'=>'Please select your designation!!',
            'department.required'=>'Please select your department!!',
            'date_of_leave.required'=>'Type leave day!!',
            'until.required'=>'Till which day needed!!',
            'next_join_day.required'=>'What day you want to join?',
            'reason.required'=>'Reason it',
            'phone.required'=>'What is your phone number?',
       ];
    }

}
