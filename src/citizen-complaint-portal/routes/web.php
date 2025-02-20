<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ResidentController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('welcome');
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


Route::prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function () {
    //cara kerja route group adalah dengan menambahkan prefix pada url
    //prefix ini akan menambahkan /admin pada setiap route yang ada di dalam group ini
    //contoh: /admin/dashboard
    //middleware('auth', 'role:admin') artinya route ini hanya bisa diakses oleh user yang sudah login dan memiliki role admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/resident', ResidentController::class);

}); 

//routes disini berfungsi untuk mengatur url yang akan diakses oleh user dan controller berfungsi untuk mengatur logic dari url tersebut