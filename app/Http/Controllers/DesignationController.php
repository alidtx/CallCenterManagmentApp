<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\DesignationRequest;
class DesignationController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
     $data['designations']=Designation::get();  
     return view('backend.designation.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id='')
    {
      
         if($id>0){
             $arr=Designation::where('id', $id)->get(); 
             $result['name']=$arr[0]->name;  
             $result['id']=$arr[0]->id;  
         }else{
            $result['name']='';
            $result['id']='';
         }
      return view('backend.designation.add', $result);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(DesignationRequest $request)
    {   
         if($request->id>0){                          
         $model=Designation::find($request->id);
         Toastr::success('Designation edited successfully', 'edited');
         }else{
         $model=New Designation();   
         Toastr::success('Designation created successfully', 'Created');
         }
         $model->name=$request->name;
         $model->save();
         return redirect()->route('designation.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $employee)
    {
        //
    }


  public function status($status, $id) {
     $model=Designation::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('designation.list');
     Toastr::success('Designation status has changed successfully', 'Status');
  }

}
