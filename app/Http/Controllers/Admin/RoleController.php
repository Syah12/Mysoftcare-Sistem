<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize(config('mysoftcare.permissions.admin.route.roleIndex'));
        return view('admin.role.index');
    }
}
