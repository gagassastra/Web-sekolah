@extends('layouts.app')

@section('title', 'PKBM AL-QUDWAH - Lembaga Pendidikan Kesetaraan Paket B & C Resmi di Cianjur')

@section('content')
    <!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-slate-950 via-blue-950 to-slate-900 text-white overflow-hidden py-16 lg:py-24">
        <!-- Geometric and ambient glows -->
        <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                <!-- LEFT CONTENT -->
                <div class="lg:col-span-7 space-y-6">
                    <!-- BADGE -->
                    <div class="inline-flex items-center space-x-2 bg-blue-900/60 border border-blue-700/50 px-3.5 py-1.5 rounded-full text-xs font-semibold text-blue-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Resmi Terdaftar Kemdikbudristek • NPSN {{ $profile->npsn ?? 'P9998654' }}</span>
                    </div>

                    <!-- HEADLINE -->
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.18]">
                        Wujudkan Masa Depan Cerah Bersama <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 via-sky-200 to-amber-300">PKBM AL-QUDWAH</span>
                    </h1>

                    <!-- SUBTITLE -->
                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl font-normal">
                        Lembaga pendidikan nonformal yang memberikan kesempatan kepada masyarakat untuk melanjutkan pendidikan melalui program kesetaraan <strong>Paket B (setara SMP)</strong> dan <strong>Paket C (setara SMA)</strong> dengan kurikulum terpadu dan fleksibel.
                    </p>

                    <!-- BULLET ADVANTAGES -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2 text-xs text-slate-300">
                        <div class="flex items-center space-x-2">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Ijazah Sah Diakui Kuliah & Kerja</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Jadwal Belajar Fleksibel & Ramah Pekerja</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Bimbingan Tatap Muka & Modul Terarah</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Persiapan Ujian Berbasis Komputer (CBT)</span>
                        </div>
                    </div>

                    <!-- BUTTONS -->
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="{{ route('pendaftaran.index') }}" class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl font-bold text-sm bg-blue-600 hover:bg-blue-500 text-white shadow-lg shadow-blue-600/30 transition transform hover:-translate-y-0.5">
                            <span>Informasi Pendaftaran</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('profile') }}" class="inline-flex items-center justify-center px-6 py-3.5 rounded-xl font-semibold text-sm bg-slate-800/80 hover:bg-slate-700 text-slate-200 border border-slate-700 transition">
                            Mengenal PKBM
                        </a>
                        <a href="{{ env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/') }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center px-5 py-3.5 rounded-xl font-semibold text-sm bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-400/40 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Aplikasi Ujian CBT
                        </a>
                    </div>
                </div>

                <!-- RIGHT IMAGE COLLAGE -->
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        <!-- Main Hero Photo Frame -->
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-slate-700/60 aspect-[4/3] bg-slate-800 group">
                            <img src="{{ asset('images/hero/hero-warga-belajar-tutor.jpg') }}" alt="Warga Belajar dan Dewan Tutor PKBM AL-QUDWAH" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <span class="bg-amber-500/90 text-slate-950 font-bold text-[11px] px-2.5 py-1 rounded shadow">Dokumentasi Resmi</span>
                                <p class="text-xs text-white font-medium mt-1">Kebersamaan Civitas Akademika PKBM AL-QUDWAH Campaka Cianjur</p>
                            </div>
                        </div>

                        <!-- Floating Stat Card 1 -->
                        <div class="absolute -bottom-[4.5rem] right-6 bg-white text-slate-900 p-4 rounded-xl shadow-xl border border-slate-100 hidden sm:flex items-center space-x-3.5 z-20">
                            <div class="w-12 h-12 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center flex-shrink-0 font-extrabold text-lg">
                                B & C
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Program Kesetaraan</p>
                                <p class="text-sm font-extrabold text-blue-950">Setara SMP & SMA</p>
                            </div>
                        </div>

                        <!-- Floating Stat Card 2 -->
                        <div class="absolute -top-4 -right-4 bg-slate-900/90 backdrop-blur-md text-white p-3.5 rounded-xl shadow-xl border border-slate-700 hidden sm:flex items-center space-x-3 z-20">
                            <div class="w-9 h-9 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-slate-400 uppercase font-semibold">Legalitas Operasional</p>
                                <p class="text-xs font-bold text-amber-300">Izin Dinas Pendidikan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION IDENTITAS RESMI & SAMBUTAN -->
    <section class="py-16 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <!-- KEPALA PKBM SAMBUTAN -->
                <div class="lg:col-span-7 space-y-5">
                    <div class="inline-flex items-center space-x-2 text-blue-700 bg-blue-50 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                        <span>Sambutan Pimpinan Lembaga</span>
                    </div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-blue-950 tracking-tight leading-tight">
                        Membuka Pintu Kesempatan Pendidikan Seluas-luasnya Bagi Seluruh Masyarakat
                    </h2>
                    <blockquote class="text-slate-600 text-sm sm:text-base leading-relaxed border-l-4 border-amber-500 pl-4 italic">
                        "{{ $profile->sambutan_kepala ?? 'Assalamu’alaikum Warahmatullahi Wabarakatuh. PKBM AL-QUDWAH hadir untuk memberikan layanan pendidikan nonformal berkualitas bagi masyarakat melalui program Paket B dan Paket C tanpa memandang batasan usia atau waktu.' }}"
                    </blockquote>
                    <div class="flex items-center space-x-4 pt-2">
                        <div class="w-12 h-12 rounded-full overflow-hidden bg-slate-200 border-2 border-blue-600 flex-shrink-0">
                            <img src="{{ asset('images/tutor/dewan-tutor-1.jpg') }}" alt="Kepala PKBM AL-QUDWAH" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-bold text-blue-950 text-sm">{{ $profile->kepala_sekolah ?? 'Elis Masridah' }}</h4>
                            <p class="text-xs text-slate-500 font-medium">Kepala PKBM AL-QUDWAH</p>
                        </div>
                    </div>
                </div>

                <!-- CARD IDENTITAS RESMI -->
                <div class="lg:col-span-5">
                    <div class="bg-gradient-to-br from-slate-50 to-blue-50/60 p-6 sm:p-7 rounded-2xl border border-blue-100 shadow-sm space-y-4">
                        <div class="flex items-center justify-between pb-3 border-b border-blue-200/60">
                            <h3 class="font-extrabold text-blue-950 text-base">Identitas Resmi Lembaga</h3>
                            <span class="text-xs font-bold text-blue-700 bg-blue-100 px-2.5 py-0.5 rounded">Swasta</span>
                        </div>
                        <dl class="space-y-3 text-xs sm:text-sm">
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500 font-medium">Nama Lembaga</dt>
                                <dd class="text-blue-950 font-bold">{{ $profile->nama_sekolah ?? 'PKBM AL QUDWAH' }}</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500 font-medium">NPSN</dt>
                                <dd class="text-blue-950 font-bold font-mono">{{ $profile->npsn ?? 'P9998654' }}</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500 font-medium">Bentuk Pendidikan</dt>
                                <dd class="text-slate-700 font-medium">PKBM (Pendidikan Kesetaraan)</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500 font-medium">SK Pendirian</dt>
                                <dd class="text-slate-800 font-mono text-xs">{{ $profile->sk_pendirian ?? '021/SK/YAHC/XI/2022' }}</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500 font-medium">SK Izin Operasional</dt>
                                <dd class="text-slate-800 font-mono text-xs">{{ $profile->sk_izin_operasional ?? '421.9/ 1627 /PAUDNI/KAB/2022' }}</dd>
                            </div>
                            <div class="flex justify-between py-1">
                                <dt class="text-slate-500 font-medium">Lokasi</dt>
                                <dd class="text-slate-700 text-right font-medium">Campaka, Cianjur, Jawa Barat</dd>
                            </div>
                        </dl>
                        <div class="pt-2">
                            <a href="{{ route('profile') }}" class="block text-center py-2.5 rounded-lg text-xs font-bold text-blue-700 bg-white border border-blue-200 hover:bg-blue-50 transition shadow-xs">
                                Lihat Profil & Visi Misi Lengkap &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION PROGRAM PENDIDIKAN KESETARAAN (PAKET B & PAKET C) -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <span class="inline-flex items-center space-x-1.5 text-blue-700 bg-blue-100/80 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                    Program Pendidikan
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-blue-950 tracking-tight">
                    Pilihan Program Kesetaraan PKBM AL-QUDWAH
                </h2>
                <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                    Dua program pendidikan kesetaraan berstandar nasional dengan kurikulum merdeka yang dirancang untuk mendukung kebutuhan belajar Anda.
                </p>
            </div>

            <!-- PROGRAM CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($programs as $prog)
                    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col group">
                        <!-- Card Header Image -->
                        <div class="relative h-56 overflow-hidden bg-slate-900">
                            <img src="{{ asset($prog->foto ?? 'images/kegiatan/pembelajaran-tatap-muka-1.jpg') }}" alt="{{ $prog->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent"></div>
                            <div class="absolute top-4 left-4">
                                <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                    {{ $prog->jenjang }}
                                </span>
                            </div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <h3 class="text-xl sm:text-2xl font-bold text-white tracking-tight">
                                    {{ $prog->nama }}
                                </h3>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between space-y-6">
                            <div class="space-y-4">
                                <p class="text-sm text-slate-600 leading-relaxed">
                                    {{ $prog->deskripsi }}
                                </p>

                                @if(!empty($prog->keunggulan) && is_array($prog->keunggulan))
                                    <div class="space-y-2 pt-2 border-t border-slate-100">
                                        <p class="text-xs font-bold text-slate-800 uppercase tracking-wider">Keunggulan Program:</p>
                                        <ul class="space-y-1.5 text-xs text-slate-600">
                                            @foreach(array_slice($prog->keunggulan, 0, 3) as $adv)
                                                <li class="flex items-start space-x-2">
                                                    <svg class="w-4 h-4 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                    <span>{{ $adv }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-xs font-semibold text-slate-500">
                                    Durasi: {{ $prog->durasi ?? '3 Tahun / Fleksibel' }}
                                </span>
                                <a href="{{ route('programs.show', $prog->kode) }}" class="inline-flex items-center text-sm font-bold text-blue-600 group-hover:text-blue-700 transition">
                                    <span>Lihat Informasi</span>
                                    <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ALUR BELAJAR & PENDAFTARAN -->
            <div class="mt-16 bg-white p-8 sm:p-10 rounded-2xl border border-slate-200/90 shadow-sm">
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <h3 class="text-xl sm:text-2xl font-extrabold text-blue-950">Alur Pendidikan Kesetaraan di PKBM AL-QUDWAH</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Langkah mudah dan terarah dari awal pendaftaran hingga memperoleh ijazah resmi negara.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-100 text-center space-y-2.5">
                        <div class="w-10 h-10 mx-auto rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-sm shadow">1</div>
                        <h4 class="font-bold text-sm text-blue-950">Pendaftaran Online / Langsung</h4>
                        <p class="text-xs text-slate-500">Mengisi formulir pendaftaran dan konsultasi pemilihan Paket B atau Paket C.</p>
                    </div>

                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-100 text-center space-y-2.5">
                        <div class="w-10 h-10 mx-auto rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-sm shadow">2</div>
                        <h4 class="font-bold text-sm text-blue-950">Verifikasi Berkas Dapodik</h4>
                        <p class="text-xs text-slate-500">Pemeriksaan kelengkapan fotokopi ijazah sebelumnya, KK, dan pencatatan NISN resmi.</p>
                    </div>

                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-100 text-center space-y-2.5">
                        <div class="w-10 h-10 mx-auto rounded-full bg-blue-600 text-white font-bold flex items-center justify-center text-sm shadow">3</div>
                        <h4 class="font-bold text-sm text-blue-950">Pembelajaran Fleksibel</h4>
                        <p class="text-xs text-slate-500">Mengikuti bimbingan tatap muka, pendalaman modul terarah, dan latihan literasi digital.</p>
                    </div>

                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-100 text-center space-y-2.5">
                        <div class="w-10 h-10 mx-auto rounded-full bg-amber-500 text-white font-bold flex items-center justify-center text-sm shadow">4</div>
                        <h4 class="font-bold text-sm text-blue-950">Asesmen & Penerimaan Ijazah</h4>
                        <p class="text-xs text-slate-500">Evaluasi pembelajaran dan penerbitan ijazah sah bernomor seri nasional untuk kuliah/kerja.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION KEUNGGULAN & STATISTIK RESMI -->
    <section class="py-16 bg-blue-950 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-blue-800/60">
                <div class="pt-4 md:pt-0">
                    <p class="text-3xl sm:text-4xl font-extrabold text-amber-400 font-mono">{{ $profile->npsn ?? 'P9998654' }}</p>
                    <p class="text-xs sm:text-sm text-blue-200 font-medium mt-1">NPSN Kemdikbudristek</p>
                </div>
                <div class="pt-4 md:pt-0">
                    <p class="text-3xl sm:text-4xl font-extrabold text-white font-mono">{{ $tutorsCount ?? 21 }}</p>
                    <p class="text-xs sm:text-sm text-blue-200 font-medium mt-1">Dewan Tutor & Pengelola</p>
                </div>
                <div class="pt-4 md:pt-0">
                    <p class="text-3xl sm:text-4xl font-extrabold text-white font-mono">2</p>
                    <p class="text-xs sm:text-sm text-blue-200 font-medium mt-1">Program Kesetaraan (Paket B & C)</p>
                </div>
                <div class="pt-4 md:pt-0">
                    <p class="text-3xl sm:text-4xl font-extrabold text-amber-400 font-mono">100%</p>
                    <p class="text-xs sm:text-sm text-blue-200 font-medium mt-1">Ijazah Sah Diakui Negara</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION TENAGA PENDIDIK CUPLIKAN -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div class="space-y-3">
                    <span class="inline-flex items-center space-x-1.5 text-blue-700 bg-blue-50 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                        Tenaga Pendidik
                    </span>
                    <h2 class="text-3xl font-extrabold text-blue-950 tracking-tight">
                        Pimpinan & Dewan Tutor Berdedikasi
                    </h2>
                    <p class="text-sm text-slate-500 max-w-xl">
                        Didukung oleh tenaga pendidik yang berjiwa pengabdian tinggi untuk mendampingi setiap langkah belajar peserta didik.
                    </p>
                </div>
                <a href="{{ route('tutors.index') }}" class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-700 transition">
                    <span>Lihat Seluruh Dewan Tutor ({{ $tutorsCount }})</span>
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($leadTutors as $tutor)
                    <div class="bg-slate-50 rounded-xl p-5 border border-slate-200/80 hover:shadow-md transition text-center flex flex-col items-center">
                        <div class="w-24 h-24 rounded-full overflow-hidden bg-slate-200 border-2 border-blue-600 mb-4 shadow-sm flex items-center justify-center">
                            @if($tutor->foto)
                                <img src="{{ asset($tutor->foto) }}" alt="{{ $tutor->nama }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-blue-900 text-white font-bold text-xl flex items-center justify-center">
                                    {{ substr($tutor->nama, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <h4 class="font-bold text-sm text-blue-950">{{ $tutor->nama }}</h4>
                        <p class="text-xs font-semibold text-amber-600 mt-0.5">{{ $tutor->jabatan }}</p>
                        <p class="text-[11px] text-slate-500 mt-2 line-clamp-2 leading-relaxed">{{ $tutor->bio }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION BERITA DAN KEGIATAN TERBARU -->
    <section class="py-20 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div class="space-y-3">
                    <span class="inline-flex items-center space-x-1.5 text-blue-700 bg-blue-100/80 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                        Kabar & Dokumentasi
                    </span>
                    <h2 class="text-3xl font-extrabold text-blue-950 tracking-tight">
                        Berita dan Kegiatan Terbaru
                    </h2>
                    <p class="text-sm text-slate-500 max-w-xl">
                        Ikuti perkembangan, agenda kegiatan belajar, serta pengumuman resmi PKBM AL-QUDWAH.
                    </p>
                </div>
                <a href="{{ route('posts.index') }}" class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-700 transition">
                    <span>Lihat Semua Berita</span>
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($latestPosts as $post)
                    <article class="bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col group">
                        <div class="relative aspect-[16/10] overflow-hidden bg-slate-100">
                            <img src="{{ asset($post->featured_image ?? 'images/kegiatan/pembelajaran-tatap-muka-1.jpg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-3 left-3">
                                <span class="bg-blue-600 text-white text-[11px] font-bold px-2.5 py-0.5 rounded-full shadow">
                                    {{ $post->category }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                            <div class="space-y-2">
                                <div class="flex items-center space-x-2 text-xs text-slate-400">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>{{ $post->published_at ? $post->published_at->format('d M Y') : $post->created_at->format('d M Y') }}</span>
                                </div>
                                <h3 class="font-bold text-base text-blue-950 group-hover:text-blue-600 transition leading-snug line-clamp-2">
                                    <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                                    {{ $post->summary }}
                                </p>
                            </div>
                            <div class="pt-2 border-t border-slate-100">
                                <a href="{{ route('posts.show', $post->slug) }}" class="inline-flex items-center text-xs font-bold text-blue-600 hover:text-blue-700">
                                    <span>Baca Selengkapnya</span>
                                    <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-500">
                        Belum ada berita yang dipublikasikan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SECTION GALERI DOKUMENTASI CUPLIKAN -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div class="space-y-3">
                    <span class="inline-flex items-center space-x-1.5 text-blue-700 bg-blue-50 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                        Dokumentasi Visual
                    </span>
                    <h2 class="text-3xl font-extrabold text-blue-950 tracking-tight">
                        Galeri Kegiatan & Lingkungan Sekolah
                    </h2>
                    <p class="text-sm text-slate-500 max-w-xl">
                        Foto-foto asli dokumentasi aktivitas pembelajaran tatap muka, kepramukaan, dan kebersamaan di PKBM AL-QUDWAH.
                    </p>
                </div>
                <a href="{{ route('gallery.index') }}" class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-700 transition">
                    <span>Lihat Seluruh Galeri</span>
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($galleries as $gal)
                    <div class="relative group rounded-xl overflow-hidden aspect-square bg-slate-100 border border-slate-200">
                        <img src="{{ asset($gal->image_path) }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-blue-950/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                            <p class="text-[11px] font-semibold text-white leading-tight line-clamp-2">{{ $gal->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION CTA PENDAFTARAN -->
    <section class="py-16 bg-gradient-to-r from-blue-900 via-blue-800 to-indigo-900 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-6">
            <span class="bg-amber-400 text-slate-950 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-wider">
                Penerimaan Warga Belajar Baru
            </span>
            <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight max-w-2xl mx-auto leading-tight">
                Siap Melanjutkan Pendidikan? Daftarkan Diri Anda di PKBM AL-QUDWAH Sekarang!
            </h2>
            <p class="text-sm sm:text-base text-blue-100 max-w-2xl mx-auto leading-relaxed">
                Raih ijazah resmi Paket B dan Paket C tanpa terbebani waktu kerja. Bimbingan ramah, terarah, dan diakui negara.
            </p>
            <div class="flex flex-wrap justify-center gap-4 pt-2">
                <a href="{{ route('pendaftaran.index') }}" class="inline-flex items-center justify-center px-7 py-3.5 rounded-xl font-bold text-sm bg-white text-blue-950 hover:bg-blue-50 shadow-lg transition">
                    Formulir Pendaftaran Online
                </a>
                <a href="https://wa.me/6285864183271?text=Halo%20Admin%20PKBM%20AL-QUDWAH,%20saya%20ingin%20konsultasi%20pendaftaran" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-7 py-3.5 rounded-xl font-bold text-sm bg-emerald-600 hover:bg-emerald-500 text-white shadow-lg transition">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654z"/></svg>
                    Konsultasi via WhatsApp
                </a>
            </div>
        </div>
    </section>
@endsection
