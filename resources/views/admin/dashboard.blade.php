@extends('layouts.admin', [
    'title' => 'Dashboard Pengelola',
    'header' => 'Ringkasan Manajemen Sekolah'
])

@section('content')
<div class="space-y-8">
    
    <!-- Welcome Banner with CBT Exam Bridge -->
    <div class="bg-gradient-to-r from-navy-950 via-navy-900 to-primary-900 rounded-3xl p-6 sm:p-8 text-white relative overflow-hidden shadow-xl">
        <div class="absolute -right-16 -top-16 w-64 h-64 bg-gold-400/10 rounded-full blur-3xl"></div>
        <div class="absolute -left-16 -bottom-16 w-64 h-64 bg-primary-500/20 rounded-full blur-3xl"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-bold bg-white/10 text-gold-400 border border-white/10 uppercase tracking-wider mb-3">
                    <span class="w-2 h-2 rounded-full bg-gold-400 animate-pulse"></span> Panel Utama PKBM AL-QUDWAH
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    Selamat Datang, {{ auth()->user()->name }}!
                </h2>
                <p class="text-navy-100 text-xs sm:text-sm mt-2 leading-relaxed">
                    Kelola data kelembagaan, publikasi warta kegiatan, verifikasi pendaftar peserta didik baru Paket B & C, serta koordinasi dengan sistem ujian digital.
                </p>
            </div>

            <!-- CBT Quick Action Card -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/15 shrink-0 flex items-center justify-between sm:justify-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-gold-400/20 text-gold-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>
                <div>
                    <span class="block text-[11px] font-semibold text-navy-200">Aplikasi Ujian Sekolah</span>
                    <span class="block text-sm font-bold text-white">Sistem CBT Penilaian</span>
                </div>
                <a href="{{ $examUrl }}" target="_blank" rel="noopener"
                   class="px-4 py-2 bg-gold-400 hover:bg-gold-500 text-navy-950 text-xs font-bold rounded-xl transition shadow">
                    Buka Aplikasi
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Pendaftar Baru -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pendaftar Masuk</span>
                <div class="text-2xl font-black text-navy-900 mt-1">{{ $stats['total_registrations'] }}</div>
                <div class="text-xs text-amber-600 font-bold mt-1">
                    {{ $stats['new_registrations'] }} belum diverifikasi
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-id-card"></i>
            </div>
        </div>

        <!-- Tenaga Pendidik -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Tenaga Pendidik</span>
                <div class="text-2xl font-black text-navy-900 mt-1">{{ $stats['total_tutors'] }}</div>
                <div class="text-xs text-slate-500 font-medium mt-1">
                    Kepala, Tutor & Operator
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-primary-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>
        </div>

        <!-- Warta & Berita -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Warta & Kegiatan</span>
                <div class="text-2xl font-black text-navy-900 mt-1">{{ $stats['total_posts'] }}</div>
                <div class="text-xs text-emerald-600 font-bold mt-1">
                    Artikel Terpublikasi
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-newspaper"></i>
            </div>
        </div>

        <!-- Pesan Kontak -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex items-center justify-between">
            <div>
                <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pesan Pengunjung</span>
                <div class="text-2xl font-black text-navy-900 mt-1">{{ $stats['total_messages'] }}</div>
                <div class="text-xs text-primary-600 font-bold mt-1">
                    {{ $stats['unread_messages'] }} pesan baru
                </div>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl">
                <i class="fa-regular fa-envelope"></i>
            </div>
        </div>
    </div>

    <!-- Quick Actions Row -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80">
        <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Aksi Cepat Pengelolaan</h3>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
            <a href="{{ route('admin.posts.create') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-primary-50 text-slate-700 hover:text-primary-700 transition flex flex-col items-center text-center border border-slate-200/60 group">
                <i class="fa-solid fa-pen-nib text-primary-600 group-hover:scale-110 transition text-lg mb-1.5"></i>
                <span class="text-xs font-bold">Tulis Warta</span>
            </a>
            <a href="{{ route('admin.galleries.create') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-primary-50 text-slate-700 hover:text-primary-700 transition flex flex-col items-center text-center border border-slate-200/60 group">
                <i class="fa-solid fa-cloud-arrow-up text-emerald-600 group-hover:scale-110 transition text-lg mb-1.5"></i>
                <span class="text-xs font-bold">Unggah Foto</span>
            </a>
            <a href="{{ route('admin.tutors.create') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-primary-50 text-slate-700 hover:text-primary-700 transition flex flex-col items-center text-center border border-slate-200/60 group">
                <i class="fa-solid fa-user-plus text-purple-600 group-hover:scale-110 transition text-lg mb-1.5"></i>
                <span class="text-xs font-bold">Tambah Tutor</span>
            </a>
            <a href="{{ route('admin.registrations.index') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-primary-50 text-slate-700 hover:text-primary-700 transition flex flex-col items-center text-center border border-slate-200/60 group">
                <i class="fa-solid fa-user-graduate text-amber-600 group-hover:scale-110 transition text-lg mb-1.5"></i>
                <span class="text-xs font-bold">Data Pendaftar</span>
            </a>
            <a href="{{ route('admin.profile.edit') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-primary-50 text-slate-700 hover:text-primary-700 transition flex flex-col items-center text-center border border-slate-200/60 group">
                <i class="fa-solid fa-gear text-navy-600 group-hover:scale-110 transition text-lg mb-1.5"></i>
                <span class="text-xs font-bold">Edit Profil</span>
            </a>
            <a href="{{ route('admin.messages.index') }}" class="p-3 rounded-xl bg-slate-50 hover:bg-primary-50 text-slate-700 hover:text-primary-700 transition flex flex-col items-center text-center border border-slate-200/60 group">
                <i class="fa-regular fa-comment-dots text-pink-600 group-hover:scale-110 transition text-lg mb-1.5"></i>
                <span class="text-xs font-bold">Pesan Masuk</span>
            </a>
        </div>
    </div>

    <!-- 2 Column: Registrations & Messages -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Pendaftaran Terbaru (7 cols) -->
        <div class="lg:col-span-7 bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden flex flex-col">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-navy-900 text-sm">Pendaftaran Terbaru (PPDB)</h3>
                    <p class="text-xs text-slate-500">Calon peserta didik yang baru mengajukan pendaftaran</p>
                </div>
                <a href="{{ route('admin.registrations.index') }}" class="text-xs font-bold text-primary-600 hover:text-navy-900 flex items-center gap-1">
                    Lihat Semua <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="divide-y divide-slate-100 flex-1">
                @forelse($recentRegistrations as $reg)
                    <div class="p-4 hover:bg-slate-50 transition flex items-center justify-between gap-4">
                        <div class="min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-mono text-xs font-bold text-navy-900">{{ $reg->nomor_pendaftaran }}</span>
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold 
                                    {{ $reg->status == 'baru' ? 'bg-amber-100 text-amber-800' : '' }}
                                    {{ $reg->status == 'diverifikasi' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $reg->status == 'diterima' ? 'bg-emerald-100 text-emerald-800' : '' }}
                                    {{ $reg->status == 'ditolak' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($reg->status) }}
                                </span>
                            </div>
                            <h4 class="text-xs font-bold text-slate-800 truncate">{{ $reg->nama_lengkap }}</h4>
                            <p class="text-[11px] text-slate-500 truncate">
                                {{ $reg->program->nama_program ?? 'Program' }} &bull; {{ $reg->no_hp }} &bull; {{ $reg->desa ?? 'Cidadap' }}
                            </p>
                        </div>
                        <a href="{{ route('admin.registrations.show', $reg->id) }}" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-primary-50 text-slate-700 hover:text-primary-700 text-xs font-bold transition shrink-0">
                            Detail
                        </a>
                    </div>
                @empty
                    <div class="p-8 text-center text-slate-500 text-xs">
                        Belum ada pendaftaran masuk.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Pesan Masuk Terbaru (5 cols) -->
        <div class="lg:col-span-5 bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden flex flex-col">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-navy-900 text-sm">Pesan Kontak Terbaru</h3>
                    <p class="text-xs text-slate-500">Pertanyaan dan korespondensi dari website</p>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-xs font-bold text-primary-600 hover:text-navy-900 flex items-center gap-1">
                    Semua <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="divide-y divide-slate-100 flex-1">
                @forelse($recentMessages as $msg)
                    <div class="p-4 hover:bg-slate-50 transition">
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <span class="text-xs font-bold {{ !$msg->is_read ? 'text-primary-700' : 'text-slate-800' }} truncate">
                                {{ $msg->name }}
                            </span>
                            @if(!$msg->is_read)
                                <span class="px-1.5 py-0.5 rounded text-[9px] font-bold bg-gold-400 text-navy-950">BARU</span>
                            @endif
                        </div>
                        <p class="text-xs font-semibold text-navy-900 truncate">{{ $msg->subject }}</p>
                        <p class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">{{ $msg->message }}</p>
                        <div class="flex items-center justify-between mt-2 pt-2 border-t border-slate-100/60 text-[10px] text-slate-400">
                            <span>{{ $msg->created_at->diffForHumans() }}</span>
                            <a href="{{ route('admin.messages.show', $msg->id) }}" class="font-bold text-primary-600 hover:underline">
                                Buka Pesan
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-slate-500 text-xs">
                        Belum ada pesan masuk.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
