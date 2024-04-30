<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyStatus;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole(config('mysoftcare.roles.admin'))) {
            Gate::authorize(config('mysoftcare.permissions.admin.route.dashboardIndex'));
            $employeesCount = Employee::count();
            return view('admin.dashboard.index', compact([
                'employeesCount'
            ]));
        } else {
            $companyStatus = CompanyStatus::all();
            return view('user.dashboard.index', compact(
                'companyStatus'
            ));
        }
    }
}
