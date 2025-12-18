<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::with('user')->first();
        $featuredProjects = Project::featured()->completed()->ordered()->take(6)->get();
        $skills = Skill::featured()->ordered()->get();
        $testimonials = Testimonial::featured()->ordered()->take(3)->get();
        $recentPosts = BlogPost::published()->latest('published_at')->take(3)->get();

        return view('home', compact(
            'profile',
            'featuredProjects',
            'skills',
            'testimonials',
            'recentPosts'
        ));
    }

    public function downloadCv()
    {
        $profile = Profile::first();

        if (!$profile || !$profile->cv_file) {
            abort(404, 'CV file not found');
        }

        $filePath = storage_path('app/public/' . $profile->cv_file);

        if (!file_exists($filePath)) {
            abort(404, 'CV file not found');
        }

        return Response::download($filePath, 'CV-' . $profile->full_name . '.pdf');
    }
}
