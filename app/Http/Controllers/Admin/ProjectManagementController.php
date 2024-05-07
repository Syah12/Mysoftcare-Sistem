<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectManagementController extends Controller
{
    public function index()
    {
        return view('admin.project-management.index');
    }

    public function create()
    {
        return view('admin.project-management.create');
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('admin.project-management.show', [
            'project' => $project
        ]);
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.project-management.edit', [
            'project' => $project
        ]);
    }
}
