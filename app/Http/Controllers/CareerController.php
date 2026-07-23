<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        return view('careers.index', [
            'jobs' => JobOpening::active()->get(),
        ]);
    }

    public function show(JobOpening $job): View
    {
        abort_unless($job->is_active, 404);

        return view('careers.show', ['job' => $job]);
    }
}
