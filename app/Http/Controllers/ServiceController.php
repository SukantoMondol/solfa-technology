<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('services.index', [
            'services' => Service::active()->get(),
        ]);
    }

    public function show(Service $service): View
    {
        abort_unless($service->is_active, 404);

        // Map service title to project category
        $projectCategory = $service->title;
        if ($service->title === 'SEO Optimization') {
            $projectCategory = 'SEO';
        }

        $projects = \App\Models\Project::active()
            ->where('category', 'LIKE', '%' . $projectCategory . '%')
            ->get();

        return view('services.show', [
            'service' => $service,
            'projects' => $projects,
            'services' => Service::active()->where('id', '!=', $service->id)->get(),
        ]);
    }
}
