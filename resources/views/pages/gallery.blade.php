@extends('layouts.app', ['title' => 'Galeri Foto Kegiatan & Dokumentasi - PKBM AL-QUDWAH'])

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-navy-900 via-navy-800 to-primary-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-gold-400 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-primary-400 blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-gold-400 text-xs font-semibold uppercase tracking-wider mb-4 border border-white/15">
            Dokumentasi Visual
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
            Galeri Kegiatan & Pembelajaran
        </h1>
        <p class="text-navy-100 max-w-2xl mx-auto text-base sm:text-lg">
            Dokumentasi otentik aktivitas pembelajaran kesetaraan, dewan tutor, warga belajar, dan sarana PKBM AL-QUDWAH Campaka - Cianjur.
        </p>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-12 lg:py-16 bg-slate-50" x-data="{ modalOpen: false, activeImage: '', activeTitle: '', activeDesc: '', activeCategory: '' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter Tabs -->
        <div class="flex items-center justify-center flex-wrap gap-2 mb-10">
            <a href="{{ route('galeri.index') }}"
               class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition shadow-sm {{ !request('kategori') ? 'bg-primary-600 text-white shadow-primary-500/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200' }}">
                Semua Koleksi ({{ \App\Models\Gallery::count() }})
            </a>
            @foreach($categories as $cat)
                @php
                    $count = \App\Models\Gallery::where('category', $cat)->count();
                @endphp
                <a href="{{ route('galeri.index', ['kategori' => $cat]) }}"
                   class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition shadow-sm {{ request('kategori') == $cat ? 'bg-primary-600 text-white shadow-primary-500/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200' }}">
                    {{ $cat }} ({{ $count }})
                </a>
            @endforeach
        </div>

        <!-- Gallery Grid -->
        @if($galleries->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($galleries as $gallery)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200/80 cursor-pointer flex flex-col"
                         @click="modalOpen = true; activeImage = '{{ $gallery->image_url }}'; activeTitle = '{{ addslashes($gallery->title) }}'; activeDesc = '{{ addslashes($gallery->description ?? '') }}'; activeCategory = '{{ $gallery->category }}'">
                        <div class="relative h-60 overflow-hidden bg-slate-100">
                            <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-navy-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                <span class="text-white text-xs font-semibold flex items-center gap-1.5">
                                    <i class="fa-solid fa-expand text-gold-400"></i> Klik untuk perbesar
                                </span>
                            </div>
                            <span class="absolute top-3 left-3 px-2.5 py-1 bg-navy-900/80 backdrop-blur-md text-white text-[11px] font-semibold rounded-lg">
                                {{ $gallery->category }}
                            </span>
                        </div>
                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <h3 class="font-bold text-sm text-navy-900 group-hover:text-primary-600 transition line-clamp-1">
                                {{ $gallery->title }}
                            </h3>
                            @if($gallery->description)
                                <p class="text-xs text-slate-500 line-clamp-2 mt-1">
                                    {{ $gallery->description }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $galleries->links() }}
            </div>
        @else
            <div class="bg-white rounded-2xl p-12 text-center border border-slate-200 max-w-md mx-auto">
                <i class="fa-regular fa-image text-4xl text-slate-400 mb-3 block"></i>
                <h3 class="text-base font-bold text-navy-900 mb-1">Belum Ada Foto dalam Kategori Ini</h3>
                <p class="text-slate-500 text-xs mb-4">Silakan pilih kategori lain atau lihat seluruh koleksi galeri.</p>
                <a href="{{ route('galeri.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-primary-600 text-white rounded-xl text-xs font-bold hover:bg-primary-700 transition">
                    Lihat Semua Foto
                </a>
            </div>
        @endif

    </div>

    <!-- Lightbox Modal -->
    <div x-show="modalOpen" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-navy-950/90 backdrop-blur-md"
         @keydown.escape.window="modalOpen = false">
        
        <div class="relative max-w-4xl w-full bg-navy-900 rounded-2xl overflow-hidden shadow-2xl border border-white/10"
             @click.outside="modalOpen = false">
            <!-- Modal Header -->
            <div class="p-4 flex items-center justify-between border-b border-white/10">
                <div class="flex items-center gap-3">
                    <span class="px-2.5 py-1 rounded bg-primary-600/40 text-gold-400 text-xs font-bold uppercase" x-text="activeCategory"></span>
                    <h3 class="text-white font-bold text-sm sm:text-base line-clamp-1" x-text="activeTitle"></h3>
                </div>
                <button type="button" @click="modalOpen = false" class="text-white/70 hover:text-white p-1 rounded-lg hover:bg-white/10 transition">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            
            <!-- Modal Image -->
            <div class="p-2 sm:p-4 bg-navy-950/50 flex items-center justify-center max-h-[70vh]">
                <img :src="activeImage" :alt="activeTitle" class="max-h-[65vh] max-w-full object-contain rounded-lg">
            </div>

            <!-- Modal Footer / Caption -->
            <div class="p-4 bg-navy-900 border-t border-white/10" x-show="activeDesc">
                <p class="text-navy-200 text-xs sm:text-sm" x-text="activeDesc"></p>
            </div>
        </div>
    </div>
</section>
@endsection
