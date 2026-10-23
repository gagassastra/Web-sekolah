@extends('layouts.app', ['title' => 'Halaman Tidak Ditemukan - PKBM AL-QUDWAH'])

@section('content')
<section class="py-20 bg-slate-50 min-h-[75vh] flex items-center">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        
        <div class="inline-block px-4 py-1.5 rounded-full bg-blue-50 text-primary-700 text-xs font-bold uppercase tracking-wider mb-4 border border-blue-100">
            Error 404
        </div>

        <h1 class="text-6xl sm:text-7xl font-black text-navy-900 tracking-tight mb-4">
            404
        </h1>

        <h2 class="text-xl sm:text-2xl font-bold text-navy-900 mb-3">
            Halaman Tidak Ditemukan
        </h2>

        <p class="text-slate-600 text-sm max-w-md mx-auto mb-8 leading-relaxed">
            Maaf, halaman yang Anda tuju tidak tersedia atau telah dipindahkan. Silakan gunakan menu navigasi atau kembali ke beranda.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('home') }}" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl text-xs sm:text-sm transition shadow-md flex items-center gap-2">
                <i class="fa-solid fa-house"></i> Kembali ke Beranda
            </a>
            <a href="{{ route('program.index') }}" class="px-5 py-3 bg-white hover:bg-slate-100 text-navy-900 font-bold rounded-xl text-xs sm:text-sm transition border border-slate-300 flex items-center gap-2">
                <i class="fa-solid fa-graduation-cap text-primary-600"></i> Program Kesetaraan
            </a>
            <a href="{{ route('kontak.index') }}" class="px-5 py-3 bg-white hover:bg-slate-100 text-navy-900 font-bold rounded-xl text-xs sm:text-sm transition border border-slate-300 flex items-center gap-2">
                <i class="fa-regular fa-envelope text-primary-600"></i> Hubungi Kami
            </a>
        </div>

    </div>
</section>
@endsection
