<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\ResidentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportStatusController;
use App\Http\Controllers\Admin\ReportCategoryController;
use App\Http\Controllers\User\ReportController as UserReportController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/reports', [UserReportController::class, 'index'])->name('report.index');
Route::get('/report/{code}', [UserReportController::class, 'show'])->name('report.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/take-report', [UserReportController::class, 'take'])->name('report.take');
    Route::get('/preview', [UserReportController::class, 'show'])->name('report.preview');
    Route::get('/create-report', [UserReportController::class, 'create'])->name('report.create');
    Route::post('/create-report', [UserReportController::class, 'store'])->name('report.store');
    Route::get('/report-success', [UserReportController::class, 'success'])->name('report.success');


    Route::get('/my-report', [UserReportController::class, 'myReport'])->name('report.my-report');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
//membuat route get untuk halaman login
//route get ini akan memanggil fungsi index yang ada di dalam LoginController
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
//membuat route post untuk proses login
//route post ini akan memanggil fungsi store yang ada di dalam LoginController
//route post ini memiliki name login.store agar bisa diakses menggunakan route('login.store')
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
//membuat route post untuk proses logout
//cara membacanya adalah ketika user mengakses url /logout dengan method post maka akan menjalankan fungsi logout yang ada di dalam LoginController
//middleware('auth') artinya route ini hanya bisa diakses oleh user yang sudah login

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'index'])->name('register.store');

Route::prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function () {
    //cara kerja route group adalah dengan menambahkan prefix pada url
    //prefix ini akan menambahkan /admin pada setiap route yang ada di dalam group ini
    //contoh: /admin/dashboard
    //middleware('auth', 'role:admin') artinya route ini hanya bisa diakses oleh user yang sudah login dan memiliki role admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/resident', ResidentController::class);
    Route::resource('/report-category', ReportCategoryController::class);
    Route::resource('/report', ReportController::class);
    Route::get('/report-status/{reportId}/create', [ReportStatusController::class, 'create'])->name('report-status.create');
    Route::resource('/report-status', ReportStatusController::class)->except('create');
}); 

//routes disini berfungsi untuk mengatur url yang akan diakses oleh user dan controller berfungsi untuk mengatur logic dari url tersebut