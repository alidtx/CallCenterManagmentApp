<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CampaignRequest;
class CampaignController extends Controller
{
 
    public function index()
    {
     $data['campaigns']=Campaign::orderby('id','DESC')->paginate(10);  
     return view('backend.campaign.list', $data);
    }

  
    public function create($id='')
    {
         if($id>0){
             $arr=Campaign::where('id', $id)->get(); 
             $result['name']=$arr[0]->name;  
             $result['id']=$arr[0]->id;  
         }else{
            $result['name']='';
            $result['id']='';
         }
      return view('backend.campaign.add', $result);
    }   

   
    public function store(CampaignRequest $request)
    {     
         if($request->id>0){                          
         $model=Campaign::find($request->id);
         Toastr::success('campaign edited successfully', 'edited');
         }else{
         $model=New Campaign();   
         
         Toastr::success('campaign created successfully', 'Created');
         }
         $model->name=$request->name;
         $model->save();
         return redirect()->route('campaign.list');
    }



  public function status($status, $id) {
     $model=Campaign::find($id);
     $model->status=$status;
     $model->save();
     return redirect()->route('campaign.list');
     Toastr::success('campaign status has changed successfully', 'Status');
  }


}
