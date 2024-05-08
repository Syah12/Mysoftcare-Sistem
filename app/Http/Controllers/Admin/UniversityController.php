<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        return view('admin.university.index');
    }

    public function create()
    {
        return view('admin.university.create');
    }

    public function show($id)
    {
        $university = University::find($id);
        return view('admin.university.show', [
            'university' => $university
        ]);
    }

    public function edit($id)
    {
        $university = University::find($id);
        return view('admin.university.edit', [
            'university' => $university
        ]);
    }
}
