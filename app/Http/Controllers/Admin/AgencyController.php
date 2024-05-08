<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index()
    {
        return view('admin.agency.index');
    }

    public function create()
    {
        return view('admin.agency.create');
    }

    public function show($id)
    {
        $agency = Agency::find($id);
        return view('admin.agency.show', [
            'agency' => $agency
        ]);
    }

    public function edit($id)
    {
        $agency = agency::find($id);
        return view('admin.agency.edit', [
            'agency' => $agency
        ]);
    }
}
