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
           'dailyPercentage'=>$dailyPercentage, 
           'TotalUserLeads'=>$TotalUserLeads, 
           'weeklyPercentage'=>$weeklyPercentage, 
           'monthlyTotalUserLeads'=>$monthlyTotalUserLeads, 
           'monthlyPercentage'=>$monthlyPercentage, 
           'rank'=>$rank, 
         ];

        return view('home', $data);
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
