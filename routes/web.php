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

    Route::get('/papan_utama', [Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kalendar', [Admin\CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/pekerja', [Admin\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/kehadiran', [Admin\AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/jadual_bertugas', [Admin\DutyScheduleController::class, 'index'])->name('duty.index');
    Route::get('/pdf-jadual-bertugas', [Admin\DutyScheduleController::class, 'print'])->name('duty.print');
    Route::get('/peranan', [Admin\RoleController::class, 'index'])->name('role.index');

    // require __DIR__ . '/web/admin.php';
});
