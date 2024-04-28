<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $employeesCount = Employee::count();
        return view('admin.dashboard.index', compact([
            'employeesCount'
        ]));
    }

}
