<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'PKBM AL-QUDWAH - Pusat Kegiatan Belajar Masyarakat Paket B & Paket C')</title>
    <meta name="description" content="@yield('meta_description', 'Website Resmi PKBM AL-QUDWAH Campaka Cianjur. Penyelenggara Pendidikan Kesetaraan Paket B (setara SMP) dan Paket C (setara SMA) resmi terdaftar Dapodik Kemdikbudristek NPSN P9998654.')">
    <meta name="keywords" content="PKBM AL QUDWAH, Paket B Cianjur, Paket C Cianjur, Sekolah Kesetaraan Campaka, Ijazah Paket C, Pendidikan Nonformal, Kejar Paket Cianjur">
    <meta name="author" content="PKBM AL-QUDWAH">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'PKBM AL-QUDWAH - Pendidikan Kesetaraan Paket B & C')">
    <meta property="og:description" content="@yield('meta_description', 'Lembaga Pendidikan Nonformal Resmi Penyelenggara Paket B & Paket C di Campaka Cianjur. NPSN P9998654.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome (ikon) & Alpine.js (interaksi: modal galeri, dll) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen selection:bg-blue-600 selection:text-white">

    <!-- TOPBAR -->
    <div class="bg-slate-900 text-slate-300 text-xs border-b border-slate-800 hidden lg:block">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2.5 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span class="flex items-center space-x-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>{{ $schoolProfile->alamat ?? 'Kp. Ciwalen RT 003 RW 004' }}, {{ $schoolProfile->desa ?? 'Cidadap' }}, {{ $schoolProfile->kecamatan ?? 'Campaka' }}, {{ $schoolProfile->kabupaten ?? 'Cianjur' }}</span>
                </span>
                <span class="flex items-center space-x-1.5">
                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>{{ $schoolProfile->telepon ?? '085864183271' }}</span>
                </span>
                <span class="flex items-center space-x-1.5">
                    <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>{{ $schoolProfile->email ?? 'pkbmalqudwah2022@gmail.com' }}</span>
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <span class="bg-blue-900/60 text-blue-200 px-2.5 py-0.5 rounded text-[11px] font-medium border border-blue-700/50">
                    NPSN: {{ $schoolProfile->npsn ?? 'P9998654' }}
                </span>
                <a href="{{ env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/') }}" target="_blank" rel="noopener" class="inline-flex items-center space-x-1 text-amber-400 hover:text-amber-300 font-semibold transition">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Aplikasi Ujian CBT</span>
                </a>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR -->
    <header id="mainNavbar" class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 transition-all duration-300 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- LOGO & BRAND -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo PKBM AL-QUDWAH" class="h-12 w-auto object-contain transition-transform group-hover:scale-105 drop-shadow-sm">
                    <div class="flex flex-col">
                        <span class="text-lg font-extrabold tracking-tight whitespace-nowrap text-blue-950 group-hover:text-blue-700 transition leading-tight">
                            PKBM AL-QUDWAH
                        </span>
                        <span class="text-[10px] font-bold text-amber-600 tracking-widest uppercase whitespace-nowrap">
                            Paket B & Paket C Kesetaraan
                        </span>
                    </div>
                </a>

                <!-- DESKTOP NAV -->
                <nav class="hidden xl:flex items-center gap-0.5 text-[13px] font-semibold text-slate-600 whitespace-nowrap">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('home') ? 'text-blue-700 font-bold bg-blue-50' : 'hover:text-blue-700 hover:bg-slate-50' }}">
                        Beranda
                    </a>
                    <a href="{{ route('profile') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('profile') ? 'text-blue-700 font-bold bg-blue-50' : 'hover:text-blue-700 hover:bg-slate-50' }}">
                        Profil
                    </a>
                    <a href="{{ route('programs.index') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('programs.*') ? 'text-blue-700 font-bold bg-blue-50' : 'hover:text-blue-700 hover:bg-slate-50' }}">
                        Program
                    </a>
                    <a href="{{ route('tutors.index') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('tutors.index') ? 'text-blue-700 font-bold bg-blue-50' : 'hover:text-blue-700 hover:bg-slate-50' }}">
                        Tenaga Pendidik
                    </a>
                    <a href="{{ route('posts.index') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('posts.*') ? 'text-blue-700 font-bold bg-blue-50' : 'hover:text-blue-700 hover:bg-slate-50' }}">
                        Berita
                    </a>
                    <a href="{{ route('gallery.index') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('gallery.index') ? 'text-blue-700 font-bold bg-blue-50' : 'hover:text-blue-700 hover:bg-slate-50' }}">
                        Galeri
                    </a>
                    <a href="{{ route('pendaftaran.index') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('pendaftaran.*') ? 'text-blue-700 font-bold bg-blue-50' : 'hover:text-blue-700 hover:bg-slate-50' }}">
                        Pendaftaran
                    </a>
                    <a href="{{ route('contact.index') }}" class="px-3 py-2 rounded-lg transition {{ request()->routeIs('contact.index') ? 'text-blue-700 font-bold bg-blue-50' : 'hover:text-blue-700 hover:bg-slate-50' }}">
                        Kontak
                    </a>
                </nav>

                <!-- ACTIONS & LOGIN -->
                <div class="hidden xl:flex items-center gap-2.5 whitespace-nowrap shrink-0">
                    <a href="{{ route('pendaftaran.index') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 transition shadow-sm hover:shadow">
                        Daftar Online
                    </a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center space-x-1.5 px-3.5 py-2 rounded-lg text-sm font-semibold text-blue-900 bg-blue-50 hover:bg-blue-100 border border-blue-200 transition">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            <span>Panel Admin</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center space-x-1.5 px-3.5 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:text-blue-700 bg-slate-100 hover:bg-slate-200 transition">
                            <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            <span>Login</span>
                        </a>
                    @endauth
                </div>

                <!-- MOBILE HAMBURGER BUTTON -->
                <div class="xl:hidden flex items-center space-x-2">
                    <a href="{{ route('login') }}" class="p-2 text-slate-600 hover:text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                    </a>
                    <button id="mobileMenuBtn" type="button" class="p-2.5 rounded-lg text-slate-700 hover:bg-slate-100 focus:outline-none" aria-label="Toggle navigation menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- MOBILE MENU OVERLAY -->
        <div id="mobileMenu" class="hidden xl:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-1 shadow-lg">
            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                Beranda
            </a>
            <a href="{{ route('profile') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('profile') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                Profil Lembaga
            </a>
            <a href="{{ route('programs.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('programs.*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                Program Pendidikan (Paket B & C)
            </a>
            <a href="{{ route('tutors.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('tutors.index') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                Tenaga Pendidik & Pengelola
            </a>
            <a href="{{ route('posts.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('posts.*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                Berita & Kegiatan
            </a>
            <a href="{{ route('gallery.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('gallery.index') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                Galeri Foto
            </a>
            <a href="{{ route('pendaftaran.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('pendaftaran.*') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                Informasi Pendaftaran
            </a>
            <a href="{{ route('contact.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('contact.index') ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-700 hover:bg-slate-50' }}">
                Kontak & Lokasi
            </a>
            <a href="{{ env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/') }}" target="_blank" rel="noopener" class="block px-3 py-2.5 rounded-lg text-base font-medium text-amber-700 bg-amber-50 hover:bg-amber-100 flex items-center justify-between">
                <span>Aplikasi Ujian CBT Siswa & Guru</span>
                <i class="fa-solid fa-arrow-up-right-from-square text-xs text-amber-600"></i>
            </a>
            <div class="pt-4 border-t border-slate-100 flex flex-col space-y-2">
                <a href="{{ route('pendaftaran.index') }}" class="w-full text-center py-2.5 px-4 rounded-lg bg-blue-600 text-white font-semibold">
                    Daftar Online Warga Belajar
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="w-full text-center py-2 px-4 rounded-lg bg-slate-100 text-slate-800 font-medium">
                        Panel Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="w-full text-center py-2 px-4 rounded-lg border border-slate-200 text-slate-700 font-medium">
                        Login Pengelola
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- ALERT MESSAGES -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg shadow-sm flex items-start space-x-3">
                <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div class="text-sm text-emerald-800 font-medium">{{ session('success') }}</div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-r-lg shadow-sm flex items-start space-x-3">
                <svg class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div class="text-sm text-rose-800 font-medium">{{ session('error') }}</div>
            </div>
        </div>
    @endif

    <!-- MAIN CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                <!-- COL 1: IDENTITAS -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo PKBM AL-QUDWAH" class="h-12 w-auto bg-white p-1 rounded-full">
                        <div>
                            <h3 class="text-base font-bold text-white tracking-wide">PKBM AL-QUDWAH</h3>
                            <p class="text-xs text-amber-400 font-medium">NPSN: {{ $schoolProfile->npsn ?? 'P9998654' }}</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Lembaga pendidikan nonformal resmi penyelenggara pendidikan kesetaraan Paket B (setara SMP) dan Paket C (setara SMA) di Campaka Cianjur. Ijazah resmi negara diakui untuk melanjutkan kuliah dan dunia kerja.
                    </p>
                    <div class="pt-2 text-xs text-slate-400 space-y-1">
                        <p><strong class="text-slate-300">SK Pendirian:</strong> {{ $schoolProfile->sk_pendirian ?? '021/SK/YAHC/XI/2022' }}</p>
                        <p><strong class="text-slate-300">Izin Operasional:</strong> {{ $schoolProfile->sk_izin_operasional ?? '421.9/ 1627 /PAUDNI/KAB/2022' }}</p>
                    </div>
                </div>

                <!-- COL 2: PROGRAM PENDIDIKAN -->
                <div class="space-y-4">
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider border-b border-slate-700 pb-2">Program Pendidikan</h4>
                    <ul class="space-y-2.5 text-xs text-slate-400">
                        <li>
                            <a href="{{ route('programs.show', 'paket-b') }}" class="hover:text-amber-400 transition flex items-center space-x-2">
                                <span class="text-blue-400 font-bold">›</span>
                                <span>Paket B (Setara SMP / MTs)</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('programs.show', 'paket-c') }}" class="hover:text-amber-400 transition flex items-center space-x-2">
                                <span class="text-blue-400 font-bold">›</span>
                                <span>Paket C (Setara SMA / MA)</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pendaftaran.index') }}" class="hover:text-amber-400 transition flex items-center space-x-2">
                                <span class="text-blue-400 font-bold">›</span>
                                <span>Syarat & Alur Pendaftaran</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/') }}" target="_blank" rel="noopener" class="hover:text-amber-400 transition flex items-center space-x-2">
                                <span class="text-amber-400 font-bold">›</span>
                                <span>Aplikasi Ujian CBT (sistem-ujian.pkbmalqudwah.id)</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- COL 3: NAVIGASI CEPAT -->
                <div class="space-y-4">
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider border-b border-slate-700 pb-2">Navigasi Utama</h4>
                    <ul class="space-y-2.5 text-xs text-slate-400">
                        <li><a href="{{ route('profile') }}" class="hover:text-white transition">Profil & Visi Misi</a></li>
                        <li><a href="{{ route('tutors.index') }}" class="hover:text-white transition">Dewan Tutor & Pengelola</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:text-white transition">Berita & Dokumentasi Kegiatan</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-white transition">Galeri Foto Sekolah</a></li>
                        <li><a href="{{ route('contact.index') }}" class="hover:text-white transition">Kontak & Lokasi Lembaga</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-amber-400 transition">Portal Login Pengelola</a></li>
                    </ul>
                </div>

                <!-- COL 4: KONTAK & JAM LAYANAN -->
                <div class="space-y-4">
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider border-b border-slate-700 pb-2">Kontak Resmi</h4>
                    <div class="space-y-2.5 text-xs text-slate-400">
                        <div class="flex items-start space-x-2.5">
                            <svg class="w-4 h-4 text-amber-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $schoolProfile->alamat ?? 'Kp. Ciwalen Rt. 003 Rw. 004' }}, Desa {{ $schoolProfile->desa ?? 'Cidadap' }}, Kec. {{ $schoolProfile->kecamatan ?? 'Campaka' }}, Kab. {{ $schoolProfile->kabupaten ?? 'Cianjur' }}, {{ $schoolProfile->provinsi ?? 'Jawa Barat' }} 43263</span>
                        </div>
                        <div class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-emerald-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>{{ $schoolProfile->telepon ?? '085864183271' }} / 085722499957</span>
                        </div>
                        <div class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>{{ $schoolProfile->email ?? 'pkbmalqudwah2022@gmail.com' }}</span>
                        </div>
                        <div class="flex items-center space-x-2.5 pt-1 text-slate-300">
                            <svg class="w-4 h-4 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $schoolProfile->jam_layanan ?? 'Senin - Sabtu: 08.00 - 16.00 WIB' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COPYRIGHT -->
            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-400 gap-4">
                <p>&copy; {{ date('Y') }} PKBM AL-QUDWAH. Hak Cipta Dilindungi Undang-Undang.</p>
                <div class="flex items-center space-x-6">
                    <a href="{{ route('profile') }}" class="hover:text-slate-300">Identitas Sekolah</a>
                    <a href="{{ route('pendaftaran.index') }}" class="hover:text-slate-300">Pendaftaran</a>
                    <a href="{{ route('contact.index') }}" class="hover:text-slate-300">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/6285864183271?text=Halo%20Admin%20PKBM%20AL-QUDWAH,%20saya%20ingin%20mendapatkan%20informasi%20pendaftaran%20Paket%20B%20/%20Paket%20C" target="_blank" rel="noopener noreferrer" class="fixed bottom-6 right-6 z-40 bg-emerald-600 hover:bg-emerald-700 text-white p-3.5 rounded-full shadow-lg hover:shadow-emerald-500/30 transition-all duration-300 hover:scale-105 flex items-center justify-center group" aria-label="Konsultasi WhatsApp">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-300 ease-in-out pl-0 group-hover:pl-2 text-xs font-semibold">
            Konsultasi WhatsApp
        </span>
    </a>

    <!-- SCRIPTS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            if (mobileBtn && mobileMenu) {
                mobileBtn.addEventListener('click', function () {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Sticky navbar elevation on scroll
            const navbar = document.getElementById('mainNavbar');
            window.addEventListener('scroll', function () {
                if (window.scrollY > 20) {
                    navbar.classList.add('shadow-md', 'py-1');
                } else {
                    navbar.classList.remove('shadow-md', 'py-1');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
