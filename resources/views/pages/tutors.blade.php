@extends('layouts.app')

@section('title', 'Tenaga Pendidik & Pengelola - PKBM AL-QUDWAH')
@section('meta_description', 'Dewan Tutor, Kepala Sekolah, dan Pengelola Pusat Kegiatan Belajar Masyarakat PKBM AL-QUDWAH Campaka Cianjur.')

@section('content')
    <!-- PAGE HEADER -->
    <div class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-14 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-3">
                <span class="inline-flex items-center space-x-2 text-xs font-bold text-amber-400 uppercase tracking-widest bg-amber-400/10 px-3 py-1 rounded-full border border-amber-400/20">
                    Civitas Akademika
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white">
                    Tenaga Pendidik & Pengelola
                </h1>
                <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                    Mengenal jajaran pimpinan lembaga, operator, dan dewan tutor yang berdedikasi mendampingi proses pembelajaran warga belajar di PKBM AL-QUDWAH.
                </p>
            </div>
        </div>
    </div>

    <!-- TUTORS SECTION -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

            <!-- FOTO BERSAMA DEWAN TUTOR -->
            <div class="rounded-2xl overflow-hidden border border-slate-200 aspect-[21/9] bg-slate-900 relative shadow-sm">
                <img src="{{ asset('images/tutor/dewan-tutor-1.jpg') }}" alt="Dewan Tutor PKBM AL-QUDWAH" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent flex items-end p-6">
                    <p class="text-white text-xs sm:text-sm font-semibold">Dewan Tutor dan Pengelola PKBM AL-QUDWAH Bersama Mewujudkan Pendidikan Berkualitas di Campaka Cianjur</p>
                </div>
            </div>

            <!-- PIMPINAN & PENGELOLA -->
            <div class="space-y-6">
                <div class="border-b border-slate-200 pb-3">
                    <h2 class="text-2xl font-bold text-blue-950 tracking-tight">Pimpinan & Pengelola Lembaga</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Penanggung jawab operasional, kebijakan, dan administrasi keuangan lembaga</p>
                </div>
                <div class="flex flex-wrap justify-center gap-6">
                    @foreach($leaders as $item)
                        <div class="w-full sm:w-[calc(50%-0.75rem)] lg:w-[calc(33.333%-1rem)] bg-slate-50 rounded-2xl p-6 border border-slate-200 hover:shadow-md transition text-center flex flex-col items-center">
                            <div class="w-24 h-24 rounded-full overflow-hidden bg-slate-200 border-2 border-blue-600 mb-4 shadow-sm flex items-center justify-center">
                                @if($item->foto)
                                    <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-blue-900 text-white font-bold text-2xl flex items-center justify-center">
                                        {{ substr($item->nama, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            <h3 class="font-bold text-base text-blue-950">{{ $item->nama }}</h3>
                            <p class="text-xs font-semibold text-amber-700 mt-0.5">{{ $item->jabatan }}</p>
                            @if($item->nuptk)
                                <p class="text-[11px] font-mono text-slate-400 mt-1">SK/NUPTK: {{ $item->nuptk }}</p>
                            @endif
                            <p class="text-xs text-slate-600 mt-2 line-clamp-3 leading-relaxed">{{ $item->bio }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- STAF IT & OPERATOR DAPODIK -->
            @if($staff->isNotEmpty())
                <div class="space-y-6">
                    <div class="border-b border-slate-200 pb-3">
                        <h2 class="text-2xl font-bold text-blue-950 tracking-tight">Staf Administrasi & Operator IT</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Pengelola data pokok pendidikan (Dapodik), sarana teknologi, dan sistem penilaian</p>
                    </div>
                    <div class="flex flex-wrap justify-center gap-6">
                        @foreach($staff as $item)
                            <div class="w-full sm:w-[calc(50%-0.75rem)] lg:w-[calc(33.333%-1rem)] bg-slate-50 rounded-2xl p-6 border border-slate-200 hover:shadow-md transition text-center flex flex-col items-center">
                                <div class="w-24 h-24 rounded-full overflow-hidden bg-slate-200 border-2 border-blue-600 mb-4 shadow-sm flex items-center justify-center">
                                    @if($item->foto)
                                        <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-blue-900 text-white font-bold text-2xl flex items-center justify-center">
                                            {{ substr($item->nama, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <h3 class="font-bold text-base text-blue-950">{{ $item->nama }}</h3>
                                <p class="text-xs font-semibold text-blue-700 mt-0.5">{{ $item->jabatan }}</p>
                                @if($item->nuptk)
                                    <p class="text-[11px] font-mono text-slate-400 mt-1">No SK: {{ $item->nuptk }}</p>
                                @endif
                                <p class="text-xs text-slate-600 mt-2 line-clamp-3 leading-relaxed">{{ $item->bio }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- DEWAN TUTOR / GURU -->
            <div class="space-y-6">
                <div class="border-b border-slate-200 pb-3">
                    <h2 class="text-2xl font-bold text-blue-950 tracking-tight">Dewan Tutor Mata Pelajaran Kesetaraan</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Guru dan tutor yang membimbing langsung mata pelajaran Paket B & Paket C</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($tutors as $item)
                        <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-2xs hover:shadow-md transition text-center flex flex-col items-center">
                            <div class="w-20 h-20 rounded-full overflow-hidden bg-slate-100 border-2 border-slate-200 mb-3 shadow-xs flex items-center justify-center">
                                @if($item->foto)
                                    <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-700 to-slate-800 text-white font-bold text-xl flex items-center justify-center">
                                        {{ substr($item->nama, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            <h4 class="font-bold text-sm text-blue-950 leading-tight">{{ $item->nama }}</h4>
                            <p class="text-[11px] font-medium text-amber-700 mt-0.5">{{ $item->jabatan }}</p>
                            <p class="text-[11px] text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                                {{ $item->bio ?? 'Tutor berdedikasi membina pembelajaran kesetaraan di PKBM AL-QUDWAH.' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
