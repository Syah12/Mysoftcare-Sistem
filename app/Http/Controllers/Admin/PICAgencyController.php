<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PIC;
use Illuminate\Http\Request;

class PICAgencyController extends Controller
{
    public function index()
    {
        return view('admin.pic-agency.index');
    }

    public function create()
    {
        return view('admin.pic-agency.create');
    }

    public function show($id)
    {
        $pic = PIC::find($id);
        return view('admin.pic-agency.show', [
            'pic' => $pic
        ]);
    }

    public function edit($id)
    {
        $pic = PIC::find($id);
        return view('admin.pic-agency.edit', [
            'pic' => $pic
        ]);
    }
}
