<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    public function index()
    {
        Gate::authorize(config('mysoftcare.permissions.admin.route.employeeIndex'));
        return view('admin.employee.index');
    }
}
