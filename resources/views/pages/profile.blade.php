@extends('layouts.app')

@section('title', 'Profil Lembaga - PKBM AL-QUDWAH Campaka Cianjur')
@section('meta_description', 'Profil lengkap, sejarah, visi, misi, tujuan, dan identitas resmi PKBM AL-QUDWAH Campaka Cianjur. NPSN: P9998654.')

@section('content')
    <!-- PAGE HEADER -->
    <div class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-14 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-3">
                <span class="inline-flex items-center space-x-2 text-xs font-bold text-amber-400 uppercase tracking-widest bg-amber-400/10 px-3 py-1 rounded-full border border-amber-400/20">
                    Tentang Lembaga
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white">
                    Profil PKBM AL-QUDWAH
                </h1>
                <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                    Mengenal lebih dekat Pusat Kegiatan Belajar Masyarakat AL-QUDWAH, wadah pendidikan kesetaraan Paket B dan Paket C yang berdedikasi membangun masa depan generasi bangsa.
                </p>
            </div>
        </div>
    </div>

    <!-- MAIN PROFIL SECTION -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

            <!-- SAMBUTAN KEPALA PKBM -->
            <div class="bg-slate-50 rounded-2xl p-6 sm:p-10 border border-slate-200/90 shadow-xs">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-4 flex flex-col items-center text-center space-y-3">
                        <div class="w-40 h-40 sm:w-48 sm:h-48 rounded-2xl overflow-hidden border-4 border-white shadow-md bg-slate-200">
                            <img src="{{ !empty($profile->foto_kepala) ? $profile->foto_kepala : asset('images/tutor/dewan-tutor-1.jpg') }}" alt="Kepala PKBM AL-QUDWAH" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-extrabold text-blue-950 text-base">{{ $profile->kepala_sekolah ?? 'Elis Masridah' }}</h3>
                            <p class="text-xs font-semibold text-amber-700">Kepala PKBM AL-QUDWAH</p>
                        </div>
                    </div>
                    <div class="lg:col-span-8 space-y-4">
                        <div class="inline-block text-xs font-bold text-blue-700 bg-blue-100 px-3 py-1 rounded-full uppercase">
                            Sambutan Kepala Lembaga
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-blue-950 tracking-tight">
                            Pendidikan untuk Semua, Menjawab Harapan Masa Depan
                        </h2>
                        <div class="text-sm sm:text-base text-slate-600 leading-relaxed space-y-3">
                            <p>
                                {{ $profile->sambutan_kepala ?? 'Assalamu’alaikum Warahmatullahi Wabarakatuh. Selamat datang di Website Resmi PKBM AL-QUDWAH. Lembaga kami hadir dengan tekad tulus untuk memberikan layanan pendidikan nonformal berkualitas bagi seluruh masyarakat. Melalui program pendidikan kesetaraan Paket B (setara SMP) dan Paket C (setara SMA), kami membuka kesempatan seluas-luasnya bagi siapapun yang ingin menuntaskan pendidikannya tanpa memandang batasan usia atau waktu. Kami berkomitmen mendampingi setiap warga belajar hingga sukses menggapai ijazah resmi negara dan meraih masa depan yang lebih cerah.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEJARAH SINGKAT -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <div class="lg:col-span-7 space-y-4">
                    <span class="text-xs font-bold text-blue-700 bg-blue-50 px-3 py-1 rounded-full uppercase tracking-wider">
                        Sejarah & Latar Belakang
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-blue-950 tracking-tight">
                        Sejarah Berdirinya PKBM AL-QUDWAH
                    </h2>
                    <div class="prose prose-slate text-sm sm:text-base text-slate-600 leading-relaxed space-y-3">
                        <p>
                            {{ $profile->sejarah ?? 'PKBM AL QUDWAH didirikan di Kp. Ciwalen RT 003 RW 004, Desa Cidadap, Kecamatan Campaka, Kabupaten Cianjur berdasarkan SK Pendirian Sekolah Nomor 021/SK/YAHC/XI/2022 pada tanggal 18 November 2022, serta telah memperoleh Izin Operasional resmi dari Dinas Pendidikan dengan Nomor 421.9/ 1627 /PAUDNI/KAB/2022 tertanggal 02 Oktober 2024.' }}
                        </p>
                        <p>
                            Lembaga ini didirikan atas prakarsa dan kepedulian para tokoh pendidikan serta masyarakat sekitar yang melihat pentingnya wadah pendidikan alternatif bagi warga yang mengalami putus sekolah formal, pekerja yang membutuhkan ijazah formal, maupun masyarakat yang ingin menambah wawasan dan keterampilan hidup.
                        </p>
                        <p>
                            Dengan semangat kebersamaan dan integritas tinggi, PKBM AL-QUDWAH terus berkembang menjadi pusat kegiatan belajar masyarakat yang unggul, terpercaya, dan melahirkan lulusan-lulusan yang mampu bersaing di perguruan tinggi maupun dunia profesional.
                        </p>
                    </div>
                </div>

                <!-- IDENTITAS LEMBAGA CARD -->
                <div class="lg:col-span-5">
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 sm:p-7 shadow-xs space-y-4">
                        <div class="flex items-center space-x-3 pb-3 border-b border-slate-200">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo PKBM" class="w-10 h-10 object-contain">
                            <div>
                                <h3 class="font-bold text-sm text-blue-950">Data Pokok Pendidikan (Dapodik)</h3>
                                <p class="text-xs text-slate-500">Kementerian Pendidikan Dasar dan Menengah</p>
                            </div>
                        </div>

                        <dl class="space-y-2.5 text-xs">
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">Nama Sekolah</dt>
                                <dd class="font-bold text-blue-950">{{ $profile->nama_sekolah ?? 'PKBM AL QUDWAH' }}</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">NPSN</dt>
                                <dd class="font-bold font-mono text-blue-700">{{ $profile->npsn ?? 'P9998654' }}</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">Akreditasi</dt>
                                <dd class="font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Terakreditasi C</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">Bentuk Pendidikan</dt>
                                <dd class="font-medium text-slate-800">PKBM (Kesetaraan)</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">Status Lembaga</dt>
                                <dd class="font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Swasta Resmi</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">SK Pendirian</dt>
                                <dd class="font-mono text-slate-800 text-[11px]">{{ $profile->sk_pendirian ?? '021/SK/YAHC/XI/2022' }}</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">Tanggal SK Pendirian</dt>
                                <dd class="text-slate-800 font-medium">18 November 2022</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">SK Izin Operasional</dt>
                                <dd class="font-mono text-slate-800 text-[11px]">{{ $profile->sk_izin_operasional ?? '421.9/ 1627 /PAUDNI/KAB/2022' }}</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">Tanggal Izin Operasional</dt>
                                <dd class="text-slate-800 font-medium">02 Oktober 2024</dd>
                            </div>
                            <div class="flex justify-between py-1 border-b border-slate-200/60">
                                <dt class="text-slate-500">Alamat</dt>
                                <dd class="text-right text-slate-800 font-medium">{{ $profile->alamat ?? 'Kp. Ciwalen Rt. 003 Rw. 004' }}</dd>
                            </div>
                            <div class="flex justify-between py-1">
                                <dt class="text-slate-500">Wilayah</dt>
                                <dd class="text-right text-slate-800 font-medium">Desa Cidadap, Kec. Campaka, Cianjur</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- VISI, MISI, & TUJUAN -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- VISI -->
                <div class="bg-gradient-to-br from-blue-900 to-slate-900 text-white p-8 rounded-2xl shadow-sm flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-amber-400 text-blue-950 flex items-center justify-center font-extrabold text-lg shadow">
                            V
                        </div>
                        <h3 class="text-xl font-bold tracking-tight text-white">Visi Lembaga</h3>
                        <p class="text-sm text-blue-100 leading-relaxed italic">
                            "{{ $profile->visi ?? 'Terwujudnya lembaga pendidikan nonformal yang unggul, berakhlak mulia, mandiri, dan berdaya saing dalam mencerdaskan kehidupan masyarakat melalui layanan pendidikan kesetaraan berkualitas.' }}"
                        </p>
                    </div>
                    <div class="pt-6 border-t border-blue-800/80 text-xs text-amber-300 font-semibold">
                        PKBM AL-QUDWAH Berdaya & Berkarakter
                    </div>
                </div>

                <!-- MISI -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/80 shadow-xs space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-600 text-white flex items-center justify-center font-extrabold text-lg shadow">
                        M
                    </div>
                    <h3 class="text-xl font-bold tracking-tight text-blue-950">Misi Lembaga</h3>
                    <ul class="space-y-2.5 text-xs text-slate-600 leading-relaxed">
                        @if(!empty($profile->misi) && is_array($profile->misi))
                            @foreach($profile->misi as $item)
                                <li class="flex items-start space-x-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-600 flex-shrink-0 mt-1.5"></span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        @else
                            <li>Menyelenggarakan pembelajaran kesetaraan Paket B dan Paket C yang berkualitas dan aplikatif.</li>
                            <li>Menanamkan nilai budi pekerti luhur dan keimanan.</li>
                            <li>Membekali keterampilan vokasional dan literasi digital.</li>
                        @endif
                    </ul>
                </div>

                <!-- TUJUAN -->
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200/80 shadow-xs space-y-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-500 text-white flex items-center justify-center font-extrabold text-lg shadow">
                        T
                    </div>
                    <h3 class="text-xl font-bold tracking-tight text-blue-950">Tujuan Pendidikan</h3>
                    <ul class="space-y-2.5 text-xs text-slate-600 leading-relaxed">
                        @if(!empty($profile->tujuan) && is_array($profile->tujuan))
                            @foreach($profile->tujuan as $item)
                                <li class="flex items-start space-x-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 flex-shrink-0 mt-1.5"></span>
                                    <span>{{ $item }}</span>
                                </li>
                            @endforeach
                        @else
                            <li>Menuntaskan wajib belajar 9 dan 12 tahun bagi masyarakat.</li>
                            <li>Menghasilkan lulusan berijazah sah dengan kompetensi mumpuni.</li>
                            <li>Membuka gerbang pendidikan tinggi dan jenjang karier lebih baik.</li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- BUKTI DOKUMEN RESMI DAPODIK -->
            <div class="bg-blue-50/60 p-8 rounded-2xl border border-blue-200/80">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-8 space-y-3">
                        <span class="text-xs font-bold text-blue-800 uppercase tracking-wider">Verifikasi Keaslian Lembaga</span>
                        <h3 class="text-xl sm:text-2xl font-bold text-blue-950">Bukti Verifikasi Identitas Sekolah Dapodik</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            PKBM AL QUDWAH memegang izin resmi operasional dari Dinas Pendidikan Kabupaten Cianjur dan tercatat aktif dalam sistem Data Pokok Pendidikan Nasional (Dapodik). Hal ini menjamin setiap lulusan memperoleh ijazah resmi negara ber-NPSN yang diakui secara hukum.
                        </p>
                    </div>
                    <div class="lg:col-span-4">
                        <div class="rounded-xl overflow-hidden border border-slate-300 shadow-sm bg-white p-2">
                            <img src="{{ asset('images/dokumen/biodata-sekolah.png') }}" alt="Sertifikat Biodata Sekolah Resmi" class="w-full h-auto object-contain">
                            <p class="text-[10px] text-center text-slate-400 mt-1">Screenshot resmi Dapodik PKBM AL QUDWAH</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
