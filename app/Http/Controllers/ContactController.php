<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $profile = SchoolProfile::first();
        return view('pages.contact', compact('profile'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Tim PKBM AL-QUDWAH akan segera menghubungi Anda kembali.');
    }
}
