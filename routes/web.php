<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard.index');
    // })->name('dashboard');

    Route::get('/papan_utama', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pekerja', [Admin\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/kehadiran', [Admin\AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/jadual_bertugas', [Admin\DutyScheduleController::class, 'index'])->name('duty.index');

    // require __DIR__ . '/web/admin.php';
});
