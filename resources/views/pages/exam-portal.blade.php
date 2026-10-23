@extends('layouts.app', ['title' => 'Portal Aplikasi Ujian CBT - PKBM AL-QUDWAH'])

@section('content')
<!-- Hero Portal -->
<section class="bg-gradient-to-br from-navy-900 via-navy-800 to-primary-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-gold-400 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-primary-400 blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-gold-400 text-xs font-semibold uppercase tracking-wider mb-4 border border-white/15">
            <i class="fa-solid fa-laptop-code"></i> Sistem Penilaian Digital
        </div>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
            Portal Aplikasi Ujian Sekolah (CBT)
        </h1>
        <p class="text-navy-100 max-w-2xl mx-auto text-base sm:text-lg">
            Akses resmi Computer-Based Testing (CBT) untuk Peserta Didik Paket B dan Paket C serta Sistem Pengelolaan Soal & Nilai Dewan Tutor PKBM AL-QUDWAH.
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
                    <span class="text-xs font-bold text-primary-600 uppercase tracking-wider">Aplikasi Penilaian Digital</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-navy-900 mt-2 mb-4">
                        Masuk ke Ruang Ujian CBT
                    </h2>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6">
                        Aplikasi ujian terhubung langsung dengan basis data penilaian akademik PKBM AL-QUDWAH. Peserta didik menggunakan Username / Nomor Peserta dan Password yang diberikan oleh Operator IT/Wali Kelas.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ $examUrl }}" target="_blank" rel="noopener"
                           class="px-6 py-3.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl text-sm transition shadow-lg shadow-primary-600/30 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i> Buka Aplikasi Ujian CBT
                        </a>
                        <a href="{{ route('login') }}"
                           class="px-5 py-3.5 bg-slate-100 hover:bg-slate-200 text-navy-900 font-bold rounded-xl text-sm transition flex items-center justify-center gap-2 border border-slate-300">
                            <i class="fa-solid fa-shield-halved text-primary-600"></i> Login CMS Website
                        </a>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-navy-900 to-primary-900 p-8 rounded-2xl text-white relative overflow-hidden shadow-inner">
                    <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-4">
                        <span class="text-xs text-navy-200 uppercase font-semibold">Status Layanan Ujian</span>
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Sistem Siap
                        </span>
                    </div>
                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between py-1 border-b border-white/5">
                            <span class="text-navy-300">Platform</span>
                            <span class="font-semibold text-white">CBT Exam Engine</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-white/5">
                            <span class="text-navy-300">Peserta Ujian</span>
                            <span class="font-semibold text-white">Paket B & Paket C</span>
                        </div>
                        <div class="flex justify-between py-1 border-b border-white/5">
                            <span class="text-navy-300">Target Server</span>
                            <span class="font-mono text-gold-400">{{ $examUrl }}</span>
                        </div>
                        <div class="flex justify-between py-1">
                            <span class="text-navy-300">Operator IT</span>
                            <span class="font-semibold text-white">M. Gagas S.B, S.T</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2 Column Instructions: Siswa & Pengawas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            
            <!-- Panduan Siswa -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-primary-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
                <h3 class="text-lg font-bold text-navy-900 mb-3">Petunjuk Peserta Didik</h3>
                <ul class="space-y-3 text-xs text-slate-600 leading-relaxed">
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-primary-600 mt-0.5"></i>
                        <span>Pastikan perangkat smartphone, laptop, atau komputer terhubung stabil dengan koneksi internet.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-primary-600 mt-0.5"></i>
                        <span>Gunakan Nomor Induk Siswa / Username dan Password yang telah dibagikan saat orientasi ujian.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-primary-600 mt-0.5"></i>
                        <span>Dilarang membuka tab atau aplikasi lain selama sesi ujian CBT berlangsung.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-primary-600 mt-0.5"></i>
                        <span>Pastikan menekan tombol <strong>Kirim / Selesai</strong> sebelum waktu pengerjaan berakhir.</span>
                    </li>
                </ul>
            </div>

            <!-- Panduan Tutor & Operator -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <h3 class="text-lg font-bold text-navy-900 mb-3">Petunjuk Tutor & Pengawas</h3>
                <ul class="space-y-3 text-xs text-slate-600 leading-relaxed">
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-purple-600 mt-0.5"></i>
                        <span>Tutor menyusun bank soal dan mengunggah kunci jawaban melalui modul guru pada aplikasi ujian.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-purple-600 mt-0.5"></i>
                        <span>Token ujian akan diaktifkan oleh Operator IT sesuai jadwal pelaksanaan yang berlaku.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-purple-600 mt-0.5"></i>
                        <span>Pengawas memantau aktivitas pengerjaan siswa secara realtime melalui dashboard pengawas.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check-circle text-purple-600 mt-0.5"></i>
                        <span>Rekapitulasi nilai akhir dapat diekspor langsung dalam format cetak nilai resmi.</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Kendala Bantuan -->
        <div class="bg-gradient-to-r from-navy-900 to-primary-900 rounded-2xl p-6 sm:p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-lg">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-2xl text-gold-400 shrink-0">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <div>
                    <h4 class="font-bold text-base text-white">Mengalami Kendala Akun atau Koneksi Ujian?</h4>
                    <p class="text-navy-100 text-xs sm:text-sm">Segera laporkan kepada Tim IT / Operator Sekolah untuk reset sesi atau reset password ujian.</p>
                </div>
            </div>
            <a href="https://wa.me/6285864183271?text={{ urlencode('Halo Operator PKBM AL-QUDWAH, saya mengalami kendala pada aplikasi ujian CBT.') }}"
               target="_blank" rel="noopener"
               class="px-5 py-3 bg-gold-500 hover:bg-gold-600 text-navy-950 font-bold rounded-xl text-xs sm:text-sm transition flex items-center gap-2 shrink-0 shadow">
                <i class="fa-brands fa-whatsapp text-base"></i> Hubungi Helpdesk IT
            </a>
        </div>

    </div>
</section>
@endsection
