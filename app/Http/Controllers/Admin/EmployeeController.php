<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    public function index()
    {
        Gate::authorize(config('mysoftcare.permissions.admin.route.employeeIndex'));
        return view('admin.employee.index');
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return view('admin.employee.show', [
            'employee' => $employee
        ]);
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('admin.employee.edit', [
            'employee' => $employee
        ]);
    }
}
