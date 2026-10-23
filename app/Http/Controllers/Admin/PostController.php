<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('author');

        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        $posts = $query->latest()->paginate(10)->withQueryString();
        $categories = ['Kegiatan', 'Berita', 'Pengumuman', 'Prestasi'];

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = ['Kegiatan', 'Berita', 'Pengumuman', 'Prestasi'];
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'category' => 'required|string|in:Kegiatan,Berita,Pengumuman,Prestasi',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        }

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts', 'public');
            $validated['featured_image'] = '/storage/' . $path;
        }

        $validated['author_id'] = Auth::id();
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['published_at'] ?? ($validated['is_published'] ? now() : null);

        Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Berita atau kegiatan berhasil dipublikasikan.');
    }

    public function edit(Post $post)
    {
        $categories = ['Kegiatan', 'Berita', 'Pengumuman', 'Prestasi'];
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'category' => 'required|string|in:Kegiatan,Berita,Pengumuman,Prestasi',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'published_at' => 'nullable|date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
        ]);

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('posts', 'public');
            $validated['featured_image'] = '/storage/' . $path;
        }

        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['published_at'] ?? $post->published_at ?? ($validated['is_published'] ? now() : null);

        $post->update($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil dihapus.');
    }
}
