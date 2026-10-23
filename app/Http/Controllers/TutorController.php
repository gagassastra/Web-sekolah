<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function index()
    {
        $leaders = Tutor::where('kategori', 'Pimpinan & Pengelola')->where('is_active', true)->orderBy('urutan')->get();
        $tutors = Tutor::where('kategori', 'Tutor & Guru')->where('is_active', true)->orderBy('urutan')->get();
        $staff = Tutor::where('kategori', 'Staf IT & Administrasi')->where('is_active', true)->orderBy('urutan')->get();

        return view('pages.tutors', compact('leaders', 'tutors', 'staff'));
    }
}
