<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Skill;
use App\Models\BlogPost;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'blog_posts' => BlogPost::count(),
            'contacts' => Contact::count(),
            'unread_contacts' => Contact::where('status', 'new')->count(),
        ];

        $recentProjects = Project::latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentContacts'));
    }
}
