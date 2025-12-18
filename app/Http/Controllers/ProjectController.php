<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('images')->completed()->ordered();

        // Filter by category
        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }

        // Search
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $projects = $query->paginate(9);
        $categories = Project::distinct()->pluck('category');

        return view('projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        $project->load('images');
        $relatedProjects = Project::where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->completed()
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'relatedProjects'));
    }
}
