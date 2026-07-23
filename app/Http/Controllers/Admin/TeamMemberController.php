<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamMemberController extends Controller
{
    public function index(): View
    {
        return view('admin.team_members.index', [
            'teamMembers' => TeamMember::orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('admin.team_members.form', ['member' => new TeamMember()]);
    }

    public function store(Request $request): RedirectResponse
    {
        TeamMember::create($this->validated($request));

        return redirect()->route('admin.team_members.index')->with('success', 'Team member created.');
    }

    public function edit(TeamMember $teamMember): View
    {
        return view('admin.team_members.form', ['member' => $teamMember]);
    }

    public function update(Request $request, TeamMember $teamMember): RedirectResponse
    {
        $teamMember->update($this->validated($request, $teamMember));

        return redirect()->route('admin.team_members.index')->with('success', 'Team member updated.');
    }

    public function destroy(TeamMember $teamMember): RedirectResponse
    {
        $teamMember->delete();

        return redirect()->route('admin.team_members.index')->with('success', 'Team member deleted.');
    }

    private function validated(Request $request, ?TeamMember $member = null): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5120'],
        ];

        if (!$member) {
            $rules['image_file'][] = 'required_without:image';
        }

        $data = $request->validate($rules);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\._-]/', '', $file->getClientOriginalName());
            $file->move(public_path('uploads/team'), $filename);
            $data['image'] = 'uploads/team/' . $filename;
        }

        unset($data['image_file']);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
