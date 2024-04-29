<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        Gate::authorize(config('mysoftcare.permissions.admin.route.dashboardIndex'));
        $employeesCount = Employee::count();
        return view('admin.dashboard.index', compact([
            'employeesCount'
        ]));
    }

}
