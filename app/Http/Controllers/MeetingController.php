<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'meeting_date' => ['required', 'date'],
            'meeting_time' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'notes' => ['nullable', 'string'],
        ]);

        $meeting = Meeting::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Meeting scheduled successfully!',
            'meeting' => [
                'id' => $meeting->id,
                'date' => $meeting->meeting_date->format('l, F j, Y'),
                'time' => $meeting->meeting_time,
                'name' => $meeting->name,
                'email' => $meeting->email,
            ]
        ]);
    }
}
