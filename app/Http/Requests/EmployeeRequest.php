<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
              'name'=>'required',
              'employeeUniqueId'=>'unique',
              'user_id' => 'required|unique:employees,user_id',
        ];
    }

   public function messages()
   {
        return[
              'employeeUniqueId.unique'=>'Employee id must be unique!',
              'user_id.required'=>'User name is required!',
              'user_id.unique'=>'This user is already Taken!'
        ];
   }

}
