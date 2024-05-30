<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalendarEvent;
use App\Models\CompanyStatus;
use App\Models\Employee;
use App\Models\Intern;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole(config('mysoftcare.roles.admin'))) {

            Gate::authorize(config('mysoftcare.permissions.admin.route.dashboardIndex'));

            $projectActive = Project::where('status', 'Aktif')->latest()->get();
            $projectActiveCount = Project::where('status', 'Aktif')->count();
            $internAcceptedCount = Intern::where('status', 'Diterima')->count();
            $internActiveCount = Intern::where('status', 'Aktif')->count();
            $projectCount = Project::count();
            $internCount = Intern::count();
            $totalProjectValueSuccess = Project::where('status', 'Berjaya')->sum('contract_value');
            $totalProjectValueComplete = Project::where('status', 'Selesai')->sum('contract_value');
            $totalProjectValue = Project::sum('contract_value');
            $eventToday = CalendarEvent::whereDate('start_time', now()->toDateString())->count();
            $projects = Project::where('status', 'Aktif')->latest()->get();

            return view('admin.dashboard.index', compact([
                'projectActive',
                'projectActiveCount',
                'internActiveCount',
                'internAcceptedCount',
                'projectCount',
                'internCount',
                'totalProjectValueSuccess',
                'totalProjectValueComplete',
                'totalProjectValue',
                'eventToday',
                'projects'
            ]));

        } else {

            $companyStatus = CompanyStatus::all();

            return view('user.dashboard.index', compact(
                'companyStatus'
            ));
        }
    }
}
