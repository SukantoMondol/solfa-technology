<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;
use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    public function index(): View
    {
        $jobs = JobOpening::latest()->paginate(20);

        foreach ($jobs as $job) {
            $job->applications_count = JobApplication::where('job_title', $job->title)->count();
        }

        return view('admin.jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    public function create(): View
    {
        return view('admin.jobs.form', ['job' => new JobOpening()]);
    }

    public function store(Request $request): RedirectResponse
    {
        JobOpening::create($this->validated($request));

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening created.');
    }

    public function edit(JobOpening $job): View
    {
        return view('admin.jobs.form', ['job' => $job]);
    }

    public function update(Request $request, JobOpening $job): RedirectResponse
    {
        $job->update($this->validated($request, $job->id));

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening updated.');
    }

    public function destroy(JobOpening $job): RedirectResponse
    {
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening deleted.');
    }

    private function validated(Request $request, ?int $id = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:190'],
            'slug' => ['nullable', 'string', 'max:190', 'unique:jobs_openings,slug,'.($id ?? 'NULL')],
            'location' => ['nullable', 'string', 'max:190'],
            'type' => ['nullable', 'string', 'max:60'],
            'workplace_type' => ['nullable', 'string', 'max:60'],
            'vacancies' => ['nullable', 'integer', 'min:1'],
            'salary' => ['nullable', 'string', 'max:120'],
            'summary' => ['nullable', 'string', 'max:1000'],
            'description' => ['nullable', 'string'],
            'deadline' => ['nullable', 'date'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
