<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $university = University::latest()->get();

        $incompletedData = $university->filter(function ($item) {
            return in_array(null, collect($item)->except(['deleted_at', 'is_university'])->values()->toArray());
        })->pluck('name', 'id')->toArray();

        return view('admin.university.index', [
            'incompletedData' => $incompletedData,
        ]);
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
