<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
        ]);

        Subscriber::firstOrCreate(['email' => $validated['email']], $validated);

        return back()->with('newsletter_success', 'You are subscribed! Watch your inbox for updates.');
    }
}
