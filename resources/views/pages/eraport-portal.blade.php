@extends('layouts.app', ['title' => 'Portal Penilaian & E-Raport - PKBM AL-QUDWAH'])

@section('content')
<!-- Hero Portal -->
<section class="bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-emerald-400 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-blue-400 blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-emerald-400 text-xs font-semibold uppercase tracking-wider mb-4 border border-white/15">
            <i class="fa-solid fa-file-signature"></i> Sistem Penilaian & Raport Digital
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
            Portal Aplikasi Penilaian & E-Raport
        </h1>
        <p class="text-slate-200 max-w-2xl mx-auto text-base sm:text-lg">
            Akses resmi Sistem Informasi Penilaian Akademik dan Laporan Hasil Belajar (E-Raport) Peserta Didik Paket B & Paket C serta Dewan Tutor PKBM AL-QUDWAH.
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="py-12 lg:py-16 bg-slate-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Main Access Box -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-slate-200/80 mb-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Aplikasi E-Raport Resmi</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-blue-950 mt-2 mb-4">
                        Masuk ke Sistem Penilaian & E-Raport
                    </h2>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Aplikasi E-Raport digunakan untuk pengelolaan nilai akademik, capaian kompetensi kurikulum kesetaraan, dan pencetakan raport hasil belajar peserta didik PKBM AL-QUDWAH.
                    </p>

                    <div class="flex flex-col sm:flex-row flex-wrap gap-3">
                        <a href="{{ $eraportUrl }}" target="_blank" rel="noopener"
                           class="px-6 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl text-sm transition shadow-lg shadow-emerald-600/30 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i> Buka Aplikasi E-Raport
                        </a>
                        <a href="{{ $examUrl ?? env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/') }}" target="_blank" rel="noopener"
                           class="px-5 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold rounded-xl text-sm transition flex items-center justify-center gap-2 border border-slate-300">
                            <i class="fa-solid fa-laptop-code text-amber-600"></i> Aplikasi Ujian CBT
                        </a>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-slate-900 to-blue-950 p-8 rounded-2xl text-white relative overflow-hidden shadow-inner">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-4">
                        <span class="text-xs text-slate-300 uppercase font-semibold">Status Layanan E-Raport</span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Sistem Aktif
                        </span>
                    </div>
                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between py-1 border-b border-white/5">
                            <span class="text-slate-300">Platform</span>
                            <span class="font-semibold text-white">E-Raport PKBM AL-QUDWAH</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-white/5">
                            <span class="text-slate-300">Program</span>
                            <span class="font-semibold text-white">Paket B & Paket C Kesetaraan</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-white/5">
                            <span class="text-slate-300">Target Server</span>
                            <span class="font-mono text-emerald-400">{{ $eraportUrl }}</span>
                        </div>
                        <div class="flex justify-between py-1">
                            <span class="text-slate-300">Operator IT</span>
                            <span class="font-semibold text-white">M. Gagas S.B, S.T</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 Column Instructions: Tutor & Warga Belajar -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            
            <!-- Panduan Tutor & Wali Kelas -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <h3 class="text-lg font-bold text-blue-950 mb-3">Petunjuk Tutor & Wali Kelas</h3>
                <ul class="space-y-3 text-xs text-slate-600 leading-relaxed">
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-emerald-600 mt-0.5"></i>
                        <span>Masuk menggunakan akun Tutor atau Wali Kelas yang telah terdaftar di sistem E-Raport.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-emerald-600 mt-0.5"></i>
                        <span>Input nilai formatif, sumatif, dan capaian pembelajaran sesuai mata pelajaran yang diampu.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-emerald-600 mt-0.5"></i>
                        <span>Wali kelas memverifikasi kelengkapan nilai seluruh mata pelajaran, kehadiran, dan catatan perkembangan.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-emerald-600 mt-0.5"></i>
                        <span>Cetak leger nilai dan dokumen E-Raport resmi untuk dibagikan setiap akhir semester.</span>
                    </li>
                </ul>
            </div>

            <!-- Panduan Peserta Didik -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
                <h3 class="text-lg font-bold text-blue-950 mb-3">Petunjuk Peserta Didik / Warga Belajar</h3>
                <ul class="space-y-3 text-xs text-slate-600 leading-relaxed">
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-blue-600 mt-0.5"></i>
                        <span>Gunakan akun peserta didik (NISN / Username) untuk melihat hasil penilaian dan raport semester.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-blue-600 mt-0.5"></i>
                        <span>Periksa kesesuaian identitas diri (Nama Lengkap, NISN, Tempat & Tanggal Lahir) pada halaman profil raport.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-blue-600 mt-0.5"></i>
                        <span>Pantau perkembangan nilai setiap mata pelajaran dan evaluasi capaian kompetensi per semester.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-blue-600 mt-0.5"></i>
                        <span>Hubungi Wali Kelas atau Operator Sekolah apabila terdapat nilai mata pelajaran yang belum terinput.</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Kendala Bantuan -->
        <div class="bg-gradient-to-r from-slate-900 to-blue-950 rounded-2xl p-6 sm:p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-lg">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-2xl text-amber-400 shrink-0">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <div>
                    <h4 class="font-bold text-base text-white">Mengalami Kendala Akses Penilaian atau E-Raport?</h4>
                    <p class="text-slate-300 text-xs sm:text-sm">Segera hubungi Operator IT / Akademik PKBM AL-QUDWAH untuk bantuan akun dan sinkronisasi data nilai.</p>
                </div>
            </div>
            <a href="https://wa.me/6285722499957?text={{ urlencode('Halo Operator PKBM AL-QUDWAH, saya membutuhkan bantuan terkait aplikasi Penilaian / E-Raport.') }}"
               target="_blank" rel="noopener"
               class="px-5 py-3 bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold rounded-xl text-xs sm:text-sm transition flex items-center gap-2 shrink-0 shadow">
                <i class="fa-brands fa-whatsapp text-base"></i> Hubungi Helpdesk IT
            </a>
        </div>

    </div>
</section>
@endsection
