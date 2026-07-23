<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class JobApplicationController extends Controller
{
    public function index(): View
    {
        return view('admin.job_applications.index', [
            'applications' => JobApplication::latest()->paginate(20),
        ]);
    }

    public function downloadCv(JobApplication $application): StreamedResponse|RedirectResponse
    {
        if ($application->cv_path && Storage::disk('public')->exists($application->cv_path)) {
            return Storage::disk('public')->download($application->cv_path, 'CV_'.$application->name.'.'.pathinfo($application->cv_path, PATHINFO_EXTENSION));
        }

        return back()->with('error', 'CV file not found or was not uploaded.');
    }

    public function destroy(JobApplication $application): RedirectResponse
    {
        if ($application->cv_path && Storage::disk('public')->exists($application->cv_path)) {
            Storage::disk('public')->delete($application->cv_path);
        }

        $application->delete();

        return back()->with('success', 'Job application deleted.');
    }
}
