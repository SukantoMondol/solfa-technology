<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        return view('admin.galleries.index', [
            'galleries' => Gallery::orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('admin.galleries.form', ['gallery' => new Gallery()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Gallery::create($this->validated($request));

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item created.');
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.galleries.form', ['gallery' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $gallery->update($this->validated($request, $gallery));

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item updated.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();

        return redirect()->route('admin.galleries.index')->with('success', 'Gallery item deleted.');
    }

    private function validated(Request $request, ?Gallery $gallery = null): array
    {
        $rules = [
            'title' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'image' => ['nullable', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:5120'],
        ];

        // Image file is required when creating if no image string is set
        if (!$gallery) {
            $rules['image_file'][] = 'required_without:image';
        }

        $data = $request->validate($rules);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\._-]/', '', $file->getClientOriginalName());
            $file->move(public_path('uploads/galleries'), $filename);
            $data['image'] = 'uploads/galleries/' . $filename;
        }

        unset($data['image_file']);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
