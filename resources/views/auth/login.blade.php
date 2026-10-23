<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk Pengelola - PKBM AL-QUDWAH</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-pkbm.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">

    <div class="max-w-4xl w-full bg-white rounded-3xl shadow-2xl border border-slate-200/80 overflow-hidden grid grid-cols-1 md:grid-cols-12 min-h-[580px]">
        
        <!-- Left Side: Institution Branding (5 cols) -->
        <div class="md:col-span-5 bg-gradient-to-br from-navy-950 via-navy-900 to-primary-950 text-white p-8 sm:p-10 flex flex-col justify-between relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-gold-400/10 rounded-full blur-3xl"></div>
            <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-primary-500/20 rounded-full blur-3xl"></div>

            <div class="relative z-10">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group mb-8">
                    <img src="{{ asset('images/logo/logo-pkbm.png') }}" alt="Logo PKBM" class="w-12 h-12 object-contain bg-white/10 p-1.5 rounded-xl border border-white/20">
                    <div>
                        <span class="block text-base font-extrabold tracking-tight text-white leading-tight">PKBM AL-QUDWAH</span>
                        <span class="block text-[11px] font-medium text-gold-400">NPSN: P9998654</span>
                    </div>
                </a>

                <h2 class="text-2xl font-black text-white leading-snug mb-3">
                    Sistem Informasi & Manajemen Sekolah
                </h2>
                <p class="text-navy-100 text-xs sm:text-sm leading-relaxed mb-6">
                    Akses khusus Pengelola, Administrator, dan Tenaga Pendidik PKBM AL-QUDWAH untuk pengelolaan konten, data siswa, dan publikasi.
                </p>

                <div class="space-y-2.5 text-xs text-navy-200 pt-4 border-t border-white/10">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-gold-400"></i>
                        <span>Pengelolaan Profil & Kurikulum</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-gold-400"></i>
                        <span>Data Pendaftar PPDB Online</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-gold-400"></i>
                        <span>Publikasi Warta & Galeri Kegiatan</span>
                    </div>
                </div>
            </div>

            <!-- Portal Ujian Quick Link -->
            <div class="relative z-10 pt-6 mt-6 border-t border-white/10">
                <p class="text-[11px] text-navy-200 mb-2">Ingin membuka ruang ujian CBT siswa?</p>
                <a href="{{ $examUrl }}" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 text-xs font-bold text-gold-400 hover:text-gold-300 transition">
                    <i class="fa-solid fa-laptop-code"></i> Menuju Aplikasi Ujian CBT <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>
        </div>

        <!-- Right Side: Login Form (7 cols) -->
        <div class="md:col-span-7 p-8 sm:p-12 flex flex-col justify-center">
            
            <div class="mb-6">
                <span class="text-xs font-bold uppercase tracking-wider text-primary-600 block mb-1">Autentikasi Pengelola</span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-navy-900 tracking-tight">
                    Masuk ke Akun Anda
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">
                    Silakan masukkan email dan kata sandi yang telah terdaftar.
                </p>
            </div>

            @if(session('status'))
                <div class="mb-4 p-3 bg-blue-50 border border-blue-200 text-blue-800 text-xs rounded-xl">
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 text-xs rounded-xl flex items-start gap-2">
                    <i class="fa-solid fa-circle-exclamation text-red-500 mt-0.5"></i>
                    <div>
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                               placeholder="nama@pkbmalqudwah.sch.id"
                               class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm transition">
                        <i class="fa-regular fa-envelope absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                        Kata Sandi
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required
                               placeholder="••••••••"
                               class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm transition">
                        <i class="fa-solid fa-lock absolute left-3.5 top-3.5 text-slate-400 text-sm"></i>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center gap-2 cursor-pointer select-none text-slate-600">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 border-slate-300">
                        <span>Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 px-4 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl shadow-lg shadow-primary-600/30 transition text-sm flex items-center justify-center gap-2">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Masuk Sekarang
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between text-xs">
                <a href="{{ route('home') }}" class="text-slate-500 hover:text-navy-900 font-semibold flex items-center gap-1.5 transition">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i> Kembali ke Website Sekolah
                </a>
                <span class="text-slate-400">PKBM AL-QUDWAH &copy; {{ date('Y') }}</span>
            </div>

        </div>

    </div>

</body>
</html>
