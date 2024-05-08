<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        return view('admin.position.index');
    }

    public function create()
    {
        return view('admin.position.create');
    }

    public function show($id)
    {
        $position = Position::find($id);
        return view('admin.position.show', [
            'position' => $position
        ]);
    }

    public function edit($id)
    {
        $position = Position::find($id);
        return view('admin.position.edit', [
            'position' => $position
        ]);
    }
}
