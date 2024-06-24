<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\DepartmentRequest;
class DepartmentController extends Controller
{
    
 /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
     $data['departments']=Department::get();  
     return view('backend.department.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id='')
    {
      
         if($id>0){
             $arr=Department::where('id', $id)->get(); 
             $result['name']=$arr[0]->name;  
             $result['id']=$arr[0]->id;  
         }else{
            $result['name']='';
            $result['id']='';
         }
      return view('backend.department.add', $result);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {     
        //    dd($request->all());
         if($request->id>0){                          
         $model=Department::find($request->id);
         Toastr::success('Department edited successfully', 'edited');
         }else{
         $model=New Department();   
         Toastr::success('Department created successfully', 'Created');
         }
         $model->name=$request->name;
         $model->save();
         return redirect()->route('department.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }


  public function status($status, $id) {
     $model=Department::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('department.list');
     Toastr::success('Department status has changed successfully', 'Status');
  }



}
