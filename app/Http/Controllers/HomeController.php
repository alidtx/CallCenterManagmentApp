<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Lead;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {  
         //attent start
        $attendance=Attendance::with('user')->where('user_id', auth::user()->id)->latest()->first();
        $todayAttendance=Attendance::where('user_id',auth::user()->id)->latest()->first(); 
       
        //attent end
        $dailytotalLeads=Lead::whereDate('created_at', Carbon::today())->count();  
        $totalDailyUsersLeads=Lead::where('user_id', auth::user()->id)->whereDate('created_at', Carbon::today())->count();  
        $dailyPercentage=$totalDailyUsersLeads > 0 ? ($totalDailyUsersLeads/$dailytotalLeads )* 100: 0;
        $totalWeeklyLeads = Lead::whereBetween('created_at', [
            Carbon::now()->startOfWeek(Carbon::SUNDAY),
            Carbon::now()->endOfWeek(Carbon::THURSDAY)->addDays(4)
        ])->count();

        $TotalUserLeads = Lead::where('user_id', auth::user()->id)->whereBetween('created_at', [
            Carbon::now()->startOfWeek(Carbon::SUNDAY),
            Carbon::now()->endOfWeek(Carbon::THURSDAY)->addDays(4)
        ])->count();

          $weeklyPercentage= $TotalUserLeads > 0 ? ($TotalUserLeads/$totalWeeklyLeads )* 100: 0;
          $monthlyTotalLeads = Lead::whereMonth('created_at', Carbon::now()->month)
          ->count();

          $monthlyTotalUserLeads = Lead::where('user_id',auth::user()->id)->whereMonth('created_at', Carbon::now()->month)
          ->count();

          $monthlyPercentage=$monthlyTotalLeads > 0 ? ($monthlyTotalUserLeads/$monthlyTotalLeads )* 100: 0;
          
          $currentUserId = auth()->user()->id;
          $userRank = Lead::select('user_id', DB::raw('COUNT(*) as lead_count'))
              ->whereMonth('created_at', Carbon::now()->month)
              ->groupBy('user_id')
              ->orderByDesc('lead_count')
              ->pluck('user_id')
              ->search($currentUserId);
             if ($userRank !== false) { 
              $rank= $userRank += 1;
          
              } 
        
          $data=[
           'totalDailyUsersLeads'=>$totalDailyUsersLeads,
           'dailyPercentage'=>floor($dailyPercentage), 
           'TotalUserLeads'=>$TotalUserLeads, 
           'weeklyPercentage'=>floor($weeklyPercentage), 
           'monthlyTotalUserLeads'=>$monthlyTotalUserLeads, 
           'monthlyPercentage'=>floor($monthlyPercentage), 
           'attendance'=>$attendance, 
           'todayAttendance'=>$todayAttendance, 
        //    'rank'=>$rank, 
         ];
        // dd($data);
        return view('home', $data);
    }

    public function store(Request $request)
   
    {
    $data=Employee::where('user_id', auth::user()->id)->where('status', 1)->first(); 
    $existingAttendance = Attendance::where('user_id', auth::user()->id)
        ->whereDate('login_date', Carbon::today())
        ->first();
    if ($existingAttendance){
        return redirect()->route('home')->with('error', 'You have already taken today attendance, Please try again tomorrow');   
    }else{ 
        $data=Employee::where('user_id', auth::user()->id)->where('status', 1)->first();
         if (!empty($data))
         {
            $model = new Attendance();
            $model->user_id = auth::user()->id;
            $model->employee_id =$data->id;
            $currentDate = Carbon::today();
            $model->login_date = $currentDate->toDateString();
            $currentTime = Carbon::now();
            $model->login_time = $currentTime->toTimeString();
            $model->logout_time = $currentTime->toTimeString();
            $cutoffTime = Carbon::now()->setTime(9, 30);           
            if ( $cutoffTime->toTimeString() < $currentTime->toTimeString() ) {
                $model->login_status = 'late';
            } else {
                $model->login_status = 'normal';
            }  
            $model->save();
            return redirect()->route('home')->with('error', 'You have sucessfully attent for today.');
         }else{
            return redirect()->route('home')->with('error', 'Ask your boss to generate your employee ID');
         }     
    }
    }

    public function getLastFourWeekPurchaseData(Request $request)
    {

        $fourWeeksAgo = Carbon::now()->subWeeks(4);
        $weeklyOrders = DB::table('orders')
            ->select(DB::raw('YEAR(created_at) as year, WEEK(created_at) as week'), DB::raw('COUNT(*) as total_orders'))
            ->where('created_at', '>=', $fourWeeksAgo)
            ->groupBy('year', 'week')
            ->orderBy('year', 'week')
            ->get();
        dd($weeklyOrders);
        return $weeklyOrders;
    }
    public function change_password(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            Toastr::error('Old password does not matched');
            return back();
        }
        try {
            if (Auth::check()) {
                $password = bcrypt($request->password);
                User::where('id', Auth::user()->id)->update(["password" => $password]);
                Toastr::success('Password Change Successfully');
                $user =auth()->user();
                $message = [
                    "message"              => "Your Paasword has been changed",
                    "title"                 => "Password Change",
                    "url"                  => url('/change-password')
                ];
                Helper::adminNotification($user, $message);
                return back();
            }
        } catch (Exception $e) {
            Log::info($e->getMessage());
            Toastr::error($e->getMessage());
            return back();
        }
    }
    public function change_password_view()
    {
        return view("profile.change-password");
    }
    public function marAllAsRead(Request $request)
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
        Toastr::success('All Notifications Marked as Read', 'Success');
        return redirect()->back();
    }
}
