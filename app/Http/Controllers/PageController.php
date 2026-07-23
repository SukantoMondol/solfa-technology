<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Gallery;
use App\Models\TeamMember;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'services' => Service::active()->take(6)->get(),
            'projects' => Project::active()->take(9)->get(),
            'featuredProjects' => Project::active()->where('is_featured', true)->take(6)->get(),
            'testimonials' => Testimonial::active()->get(),
            'faqs' => Faq::active()->get(),
            'categories' => Project::active()->whereNotNull('category')->distinct()->pluck('category'),
        ]);
    }

    public function about(): View
    {
        return view('about', [
            'testimonials' => Testimonial::active()->get(),
            'galleries' => Gallery::orderBy('sort_order', 'asc')->get(),
            'teamMembers' => TeamMember::orderBy('sort_order', 'asc')->get(),
        ]);
    }
}
