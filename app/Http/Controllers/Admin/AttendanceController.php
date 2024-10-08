<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AttendanceController extends Controller
{
    public function index()
    {
        Gate::authorize(config('mysoftcare.permissions.admin.route.attendanceIndex'));
        return view('admin.attendance.index');
    }
}
