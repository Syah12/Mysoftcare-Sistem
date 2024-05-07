<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intern;
use Illuminate\Http\Request;

class InternController extends Controller
{
    public function index()
    {
        return view('admin.intern.index');
    }

    public function create()
    {
        return view('admin.intern.create');
    }

    public function show($id)
    {
        $intern = Intern::find($id);
        return view('admin.intern.show', [
            'intern' => $intern
        ]);
    }

    public function edit($id)
    {
        $intern = Intern::find($id);
        return view('admin.intern.edit', [
            'intern' => $intern
        ]);
    }
}
