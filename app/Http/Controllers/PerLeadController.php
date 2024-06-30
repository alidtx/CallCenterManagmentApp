<?php

namespace App\Http\Controllers;

use App\Models\PerLead;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\PerLeadRequest;
class PerLeadController extends Controller
{
    public function index()
    {
     $data['perleads']=PerLead::orderby('id','DESC')->paginate(10);  
     return view('backend.per_lead.list', $data);
    }

  
    public function create($id='')
    {
         if($id>0){
             $arr=PerLead::where('id', $id)->get(); 
             $result['amount']=$arr[0]->amount;  
             $result['id']=$arr[0]->id;  
         }else{
            $result['amount']='';
            $result['id']='';
         }
      return view('backend.per_lead.add', $result);
    }   

   
    public function store(PerLeadRequest $request)
    {     
         if($request->id>0){                          
         $model=PerLead::find($request->id);
         Toastr::success('campaign edited successfully', 'edited');
         }else{
         $model=New PerLead();   

         Toastr::success('campaign created successfully', 'Created');
         }
         $model->amount=$request->amount;
         $model->save();
         return redirect()->route('per_lead.list');
    }



  public function status($status, $id) {
     $model=PerLead::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('per_lead.list');
     Toastr::success('campaign status has changed successfully', 'Status');
  }




}
