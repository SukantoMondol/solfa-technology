<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'job_title' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'cv_file' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'], // 10MB max
            'portfolio_link' => ['nullable', 'string', 'max:500'],
            'cover_letter' => ['nullable', 'string'],
        ]);

        $cvPath = null;
        if ($request->hasFile('cv_file')) {
            $cvPath = $request->file('cv_file')->store('cvs', 'public');
        }

        JobApplication::create([
            'job_title' => $validated['job_title'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'cv_path' => $cvPath,
            'portfolio_link' => $validated['portfolio_link'] ?? null,
            'cover_letter' => $validated['cover_letter'] ?? null,
        ]);

        return back()->with('success', 'Thank you! Your job application and CV have been received successfully. Our team will contact you soon.');
    }
}
