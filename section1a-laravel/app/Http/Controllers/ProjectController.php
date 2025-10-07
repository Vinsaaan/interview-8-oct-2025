<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /** GET /api/projects */
    public function index()
    {
        return response()->json(
            Project::orderByDesc('id')->get(),
            200
        );
    }

    /** GET /api/projects/{project} (route model binding) */
    public function show(Project $project)
    {
        return response()->json($project, 200);
    }

    /** POST /api/projects */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'min:5', 'max:255', 'unique:projects,name'],
            'description' => ['nullable', 'string'],
            'start_date'  => ['nullable', 'date'],
            'end_date'    => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        $project = Project::create($data);

        return response()->json($project, 201);
    }

    /** PUT /api/projects/{project} */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name'        => [
                'required', 'string', 'min:5', 'max:255',
                Rule::unique('projects', 'name')->ignore($project->id),
            ],
            'description' => ['nullable', 'string'],
            'start_date'  => ['nullable', 'date'],
            'end_date'    => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        $project->update($data);

        return response()->json($project, 200);
    }

    /** DELETE /api/projects/{project} */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }
}
