<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function index()
    {
        $leaders = Tutor::where('kategori', 'Pimpinan & Pengelola')->where('is_active', true)->orderBy('urutan')->get();
        $tutors = Tutor::where('kategori', 'Tutor & Guru')->where('is_active', true)->orderBy('urutan')->get();
        $staff = Tutor::where('kategori', 'Staf IT & Administrasi')->where('is_active', true)->orderBy('urutan')->get();

        // Slide foto otomatis diambil dari galeri berkategori Dewan Tutor & Pengelola
        $slides = Gallery::where('category', 'Dewan Tutor & Pengelola')
            ->orderBy('urutan')
            ->orderByDesc('id')
            ->get()
            ->map(fn (Gallery $g) => ['src' => $g->image_url, 'caption' => $g->title])
            ->values();

        // Cadangan bila belum ada foto pada kategori tersebut
        if ($slides->isEmpty()) {
            $slides = collect([
                ['src' => asset('images/tutor/dewan-tutor-1.jpg'), 'caption' => 'Dewan Tutor dan Pengelola PKBM AL-QUDWAH Bersama Mewujudkan Pendidikan Berkualitas di Campaka Cianjur'],
                ['src' => asset('images/tutor/dewan-tutor-2.jpg'), 'caption' => 'Kebersamaan Dewan Tutor dan Pengelola PKBM AL-QUDWAH'],
                ['src' => asset('images/tutor/dewan-tutor-3.jpg'), 'caption' => 'Dedikasi Tutor dan Pengelola dalam Mendampingi Warga Belajar'],
            ]);
        }

        return view('pages.tutors', compact('leaders', 'tutors', 'staff', 'slides'));
    }
}
