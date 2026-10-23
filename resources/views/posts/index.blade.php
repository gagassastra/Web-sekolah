@extends('layouts.app', ['title' => 'Berita & Kegiatan - PKBM AL-QUDWAH'])

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-navy-900 via-navy-800 to-primary-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-gold-400 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-primary-400 blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-gold-400 text-xs font-semibold uppercase tracking-wider mb-4 border border-white/15">
            Warta & Dokumentasi
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
            Berita & Agenda Kegiatan
        </h1>
        <p class="text-navy-100 max-w-2xl mx-auto text-base sm:text-lg">
            Ikuti informasi terbaru, kegiatan pembelajaran kesetaraan Paket B dan C, serta agenda penting di PKBM AL-QUDWAH.
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="py-12 lg:py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            
            <!-- Main News List (8 cols) -->
            <div class="lg:col-span-8">
                <!-- Search & Active Filter bar on mobile/tablet -->
                <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-200/80 mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-slate-600">
                        Menampilkan <span class="font-bold text-navy-900">{{ $posts->total() }}</span> artikel warta & kegiatan
                        @if(request('kategori'))
                            dalam kategori <span class="font-semibold text-primary-700 bg-primary-50 px-2 py-0.5 rounded">"{{ request('kategori') }}"</span>
                        @endif
                        @if(request('q'))
                            dengan kata kunci <span class="font-semibold text-primary-700 bg-primary-50 px-2 py-0.5 rounded">"{{ request('q') }}"</span>
                        @endif
                    </div>
                    @if(request('kategori') || request('q'))
                        <a href="{{ route('berita.index') }}" class="text-xs font-semibold text-red-600 hover:text-red-700 flex items-center gap-1">
                            <i class="fa-solid fa-xmark"></i> Reset Filter
                        </a>
                    @endif
                </div>

                @if($posts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        @foreach($posts as $post)
                            <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200/80 flex flex-col group">
                                <a href="{{ route('berita.show', $post->slug) }}" class="relative h-52 overflow-hidden bg-slate-100 block">
                                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <span class="absolute top-4 left-4 px-3 py-1 bg-navy-900/85 backdrop-blur-md text-white text-xs font-semibold rounded-lg uppercase tracking-wider">
                                        {{ $post->category }}
                                    </span>
                                </a>
                                <div class="p-6 flex-1 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center gap-4 text-xs text-slate-600 mb-3">
                                            <span class="flex items-center gap-1.5">
                                                <i class="fa-regular fa-calendar text-primary-600"></i>
                                                {{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : $post->created_at->translatedFormat('d M Y') }}
                                            </span>
                                            <span class="flex items-center gap-1.5">
                                                <i class="fa-regular fa-eye text-primary-600"></i>
                                                {{ $post->views }} tayang
                                            </span>
                                        </div>
                                        <h2 class="text-lg font-bold text-navy-900 group-hover:text-primary-700 transition line-clamp-2 mb-2 leading-snug">
                                            <a href="{{ route('berita.show', $post->slug) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h2>
                                        <p class="text-slate-600 text-sm line-clamp-3 leading-relaxed mb-4">
                                            {{ $post->summary ?? Str::limit(strip_tags($post->content), 120) }}
                                        </p>
                                    </div>
                                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                                        <span class="text-xs text-slate-600 font-medium flex items-center gap-1.5">
                                            <i class="fa-solid fa-user-pen text-slate-500"></i> {{ $post->author->name ?? 'Admin PKBM' }}
                                        </span>
                                        <a href="{{ route('berita.show', $post->slug) }}" class="text-primary-600 hover:text-navy-900 font-bold text-xs flex items-center gap-1 group-hover:translate-x-0.5 transition-all">
                                            Baca Lengkap <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-10">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-2xl p-12 text-center border border-slate-200">
                        <div class="w-16 h-16 bg-blue-50 text-primary-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <h3 class="text-lg font-bold text-navy-900 mb-2">Belum Ada Warta yang Ditemukan</h3>
                        <p class="text-slate-600 text-sm max-w-md mx-auto mb-6">
                            Maaf, warta atau kegiatan yang Anda cari belum tersedia atau coba cari dengan kata kunci lain.
                        </p>
                        <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 text-white rounded-xl text-sm font-semibold hover:bg-primary-700 transition shadow">
                            <i class="fa-solid fa-rotate-left"></i> Lihat Semua Berita
                        </a>
                    </div>
                @endif
            </div>

            <!-- Sidebar (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                <!-- Search Box -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/80">
                    <h3 class="text-base font-bold text-navy-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                        <i class="fa-solid fa-magnifying-glass text-primary-600"></i> Cari Warta
                    </h3>
                    <form action="{{ route('berita.index') }}" method="GET">
                        @if(request('kategori'))
                            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                        @endif
                        <div class="relative">
                            <input type="text" name="q" value="{{ request('q') }}" placeholder="Ketik kata kunci..."
                                   class="w-full pl-10 pr-4 py-2.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 transition">
                            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-slate-500 text-sm"></i>
                        </div>
                        <button type="submit" class="w-full mt-3 px-4 py-2.5 bg-navy-900 text-white rounded-xl text-sm font-semibold hover:bg-primary-700 transition flex items-center justify-center gap-2">
                            Cari
                        </button>
                    </form>
                </div>

                <!-- Category List -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/80">
                    <h3 class="text-base font-bold text-navy-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                        <i class="fa-solid fa-layer-group text-primary-600"></i> Kategori
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('berita.index') }}"
                           class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm transition {{ !request('kategori') ? 'bg-primary-50 text-primary-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">
                            <span>Semua Kategori</span>
                            <span class="text-xs bg-slate-100 px-2 py-0.5 rounded-full text-slate-600 font-semibold">{{ \App\Models\Post::published()->count() }}</span>
                        </a>
                        @foreach($categories as $cat)
                            @php
                                $catCount = \App\Models\Post::published()->where('category', $cat)->count();
                            @endphp
                            <a href="{{ route('berita.index', ['kategori' => $cat]) }}"
                               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl text-sm transition {{ request('kategori') == $cat ? 'bg-primary-50 text-primary-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">
                                <span>{{ $cat }}</span>
                                <span class="text-xs bg-slate-100 px-2 py-0.5 rounded-full text-slate-600 font-semibold">{{ $catCount }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Posts -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/80">
                    <h3 class="text-base font-bold text-navy-900 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                        <i class="fa-solid fa-clock-rotate-left text-primary-600"></i> Warta Terbaru
                    </h3>
                    <div class="space-y-4">
                        @foreach($recentPosts as $recent)
                            <a href="{{ route('berita.show', $recent->slug) }}" class="flex gap-3 group">
                                <img src="{{ $recent->image_url }}" alt="{{ $recent->title }}"
                                     class="w-20 h-16 object-cover rounded-xl shrink-0 group-hover:opacity-90 transition">
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-xs font-bold text-navy-900 group-hover:text-primary-600 transition line-clamp-2 leading-snug">
                                        {{ $recent->title }}
                                    </h4>
                                    <span class="text-[11px] text-slate-600 mt-1 block">
                                        <i class="fa-regular fa-calendar text-[10px] text-primary-500 mr-1"></i>
                                        {{ $recent->published_at ? $recent->published_at->translatedFormat('d M Y') : $recent->created_at->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Program Banner Widget -->
                <div class="bg-gradient-to-br from-primary-900 to-navy-900 text-white p-6 rounded-2xl relative overflow-hidden shadow-lg">
                    <div class="absolute -right-10 -bottom-10 w-36 h-36 bg-gold-400/10 rounded-full blur-xl"></div>
                    <span class="text-xs uppercase font-semibold text-gold-400 tracking-wider">Kesetaraan Berijazah Resmi</span>
                    <h4 class="text-lg font-bold mt-1 mb-2">Ingin Melanjutkan Paket B atau Paket C?</h4>
                    <p class="text-xs text-navy-100 leading-relaxed mb-4">
                        PKBM AL-QUDWAH memfasilitasi Anda meraih ijazah setara SMP & SMA dengan jadwal pembelajaran fleksibel.
                    </p>
                    <a href="{{ route('pendaftaran.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gold-500 hover:bg-gold-600 text-navy-950 rounded-xl text-xs font-bold transition">
                        Daftar Online Sekarang <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
