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
    
 
     $data['attendance']=Attendance::with('user')->where('user_id', auth::user()->id)->latest()->first();
     $data['todayAttendance']=Attendance::where('user_id',auth::user()->id)->latest()->first();
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

    public function store(Request $request)
    {

    $existingAttendance = Attendance::where('user_id', auth::user()->id)
        ->whereDate('login_date', Carbon::today())
        ->first();
    if ($existingAttendance){
        return redirect()->route('attendance.list')->with('error', 'You have already taken today attendance, Please try again tomorrow');   
    }else{ 
        $data=Employee::where('user_id', auth::user()->id)->where('status', 1)->first();     
        $model = new Attendance();
        $model->user_id = auth::user()->id;
        $model->employee_id =$data->id;
        $currentDate = Carbon::today();
        $model->login_date = $currentDate->toDateString();
        $currentTime = Carbon::now();
        $model->login_time = $currentTime->toTimeString();
        $model->logout_time = $currentTime->toTimeString();
        $cutoffTime = Carbon::now()->setTime(9, 30);
    
        if ($currentTime > $cutoffTime) {
            $model->login_status = 'late';
        } else {
            $model->login_status = 'normal';
        }
        $model->save();
        return redirect()->route('attendance.list');
    }

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
