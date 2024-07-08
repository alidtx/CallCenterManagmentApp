<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class AttendanceController extends Controller
{

    public function index()
    {
    
        $currentTime =Carbon::now();  
        $data['todayAttendances'] = DB::table('attendances as a')
        ->whereDate('login_date', $currentTime->toDateString())
        ->join('users as u', 'a.user_id', '=', 'u.id')
        ->join('employees as e', 'a.employee_id', '=', 'e.id')
        ->select(
            'a.login_date',
            'a.login_time',
            'a.login_status',
            'u.name as user_name',
            'e.name as employee_name'
        )
        ->where('a.login_status', 'late')
        ->get();
     
     return view('backend.attentance.list',$data);
    }
    

   public function deductionSummery()
   
   {
    $data['deductionSummeries'] =  DB::table('attendances as attn')
    ->where('attn.user_id', auth::user()->id)
    ->whereMonth('attn.created_at', Carbon::now()->month)
    ->join('employees as e', 'e.id', '=', 'attn.employee_id')
    ->join('salaries as s', 'e.id', '=', 's.employee_id')
    ->select(
        'e.name',
        'e.id',
        'e.employeeUniqueId',
        'attn.employee_id',
        'attn.user_id',
        's.amount as emp_basic_salary',
        'attn.created_at',
        DB::raw('SUM(CASE WHEN attn.login_status = "late" THEN 1 ELSE 0 END) AS late_days'),
        DB::raw('SUM(CASE WHEN attn.login_status = "normal" THEN 1 ELSE 0 END) AS normal_days')
    )
    ->groupBy('e.name', 'attn.employee_id')
    ->orderBy('attn.id', 'DESC')
    ->paginate();
    // dd($data['deductionSummeries']);
    return view('backend.attentance.deduction', $data);
   }

    

    public function ReasonLetIn(Request $request) {       
       $model=Attendance::find($request->attendance_id);
       $model->reason_late_in=$request->late_in_reason; 
       if($model->save()){
        return response()->json(['status'=>'success']);
       } 
    }

  public function lateAttend() 
  {
    $data['lateAttends']=Attendance::where('user_id', auth::user()->id)->where('login_status','late')->get();
    return view('backend.attentance.late_attend',$data);
  }

}
