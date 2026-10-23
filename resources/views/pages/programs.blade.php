@extends('layouts.app')

@section('title', 'Program Pendidikan Kesetaraan Paket B & Paket C - PKBM AL-QUDWAH')
@section('meta_description', 'Program Pendidikan Kesetaraan Paket B (setara SMP) dan Paket C (setara SMA) di PKBM AL-QUDWAH Campaka Cianjur. Ijazah resmi negara.')

@section('content')
    <!-- PAGE HEADER -->
    <div class="bg-gradient-to-r from-slate-950 via-blue-950 to-slate-900 text-white py-14 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-3">
                <span class="inline-flex items-center space-x-2 text-xs font-bold text-amber-400 uppercase tracking-widest bg-amber-400/10 px-3 py-1 rounded-full border border-amber-400/20">
                    Layanan Akademik
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-white">
                    Program Pendidikan Kesetaraan
                </h1>
                <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                    Memberikan hak pendidikan setara bagi seluruh lapisan masyarakat melalui kurikulum terstandar nasional yang fleksibel, adaptif, dan berbobot.
                </p>
            </div>
        </div>
    </div>

    <!-- MAIN PROGRAMS LIST -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($programs as $prog)
                    <div class="bg-slate-50 rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="relative h-64 overflow-hidden bg-slate-900">
                                <img src="{{ asset($prog->foto ?? 'images/kegiatan/pembelajaran-tatap-muka-1.jpg') }}" alt="{{ $prog->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 opacity-90">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
                                <div class="absolute top-4 left-4">
                                    <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                        {{ $prog->jenjang }}
                                    </span>
                                </div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <h2 class="text-2xl font-bold text-white tracking-tight">
                                        {{ $prog->nama }}
                                    </h2>
                                    <p class="text-xs text-amber-300 font-medium mt-0.5">{{ $prog->tagline }}</p>
                                </div>
                            </div>

                            <div class="p-6 sm:p-8 space-y-6">
                                <p class="text-sm text-slate-600 leading-relaxed">
                                    {{ $prog->deskripsi }}
                                </p>

                                @if(!empty($prog->keunggulan) && is_array($prog->keunggulan))
                                    <div class="space-y-2">
                                        <h4 class="text-xs font-bold text-blue-950 uppercase tracking-wider">Keunggulan Utama:</h4>
                                        <ul class="space-y-2 text-xs text-slate-600">
                                            @foreach($prog->keunggulan as $item)
                                                <li class="flex items-start space-x-2">
                                                    <svg class="w-4 h-4 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                    <span>{{ $item }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="p-6 sm:p-8 pt-0 border-t border-slate-200/60 mt-4 flex items-center justify-between">
                            <span class="text-xs font-semibold text-slate-500">
                                Durasi: {{ $prog->durasi }}
                            </span>
                            <div class="flex space-x-2">
                                <a href="{{ route('programs.show', $prog->kode) }}" class="inline-flex items-center px-4 py-2 rounded-lg text-xs font-bold text-blue-700 bg-blue-100/70 hover:bg-blue-100 transition">
                                    Detail Kurikulum &rarr;
                                </a>
                                <a href="{{ route('pendaftaran.index') }}" class="inline-flex items-center px-4 py-2 rounded-lg text-xs font-bold text-white bg-blue-600 hover:bg-blue-700 transition">
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- TABEL PERBANDINGAN PAKET B & C -->
            <div class="bg-slate-50 p-6 sm:p-8 rounded-2xl border border-slate-200">
                <h3 class="text-xl font-bold text-blue-950 mb-4 text-center">Ringkasan Program Kesetaraan</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left text-slate-600">
                        <thead class="text-[11px] text-blue-950 uppercase bg-slate-200/60 font-bold">
                            <tr>
                                <th class="px-4 py-3 rounded-l-lg">Karakteristik</th>
                                <th class="px-4 py-3">Paket B (Setara SMP)</th>
                                <th class="px-4 py-3 rounded-r-lg">Paket C (Setara SMA)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            <tr>
                                <td class="px-4 py-3 font-semibold text-slate-800">Jenjang Formal Setara</td>
                                <td class="px-4 py-3">SMP / MTs</td>
                                <td class="px-4 py-3">SMA / MA / SMK</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-semibold text-slate-800">Syarat Pendaftaran</td>
                                <td class="px-4 py-3">Ijazah SD/MI/Paket A atau sederajat</td>
                                <td class="px-4 py-3">Ijazah SMP/MTs/Paket B atau sederajat</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-semibold text-slate-800">Metode Pembelajaran</td>
                                <td class="px-4 py-3">Tatap muka berkala + modul mandiri</td>
                                <td class="px-4 py-3">Tatap muka fleksibel + modul digital mandiri</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-semibold text-slate-800">Ijazah Resmi</td>
                                <td class="px-4 py-3 text-emerald-700 font-bold">Diterbitkan Negara (Kemdikbudristek)</td>
                                <td class="px-4 py-3 text-emerald-700 font-bold">Diterbitkan Negara (Kemdikbudristek)</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 font-semibold text-slate-800">Kelanjutan Lulusan</td>
                                <td class="px-4 py-3">Melanjut ke SMA/SMK/Paket C</td>
                                <td class="px-4 py-3">Daftar Kuliah PTN/PTS, Kerja, CPNS, TNI, POLRI</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
