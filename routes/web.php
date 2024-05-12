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

    Route::group(['prefix' => 'pengurusan-projek'], function () {
        Route::get('/senarai', [Admin\ProjectManagementController::class, 'index'])->name('project.index');
        Route::get('/tambah', [Admin\ProjectManagementController::class, 'create'])->name('project.create');
        Route::get('/semak/{id}', [Admin\ProjectManagementController::class, 'show'])->name('project.show');
        Route::get('/kemaskini/{id}', [Admin\ProjectManagementController::class, 'edit'])->name('project.edit');
    });

    Route::get('/kehadiran', [Admin\AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/kalendar', [Admin\CalendarEventController::class, 'index'])->name('calendar-event.index');
    Route::get('/jadual_bertugas', [Admin\DutyScheduleController::class, 'index'])->name('duty.index');
    Route::get('/pdf-jadual-bertugas', [Admin\DutyScheduleController::class, 'print'])->name('duty.print');

    Route::group(['prefix' => 'pekerja'], function () {
        Route::get('/senarai', [Admin\EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/tambah', [Admin\EmployeeController::class, 'create'])->name('employee.create');
        Route::get('/semak/{id}', [Admin\EmployeeController::class, 'show'])->name('employee.show');
        Route::get('/kemaskini/{id}', [Admin\EmployeeController::class, 'edit'])->name('employee.edit');
    });

    Route::group(['prefix' => 'pelajar_industri'], function () {
        Route::get('/senarai', [Admin\InternController::class, 'index'])->name('intern.index');
        Route::get('/tambah', [Admin\InternController::class, 'create'])->name('intern.create');
        Route::get('/semak/{id}', [Admin\InternController::class, 'show'])->name('intern.show');
        Route::get('/kemaskini/{id}', [Admin\InternController::class, 'edit'])->name('intern.edit');
    });

    Route::get('/peranan', [Admin\RoleController::class, 'index'])->name('role.index');

    Route::group(['prefix' => 'agensi'], function () {
        Route::get('/senarai', [Admin\AgencyController::class, 'index'])->name('agency.index');
        Route::get('/tambah', [Admin\AgencyController::class, 'create'])->name('agency.create');
        Route::get('/semak/{id}', [Admin\AgencyController::class, 'show'])->name('agency.show');
        Route::get('/kemaskini/{id}', [Admin\AgencyController::class, 'edit'])->name('agency.edit');
    });

    Route::group(['prefix' => 'pic_agensi'], function () {
        Route::get('/senarai', [Admin\PICAgencyController::class, 'index'])->name('pic.index');
        Route::get('/tambah', [Admin\PICAgencyController::class, 'create'])->name('pic.create');
        Route::get('/semak/{id}', [Admin\PICAgencyController::class, 'show'])->name('pic.show');
        Route::get('/kemaskini/{id}', [Admin\PICAgencyController::class, 'edit'])->name('pic.edit');
    });

    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('/senarai', [Admin\UserController::class, 'index'])->name('user.index');
        Route::get('/tambah', [Admin\UserController::class, 'create'])->name('user.create');
        Route::get('/semak/{id}', [Admin\UserController::class, 'show'])->name('user.show');
        Route::get('/kemaskini/{id}', [Admin\UserController::class, 'edit'])->name('user.edit');
    });


    Route::group(['prefix' => 'jawatan'], function () {
        Route::get('/senarai', [Admin\PositionController::class, 'index'])->name('position.index');
        Route::get('/tambah', [Admin\PositionController::class, 'create'])->name('position.create');
        Route::get('/semak/{id}', [Admin\PositionController::class, 'show'])->name('position.show');
        Route::get('/kemaskini/{id}', [Admin\PositionController::class, 'edit'])->name('position.edit');
    });

    Route::group(['prefix' => 'universiti'], function () {
        Route::get('/senarai', [Admin\UniversityController::class, 'index'])->name('university.index');
        Route::get('/tambah', [Admin\UniversityController::class, 'create'])->name('university.create');
        Route::get('/semak/{id}', [Admin\UniversityController::class, 'show'])->name('university.show');
        Route::get('/kemaskini/{id}', [Admin\UniversityController::class, 'edit'])->name('university.edit');
    });

    require __DIR__ . '/web/admin.php';
});
