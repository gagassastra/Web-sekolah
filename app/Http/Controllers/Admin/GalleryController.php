<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    /** Daftar kategori galeri yang tersedia pada dropdown. */
    private const CATEGORIES = [
        'Kegiatan Pembelajaran',
        'Upacara & Kepramukaan',
        'Dewan Tutor & Pengelola',
        'Warga Belajar & Kebersamaan',
        'Dokumen Lembaga',
    ];

    public function index(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }

        $galleries = $query->orderBy('urutan')->paginate(12)->withQueryString();
        $categories = Gallery::select('category')->distinct()->pluck('category');

        return view('admin.galleries.index', compact('galleries', 'categories'));
    }

    public function create()
    {
        $defaultCategories = self::CATEGORIES;
        return view('admin.galleries.create', compact('defaultCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => ['required', 'string', 'max:100', Rule::in(self::CATEGORIES)],
            'caption' => 'nullable|string',
            'event_date' => 'nullable|date',
            'urutan' => 'nullable|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $validated['image_path'] = '/storage/' . $path;
        }

        $validated['urutan'] = $validated['urutan'] ?? 1;

        Gallery::create($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        $defaultCategories = self::CATEGORIES;
        return view('admin.galleries.edit', compact('gallery', 'defaultCategories'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => ['required', 'string', 'max:100', Rule::in(array_merge(self::CATEGORIES, [$gallery->category]))],
            'caption' => 'nullable|string',
            'event_date' => 'nullable|date',
            'urutan' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $validated['image_path'] = '/storage/' . $path;
        }

        $validated['urutan'] = $validated['urutan'] ?? $gallery->urutan;

        $gallery->update($validated);

        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
