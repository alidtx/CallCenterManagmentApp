<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Str;
use App\Models\User;
class EmployeeController extends Controller
{
    
    public function index()
    {
     
     $data['employees']=Employee::orderby('id', 'DESC')->paginate(10);  
     return view('backend.employee.list', $data);
     
    }

   
    public function create($id='')
    {    
        $result['users']=User::where('status', 1)->get();
        $result['designations']=Designation::where('status', 1)->get();
        $result['departments']=Department::where('status', 1)->get();
         if($id>0){
             $arr=Employee::where('id', $id)->get(); 
             $result['name']=$arr[0]->name;  
             $result['user_id']=$arr[0]->user_id;  
             $result['designation_id']=$arr[0]->designation_id;  
             $result['department_id']=$arr[0]->department_id;  
             $result['employeeUniqueId']=$arr[0]->employeeUniqueId;  
             $result['id']=$arr[0]->id;  
         }else{
            $result['name']='';
            $result['employeeUniqueId']='';  
            $result['user_id']='';
            $result['designation_id']='';  
            $result['department_id']=''; 
            $result['id']='';
         }
      return view('backend.employee.add', $result);
    }   

  

     function generateUniqueEmployeeId() {
      do {
          $uniqueId = rand(10000, 99999); 
      } while (Employee::where('employeeUniqueId', $uniqueId)->exists());
  
      return $uniqueId;
    }

    public function store(EmployeeRequest $request)
    {   

        if($request->id > 0){                          
            $model = Employee::find($request->id);
            Toastr::success('Employee edited successfully', 'edited');
        } else {
            $model = new Employee();   
            Toastr::success('Employee created successfully', 'Created');
            $model->employeeUniqueId = $this->generateUniqueEmployeeId();
        }
        $model->name = $request->name;
        $model->user_id = $request->user_id;
        $model->designation_id = $request->designation_id;
        $model->department_id = $request->department_id;
        $model->save();
        return redirect()->route('employee.list');
    }
  
    public function destroy(Employee $employee)
    {
        //
    }

  public function status($status, $id) {
     $model=Employee::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('employee.list');
     Toastr::success('Employee status has changed successfully', 'Status');
  }



}
