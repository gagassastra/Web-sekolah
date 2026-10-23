<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use App\Models\Tutor;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = SchoolProfile::first();
        $leaders = Tutor::where('kategori', 'Pimpinan & Pengelola')->where('is_active', true)->orderBy('urutan')->get();
        $staff = Tutor::where('kategori', 'Staf IT & Administrasi')->where('is_active', true)->orderBy('urutan')->get();

        return view('pages.profile', compact('profile', 'leaders', 'staff'));
    }
}
