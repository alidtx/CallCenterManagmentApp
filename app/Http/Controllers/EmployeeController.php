<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Str;
class EmployeeController extends Controller
{
    
    public function index()
    {
     
     $data['employees']=Employee::orderby('id', 'DESC')->paginate(10);  
     return view('backend.employee.list', $data);
    }

   
    public function create($id='')
    {
         if($id>0){
             $arr=Employee::where('id', $id)->get(); 
             $result['name']=$arr[0]->name;  
             $result['employeeUniqueId']=$arr[0]->employeeUniqueId;  
             $result['id']=$arr[0]->id;  
         }else{
            $result['name']='';
            $result['employeeUniqueId']='';  
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
