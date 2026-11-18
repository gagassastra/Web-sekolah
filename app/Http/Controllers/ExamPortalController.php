<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamPortalController extends Controller
{
    public function index(Request $request)
    {
        $examUrl = env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/');
        $eraportUrl = env('ERAPORT_APP_URL', 'https://e-raport.pkbmalqudwah.id/');

        // Jika ada parameter ?info=1 tampilkan halaman petunjuk, selain itu langsung redirect ke aplikasi CBT
        if ($request->has('info')) {
            return view('pages.exam-portal', compact('examUrl', 'eraportUrl'));
        }

        return redirect()->away($examUrl);
    }

    public function eraport(Request $request)
    {
        $eraportUrl = env('ERAPORT_APP_URL', 'https://e-raport.pkbmalqudwah.id/');
        $examUrl = env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/');

        // Jika ada parameter ?info=1 tampilkan halaman petunjuk, selain itu langsung redirect ke aplikasi E-Raport
        if ($request->has('info')) {
            return view('pages.eraport-portal', compact('eraportUrl', 'examUrl'));
        }

        return redirect()->away($eraportUrl);
    }
}
