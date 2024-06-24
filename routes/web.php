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

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {;
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
    });

    


});
