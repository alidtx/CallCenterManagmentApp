<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PerLeadController;
use App\Http\Controllers\LeadOfferController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('email', [CampaignController::class,'email'])->name('campaign.email');


Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('/user_delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user_delete');
    Route::get('/role_delete/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role_delete');
    #profile
    Route::get('/profile-show', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile_store', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile_store');
    Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'change_password_view'])->name('change_password');
    Route::post('/change-password/store', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password_update');
    
    Route::get('/settings', [SettingController::class, 'create'])->name('settings.create');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::get('mark-as-read-all-notifications', [App\Http\Controllers\HomeController::class, 'marAllAsRead'])->name('marAllAsRead');
    

      
    route::prefix('employee')->group(function(){

        Route::get('list', [EmployeeController::class,'index'])->name('employee.list');
        Route::get('add', [EmployeeController::class,'create'])->name('employee.add');
        Route::get('add/{id}', [EmployeeController::class,'create'])->name('employee.addProcess');
        Route::post('store', [EmployeeController::class,'store'])->name('employee.store');
        Route::get('status/{status}/{id}', [EmployeeController::class,'status'])->name('employee.status');
        
    });

    route::prefix('designation')->group(function(){

        Route::get('list', [DesignationController::class,'index'])->name('designation.list');
        Route::get('add', [DesignationController::class,'create'])->name('designation.add');
        Route::get('add/{id}', [DesignationController::class,'create'])->name('designation.addProcess');
        Route::post('store', [DesignationController::class,'store'])->name('designation.store');
        Route::get('status/{status}/{id}', [DesignationController::class,'status'])->name('designation.status');
        
    });


    route::prefix('department')->group(function(){

        Route::get('list', [DepartmentController::class,'index'])->name('department.list');
        Route::get('add', [DepartmentController::class,'create'])->name('department.add');
        Route::get('add/{id}', [DepartmentController::class,'create'])->name('department.addProcess');
        Route::post('store', [DepartmentController::class,'store'])->name('department.store');
        Route::get('status/{status}/{id}', [DepartmentController::class,'status'])->name('department.status');
        
    });

    route::prefix('lead')->group(function(){

        Route::get('list', [LeadController::class,'index'])->name('lead.list');
        Route::get('view/{id}', [LeadController::class,'view'])->name('lead.view');
        Route::get('download', [LeadController::class,'download'])->name('lead.download');
        Route::get('submission_form', [LeadController::class,'leadSubmissionForm'])->name('lead.submission_form');
        Route::post('store', [LeadController::class,'store'])->name('lead.store');
        Route::post('employee_wise_lead_sum', [LeadController::class,'employeeWiseLeadSum'])->name('lead.employee_wise_lead_sum');
         
    });

    route::prefix('per_lead')->group(function(){

        Route::get('list', [PerLeadController::class,'index'])->name('per_lead.list');
        Route::get('add', [PerLeadController::class,'create'])->name('per_lead.add');
        Route::get('add/{id}', [PerLeadController::class,'create'])->name('per_lead.addProcess');
        Route::post('store', [PerLeadController::class,'store'])->name('per_lead.store');
        Route::get('status/{status}/{id}', [PerLeadController::class,'status'])->name('per_lead.status');
    });

    route::prefix('lead_offer')->group(function(){

        Route::get('list', [LeadOfferController::class,'index'])->name('lead_offer.list');
        Route::get('add', [LeadOfferController::class,'create'])->name('lead_offer.add');
        Route::get('add/{id}', [LeadOfferController::class,'create'])->name('lead_offer.addProcess');
        Route::post('store', [LeadOfferController::class,'store'])->name('lead_offer.store');
        Route::get('status/{status}/{id}', [LeadOfferController::class,'status'])->name('lead_offer.status');
    });


    route::prefix('campaign')->group(function(){

        Route::get('list', [CampaignController::class,'index'])->name('campaign.list');
        Route::get('add', [CampaignController::class,'create'])->name('campaign.add');
        Route::get('add/{id}', [CampaignController::class,'create'])->name('campaign.addProcess');
        Route::post('store', [CampaignController::class,'store'])->name('campaign.store');
       Route::get('status/{status}/{id}', [CampaignController::class,'status'])->name('campaign.status');
        
    });


    route::prefix('salary')->group(function(){

        Route::get('list', [SalaryController::class,'index'])->name('salary.list');
        Route::get('add', [SalaryController::class,'create'])->name('salary.add');
        Route::get('add/{id}', [SalaryController::class,'create'])->name('salary.addProcess');
        Route::post('store', [SalaryController::class,'store'])->name('salary.store');
        Route::get('status/{status}/{id}', [SalaryController::class,'status'])->name('salary.status');
        Route::get('monthly_salary', [SalaryController::class,'MonthlySalary'])->name('monthly_salary.list');
        Route::get('view_payable_salary/{id}', [SalaryController::class,'viewPayableSalary'])->name('salary.view_payable_salary');
    });

    route::prefix('attendance')->group(function(){
        Route::get('list', [AttendanceController::class,'index'])->name('attendance.list');
        Route::get('late_attend', [AttendanceController::class,'lateAttend'])->name('attendance.late_attend');
        Route::post('reason_late_in', [AttendanceController::class,'ReasonLetIn'])->name('attendance.reason_late_in');
        Route::get('deduction_summery', [AttendanceController::class,'deductionSummery'])->name('attendance.deduction_summery');
    });
  

    route::prefix('leave')->group(function(){

        Route::get('list', [LeaveController::class,'index'])->name('leave.list');
        Route::get('add', [LeaveController::class,'create'])->name('leave.add');
        Route::post('store', [LeaveController::class,'store'])->name('leave.store');
        Route::get('pending_application', [LeaveController::class,'pendingApplication'])->name('pending_application.store');
        Route::get('status/{status}/{id}', [LeaveController::class,'status'])->name('leave.status');
        
    });
});
