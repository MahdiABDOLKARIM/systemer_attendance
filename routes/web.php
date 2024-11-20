<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/superadmin/login', [SuperAdminController::class, 'showLoginForm'])->name('superadmin.login.form');
Route::post('/superadmin/login', [SuperAdminController::class, 'login'])->name('superadmin.login');

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::post('/attendance/check-in/{id}', [AttendanceController::class, 'checkIn'])->name('attendance.checkIn');
Route::post('/attendance/check-out/{id}', [AttendanceController::class, 'checkOut'])->name('attendance.checkOut');
Route::get('/attendance/employee', [AttendanceController::class, 'employeeAttendance'])->name('attendance.employee');
Route::get('/attendance/filter', [AttendanceController::class, 'filter'])->name('attendance.filter');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');  // نمایش لیست ادمین‌ها
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');  
});
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
