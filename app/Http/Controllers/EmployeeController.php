<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\EmployeeRequest;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
     $data['employees']=Employee::get();  
     return view('backend.employee.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id='')
    {
      
         if($id>0){
             $arr=Employee::where('id', $id)->get(); 
             $result['name']=$arr[0]->name;  
             $result['id']=$arr[0]->id;  
         }else{
            $result['name']='';
            $result['id']='';
         }
      return view('backend.employee.add', $result);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {   
         if($request->id>0){                          
         $model=Employee::find($request->id);
         Toastr::success('Employee edited successfully', 'edited');
         }else{
         $model=New Employee();   
         Toastr::success('Employee created successfully', 'Created');
         }
         $model->name=$request->name;
         $model->save();
         return redirect()->route('employee.list');
    }

    /**
     * Remove the specified resource from storage.
     */
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
