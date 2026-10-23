<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::orderBy('urutan');

        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }

        $galleries = $query->paginate(12)->withQueryString();
        $categories = Gallery::select('category')->distinct()->pluck('category');

        return view('pages.gallery', compact('galleries', 'categories'));
    }
}
