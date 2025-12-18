<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Experience;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $profile = Profile::with('user')->first();
        $skills = Skill::ordered()->get();
        $experiences = Experience::ordered()->get();
        
        // Group skills by category
        $skillsByCategory = $skills->groupBy('category');

        return view('about', compact('profile', 'skillsByCategory', 'experiences'));
    }
}
