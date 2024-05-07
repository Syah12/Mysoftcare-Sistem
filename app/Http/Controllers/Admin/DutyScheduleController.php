<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DutyScheduleController extends Controller
{
    public function index()
    {
        Gate::authorize(config('mysoftcare.permissions.admin.route.dutyRosterIndex'));
        return view('admin.duty.index');
    }

    public function print()
    {
        $title = time() . '_Jadual_Bertugas';

        // $headerFromDate = Carbon::parse(request('fromDate'))->format('d/m/Y');
        // $headerToDate = Carbon::parse(request('toDate'))->format('d/m/Y');

        dd(request('data'));

        $vdp = [
            'title' => request('title'),
            'dutyRostersTopOffice' => request('dutyRostersTopOffice'),
            'dutyRostersBottomOffice' => request('dutyRostersBottomOffice'),
        ];

        return SnappyPdf::loadView('pdf.duties.duty-schedules-out', $vdp)
            ->setOptions([
                'margin-top'    => '20mm',
                'margin-right'  => '20mm',
                'margin-bottom' => '20mm',
                'margin-left'   => '20mm',
            ])
            ->setPaper('a4', 'landscape')
            ->inline($title);
    }
}
