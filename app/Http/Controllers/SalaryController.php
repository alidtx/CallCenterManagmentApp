<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryRequest;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
class SalaryController extends Controller
{

    public function index()
    {
     $data['salaries']=Salary::with('employee', 'designation','department')->get();  
      // dd($data['salaries']);
     return view('backend.salary.list', $data);
    }

    public function view($id) {
        $lead = Salary::with('user_name')->find($id);
        return view('backend.salary.add', compact('lead'));
    }
    
    public function create($id='') 
    {      
      $result['employees']=Employee::get();  
      $result['designations']=Designation::get();  
      $result['departments']=Department::get();  
        
      if ($id>0)  {
        $salaryArr=Salary::where('id', $id)->get(); 
        $result['amount']=$salaryArr[0]->amount;
        $result['employee_id']=$salaryArr[0]->employee_id;
        $result['designation_id']=$salaryArr[0]->designation_id;
        $result['department_id']=$salaryArr[0]->department_id;
        $result['id']=$id;
      } else{
        $result['amount']='';
        $result['employee_id']='';
        $result['designation_id']='';
        $result['department_id']='';
        $result['id']='';
      }
    return view('backend.salary.add', $result);
    }
 
    public function store(SalaryRequest $request)
    {     

     if($request->id>0) {
          $model=Salary::find($request->id);
          Toastr::success('Salary edited successfully', 'edited');
    }else{
        $model=New Salary();
        Toastr::success('Salary edited successfully', 'Created');
    }

    $model->amount=$request->amount;
    $model->employee_id=$request->employee_id;
    $model->designation_id=$request->designation_id;
    $model->department_id=$request->department_id;
    $model->save();
    return redirect()->route('salary.list');
 }

  public function status($status, $id) {
     $model=Salary::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('salary.list');
     Toastr::success('salary status has changed successfully', 'Status');
  }

  
}
