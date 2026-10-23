<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Panel Pengelola' }} - PKBM AL-QUDWAH</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/logo-pkbm.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100 text-slate-800" x-data="{ sidebarOpen: false }">

    <div class="min-h-screen flex">
        
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" x-cloak
             @click="sidebarOpen = false"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-40 bg-navy-950/80 backdrop-blur-sm lg:hidden">
        </div>

        <!-- Sidebar Navigation -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
               class="fixed lg:sticky top-0 left-0 z-50 h-screen w-72 bg-navy-950 text-white flex flex-col justify-between transition-transform duration-300 ease-in-out border-r border-navy-900 shadow-2xl lg:shadow-none shrink-0">
            
            <!-- Sidebar Header -->
            <div>
                <div class="h-20 px-6 flex items-center justify-between border-b border-white/10">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo/logo-pkbm.png') }}" alt="Logo PKBM" class="w-10 h-10 object-contain bg-white/10 p-1.5 rounded-xl border border-white/10">
                        <div>
                            <span class="block text-sm font-black tracking-tight text-white leading-none">PKBM AL-QUDWAH</span>
                            <span class="block text-[10px] text-gold-400 font-semibold tracking-wider uppercase mt-1">Panel Pengelola</span>
                        </div>
                    </a>
                    <button type="button" @click="sidebarOpen = false" class="lg:hidden text-white/70 hover:text-white p-1">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>

                <!-- Nav Items Container -->
                <nav class="px-4 py-6 space-y-1.5 overflow-y-auto max-h-[calc(100vh-170px)]">
                    
                    <!-- Section: UTAMA -->
                    <div class="px-3 pb-2 text-[10px] font-bold uppercase tracking-wider text-navy-400">
                        Menu Utama
                    </div>

                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600 text-white shadow-md' : 'text-navy-200 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-gauge-high w-4 text-center"></i>
                        <span>Dashboard</span>
                    </a>

                    <!-- Section: KONTEN SEKOLAH -->
                    <div class="px-3 pt-4 pb-2 text-[10px] font-bold uppercase tracking-wider text-navy-400">
                        Konten & Informasi
                    </div>

                    <a href="{{ route('admin.profile.edit') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition {{ request()->routeIs('admin.profile.*') ? 'bg-primary-600 text-white shadow-md' : 'text-navy-200 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-school w-4 text-center"></i>
                        <span>Profil Lembaga</span>
                    </a>

                    <a href="{{ route('admin.programs.index') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition {{ request()->routeIs('admin.programs.*') ? 'bg-primary-600 text-white shadow-md' : 'text-navy-200 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-graduation-cap w-4 text-center"></i>
                        <span>Program Kesetaraan</span>
                    </a>

                    <a href="{{ route('admin.tutors.index') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition {{ request()->routeIs('admin.tutors.*') ? 'bg-primary-600 text-white shadow-md' : 'text-navy-200 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-chalkboard-user w-4 text-center"></i>
                        <span>Tenaga Pendidik / Tutor</span>
                    </a>

                    <a href="{{ route('admin.posts.index') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition {{ request()->routeIs('admin.posts.*') ? 'bg-primary-600 text-white shadow-md' : 'text-navy-200 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-newspaper w-4 text-center"></i>
                        <span>Warta & Kegiatan</span>
                    </a>

                    <a href="{{ route('admin.galleries.index') }}"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition {{ request()->routeIs('admin.galleries.*') ? 'bg-primary-600 text-white shadow-md' : 'text-navy-200 hover:bg-white/5 hover:text-white' }}">
                        <i class="fa-solid fa-images w-4 text-center"></i>
                        <span>Galeri Foto</span>
                    </a>

                    <!-- Section: LAYANAN & SISWA -->
                    <div class="px-3 pt-4 pb-2 text-[10px] font-bold uppercase tracking-wider text-navy-400">
                        Layanan Siswa & Kontak
                    </div>

                    <a href="{{ route('admin.registrations.index') }}"
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition {{ request()->routeIs('admin.registrations.*') ? 'bg-primary-600 text-white shadow-md' : 'text-navy-200 hover:bg-white/5 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-id-card w-4 text-center"></i>
                            <span>Pendaftaran Siswa</span>
                        </div>
                        @if(isset($newRegistrationsCount) && $newRegistrationsCount > 0)
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-navy-950">
                                {{ $newRegistrationsCount }}
                            </span>
                        @endif
                    </a>

                    <a href="{{ route('admin.messages.index') }}"
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold transition {{ request()->routeIs('admin.messages.*') ? 'bg-primary-600 text-white shadow-md' : 'text-navy-200 hover:bg-white/5 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <i class="fa-regular fa-envelope w-4 text-center"></i>
                            <span>Pesan Masuk</span>
                        </div>
                        @if(isset($unreadMessagesCount) && $unreadMessagesCount > 0)
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-gold-400 text-navy-950">
                                {{ $unreadMessagesCount }}
                            </span>
                        @endif
                    </a>

                    @if(auth()->user() && auth()->user()->isAdmin())
                        <div class="px-3 pt-4 pb-2 text-[10px] font-bold uppercase tracking-wider text-navy-400">
                            Pengaturan Sistem
                        </div>

                        <a href="{{ route('admin.users.index') }}"
                           class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold transition {{ request()->routeIs('admin.users.*') ? 'bg-primary-600 text-white shadow-md' : 'text-navy-200 hover:bg-white/5 hover:text-white' }}">
                            <i class="fa-solid fa-users-gear w-4 text-center"></i>
                            <span>Kelola Pengguna</span>
                        </a>
                    @endif

                    <!-- Section: INTEGRASI -->
                    <div class="px-3 pt-4 pb-2 text-[10px] font-bold uppercase tracking-wider text-navy-400">
                        Integrasi & Navigasi
                    </div>

                    <a href="{{ route('home') }}" target="_blank"
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold text-navy-200 hover:bg-white/5 hover:text-white transition">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-globe w-4 text-center text-primary-400"></i>
                            <span>Lihat Website Publik</span>
                        </div>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-navy-400"></i>
                    </a>

                    <a href="{{ env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/') }}" target="_blank" rel="noopener"
                       class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold text-navy-200 hover:bg-white/5 hover:text-white transition">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-laptop-code w-4 text-center text-gold-400"></i>
                            <span>Aplikasi Ujian CBT</span>
                        </div>
                        <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-navy-400"></i>
                    </a>

                </nav>
            </div>

            <!-- Sidebar User Card Footer -->
            <div class="p-4 border-t border-white/10 bg-navy-950/60">
                <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-9 h-9 rounded-full bg-primary-600 flex items-center justify-center font-bold text-xs text-white shrink-0">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="min-w-0">
                            <span class="block text-xs font-bold text-white truncate">{{ auth()->user()->name ?? 'Administrator' }}</span>
                            <span class="block text-[10px] text-navy-300 capitalize truncate">{{ auth()->user()->role ?? 'admin' }}</span>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="p-2 text-navy-400 hover:text-red-400 hover:bg-white/5 rounded-lg transition" title="Logout">
                            <i class="fa-solid fa-arrow-right-from-bracket text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>

        </aside>

        <!-- Main Workspace (Right) -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            
            <!-- Topbar -->
            <header class="h-20 bg-white border-b border-slate-200/80 px-4 sm:px-6 lg:px-8 flex items-center justify-between sticky top-0 z-30 shadow-xs">
                <div class="flex items-center gap-4">
                    <button type="button" @click="sidebarOpen = true" class="lg:hidden text-slate-600 hover:text-navy-900 p-2 rounded-xl hover:bg-slate-100 transition">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <div>
                        <h1 class="text-base sm:text-lg font-bold text-navy-900 leading-tight">
                            {{ $header ?? 'Panel Pengelola PKBM AL-QUDWAH' }}
                        </h1>
                        <p class="text-xs text-slate-500 hidden sm:block">
                            Sistem Manajemen Informasi, Akademik Kesetaraan, dan Publikasi Digital
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Quick View Web button -->
                    <a href="{{ route('home') }}" target="_blank"
                       class="hidden sm:inline-flex items-center gap-2 px-3.5 py-2 bg-slate-100 hover:bg-slate-200 text-navy-900 text-xs font-semibold rounded-xl transition border border-slate-200">
                        <i class="fa-solid fa-globe text-primary-600"></i> Website
                    </a>

                    <!-- Direct CBT Link button -->
                    <a href="{{ env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/') }}" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 px-3.5 py-2 bg-gold-400 hover:bg-gold-500 text-navy-950 text-xs font-bold rounded-xl transition shadow-xs">
                        <i class="fa-solid fa-laptop-code"></i> Ujian CBT
                    </a>

                    <!-- User Initials / Profile -->
                    <div class="flex items-center gap-2 pl-2 border-l border-slate-200">
                        <div class="w-8 h-8 rounded-full bg-navy-900 text-white flex items-center justify-center text-xs font-bold">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-y-auto">
                <!-- Session Alerts -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between text-sm shadow-xs" x-data="{ show: true }" x-show="show">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button type="button" @click="show = false" class="text-emerald-600 hover:text-emerald-800 p-1">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 flex items-center justify-between text-sm shadow-xs" x-data="{ show: true }" x-show="show">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-xmark text-red-600 text-lg"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                        <button type="button" @click="show = false" class="text-red-600 hover:text-red-800 p-1">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                @endif

                @yield('content')
            </main>

            <!-- Admin Footer -->
            <footer class="h-14 bg-white border-t border-slate-200/80 px-6 flex items-center justify-between text-xs text-slate-500">
                <span>PKBM AL-QUDWAH &copy; {{ date('Y') }}. Sistem Informasi Manajemen Sekolah.</span>
                <span>Desa Cidadap, Kec. Campaka, Cianjur</span>
            </footer>

        </div>

    </div>

</body>
</html>
