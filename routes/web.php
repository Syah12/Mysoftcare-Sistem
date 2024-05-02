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
    Route::get('/pengurusan-projek', [Admin\ProjectManagementController::class, 'index'])->name('project.index');
    Route::get('/pentadbir', [Admin\AdministratorController::class, 'index'])->name('administrator.index');
    Route::get('/kehadiran', [Admin\AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/kalendar', [Admin\CalendarEventController::class, 'index'])->name('calendar-event.index');
    Route::get('/jadual_bertugas', [Admin\DutyScheduleController::class, 'index'])->name('duty.index');
    Route::get('/pekerja', [Admin\EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/pelajar_industri', [Admin\InternController::class, 'index'])->name('intern.index');
    Route::get('/pdf-jadual-bertugas', [Admin\DutyScheduleController::class, 'print'])->name('duty.print');
    Route::get('/peranan', [Admin\RoleController::class, 'index'])->name('role.index');

    // require __DIR__ . '/web/admin.php';
});
