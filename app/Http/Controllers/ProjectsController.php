<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }


    public function show(Project $project)
    {
		$this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }


    public function create()
    {
        return view('projects.create');
    }


	public function edit(Project $project)
	{
		return view('projects.edit', compact('project'));
	}



    public function store()
    {
        $project = auth()->user()->projects()->create($this->validateReq());

        return redirect($project->path());
    }


	public function update(Project $project)
	{
		$this->authorize('update', $project);

		$project->update($this->validateReq());

		return redirect($project->path());
	}

	protected function validateReq()
	{
		return request()->validate([
			'title' => 'sometimes|required',
            'description' => 'sometimes|required',
			'notes' => 'nullable'
		]);
	}
}
