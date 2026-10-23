@extends('layouts.app')

@section('title', $program->nama . ' - PKBM AL-QUDWAH')
@section('meta_description', $program->deskripsi)

@section('content')
    <!-- PAGE HEADER -->
    <div class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-14 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-3">
                <div class="flex items-center space-x-2">
                    <a href="{{ route('programs.index') }}" class="text-xs font-semibold text-slate-400 hover:text-white transition">Program</a>
                    <span class="text-slate-600 text-xs">/</span>
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">{{ $program->jenjang }}</span>
                </div>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white">
                    {{ $program->nama }}
                </h1>
                <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                    {{ $program->tagline }}
                </p>
            </div>
        </div>
    </div>

    <!-- DETAIL CONTENT -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <!-- MAIN COLUMN -->
                <div class="lg:col-span-8 space-y-10">
                    <!-- FEATURED IMAGE -->
                    <div class="rounded-2xl overflow-hidden border border-slate-200 aspect-[16/9] bg-slate-900 shadow-xs">
                        <img src="{{ asset($program->foto ?? 'images/kegiatan/pembelajaran-tatap-muka-1.jpg') }}" alt="{{ $program->nama }}" class="w-full h-full object-cover">
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="space-y-4">
                        <h2 class="text-2xl font-bold text-blue-950 tracking-tight">Tentang Program</h2>
                        <div class="text-sm sm:text-base text-slate-600 leading-relaxed space-y-3">
                            <p>{{ $program->deskripsi }}</p>
                        </div>
                    </div>

                    <!-- KURIKULUM PEMBELAJARAN -->
                    @if(!empty($program->kurikulum) && is_array($program->kurikulum))
                        <div class="space-y-4">
                            <h3 class="text-xl font-bold text-blue-950">Mata Pelajaran & Kurikulum Kesetaraan</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($program->kurikulum as $mapel)
                                    <div class="flex items-center space-x-3 p-3.5 rounded-xl bg-slate-50 border border-slate-200/80">
                                        <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center flex-shrink-0 text-xs font-bold">
                                            ✓
                                        </div>
                                        <span class="text-xs sm:text-sm font-medium text-slate-700">{{ $mapel }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- PERSYARATAN PENDAFTARAN -->
                    @if(!empty($program->persyaratan) && is_array($program->persyaratan))
                        <div class="space-y-4">
                            <h3 class="text-xl font-bold text-blue-950">Persyaratan Berkas Pendaftaran</h3>
                            <div class="bg-amber-50/60 border border-amber-200/80 rounded-2xl p-6 space-y-3">
                                <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
                                    @foreach($program->persyaratan as $syarat)
                                        <li class="flex items-start space-x-2.5">
                                            <span class="w-2 h-2 rounded-full bg-amber-500 flex-shrink-0 mt-1.5"></span>
                                            <span>{{ $syarat }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <!-- PROSPEK LULUSAN -->
                    @if($program->prospek_lulusan)
                        <div class="space-y-3 bg-blue-50/60 p-6 rounded-2xl border border-blue-200/80">
                            <h3 class="text-lg font-bold text-blue-950">Hak & Prospek Lulusan</h3>
                            <p class="text-xs sm:text-sm text-slate-700 leading-relaxed">
                                {{ $program->prospek_lulusan }}
                            </p>
                        </div>
                    @endif
                </div>

                <!-- SIDEBAR ACTION -->
                <div class="lg:col-span-4 space-y-6">
                    <!-- CTA CARD -->
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 shadow-xs space-y-4">
                        <h4 class="font-bold text-blue-950 text-base">Tertarik dengan Program Ini?</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Pendaftaran warga belajar baru telah dibuka. Daftarkan diri Anda sekarang untuk mengamankan kuota belajar.
                        </p>
                        <a href="{{ route('pendaftaran.index') }}" class="w-full text-center block py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-sm transition">
                            Daftar Sekarang
                        </a>
                        <a href="https://wa.me/6285864183271?text=Halo%20Admin,%20saya%20ingin%20konsultasi%20mengenai%20{{ urlencode($program->nama) }}" target="_blank" rel="noopener noreferrer" class="w-full text-center block py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-sm transition">
                            Tanya Lewat WhatsApp
                        </a>
                    </div>

                    <!-- OTHER PROGRAMS -->
                    @if(isset($otherPrograms) && $otherPrograms->isNotEmpty())
                        <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 shadow-xs space-y-4">
                            <h4 class="font-bold text-blue-950 text-sm">Program Kesetaraan Lainnya</h4>
                            <div class="space-y-3">
                                @foreach($otherPrograms as $other)
                                    <a href="{{ route('programs.show', $other->kode) }}" class="block p-3 rounded-xl bg-white border border-slate-200/80 hover:border-blue-500 hover:shadow-xs transition">
                                        <h5 class="font-bold text-xs text-blue-950">{{ $other->nama }}</h5>
                                        <p class="text-[11px] text-slate-500 mt-0.5 line-clamp-1">{{ $other->tagline }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
