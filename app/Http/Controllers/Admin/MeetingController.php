<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MeetingController extends Controller
{
    public function index(): View
    {
        return view('admin.meetings.index', [
            'meetings' => Meeting::latest()->paginate(20),
        ]);
    }

    public function updateStatus(Request $request, Meeting $meeting): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'string', 'in:confirmed,completed,cancelled'],
        ]);

        $meeting->update(['status' => $request->status]);

        return back()->with('success', 'Meeting status updated.');
    }

    public function destroy(Meeting $meeting): RedirectResponse
    {
        $meeting->delete();

        return back()->with('success', 'Meeting deleted.');
    }
}
