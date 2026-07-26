<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class JobApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $query = JobApplication::query();

        if ($request->filled('job_title')) {
            $query->where('job_title', $request->query('job_title'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->query('status'));
        }

        return view('admin.job_applications.index', [
            'applications' => $query->latest()->paginate(20),
            'selectedJobTitle' => $request->query('job_title'),
            'selectedStatus' => $request->query('status'),
        ]);
    }

    public function updateStatus(Request $request, JobApplication $application): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string',
        ]);

        $application->update(['status' => $validated['status']]);

        return back()->with('success', 'Candidate status updated.');
    }

    public function viewCv(JobApplication $application)
    {
        if ($application->cv_path && Storage::disk('public')->exists($application->cv_path)) {
            $fullPath = Storage::disk('public')->path($application->cv_path);
            $mimeType = Storage::disk('public')->mimeType($application->cv_path) ?? 'application/pdf';

            return response()->file($fullPath, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline; filename="CV_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $application->name) . '.' . pathinfo($application->cv_path, PATHINFO_EXTENSION) . '"',
            ]);
        }

        return back()->with('error', 'CV file not found or was not uploaded.');
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
