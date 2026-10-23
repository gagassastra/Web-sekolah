<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamPortalController extends Controller
{
    public function index(Request $request)
    {
        $examUrl = env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/');

        // Jika ada parameter ?info=1 tampilkan halaman petunjuk, selain itu langsung redirect ke aplikasi CBT
        if ($request->has('info')) {
            return view('pages.exam-portal', compact('examUrl'));
        }

        return redirect()->away($examUrl);
    }
}
