@extends('layouts.app', ['title' => $post->title . ' - PKBM AL-QUDWAH'])

@section('content')
<!-- Breadcrumb Header -->
<section class="bg-navy-900 text-white py-10 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="flex items-center gap-2 text-xs text-navy-200 mb-4 flex-wrap">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <i class="fa-solid fa-chevron-right text-[10px] text-navy-400"></i>
            <a href="{{ route('berita.index') }}" class="hover:text-white transition">Warta & Kegiatan</a>
            <i class="fa-solid fa-chevron-right text-[10px] text-navy-400"></i>
            <span class="text-gold-400 truncate max-w-xs">{{ $post->category }}</span>
        </nav>
        <span class="inline-block px-3 py-1 rounded-full bg-primary-600/50 border border-primary-400/30 text-white text-xs font-semibold uppercase tracking-wider mb-3">
            {{ $post->category }}
        </span>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-4">
            {{ $post->title }}
        </h1>
        <div class="flex items-center gap-6 text-xs text-navy-200 flex-wrap">
            <span class="flex items-center gap-2">
                <i class="fa-solid fa-user-pen text-gold-400"></i>
                {{ $post->author->name ?? 'Admin PKBM' }}
            </span>
            <span class="flex items-center gap-2">
                <i class="fa-regular fa-calendar text-gold-400"></i>
                {{ $post->published_at ? $post->published_at->translatedFormat('l, d F Y') : $post->created_at->translatedFormat('l, d F Y') }}
            </span>
            <span class="flex items-center gap-2">
                <i class="fa-regular fa-eye text-gold-400"></i>
                {{ $post->views }} kali dilihat
            </span>
        </div>
    </div>
</section>

<!-- Article Content -->
<article class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Featured Image -->
        <div class="rounded-2xl overflow-hidden shadow-lg border border-slate-200 mb-8 max-h-[500px]">
            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>

        @if($post->summary)
            <div class="p-6 bg-slate-50 border-l-4 border-primary-600 rounded-r-2xl mb-8">
                <p class="text-slate-700 italic text-base sm:text-lg leading-relaxed font-serif">
                    "{{ $post->summary }}"
                </p>
            </div>
        @endif

        <!-- Body text -->
        <div class="prose prose-slate max-w-none text-slate-700 text-base leading-relaxed space-y-4">
            {!! nl2br(e($post->content)) !!}
        </div>

        <!-- Share & Tags Bar -->
        <div class="mt-12 pt-8 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="text-xs font-bold text-navy-900 uppercase tracking-wider">Kategori:</span>
                <a href="{{ route('berita.index', ['kategori' => $post->category]) }}"
                   class="px-3 py-1 bg-slate-100 hover:bg-primary-50 hover:text-primary-700 text-slate-700 text-xs font-semibold rounded-lg transition">
                    {{ $post->category }}
                </a>
            </div>

            <!-- Share Buttons -->
            <div class="flex items-center gap-2">
                <span class="text-xs font-bold text-navy-900 uppercase tracking-wider mr-1">Bagikan:</span>
                <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white flex items-center justify-center text-sm transition" title="Bagikan ke WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center text-sm transition" title="Bagikan ke Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener"
                   class="w-9 h-9 rounded-full bg-slate-900 hover:bg-black text-white flex items-center justify-center text-sm transition" title="Bagikan ke X">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berhasil disalin ke clipboard!');"
                        class="w-9 h-9 rounded-full bg-slate-200 hover:bg-slate-300 text-slate-700 flex items-center justify-center text-sm transition" title="Salin Tautan">
                    <i class="fa-solid fa-link"></i>
                </button>
            </div>
        </div>

        <!-- Back to news -->
        <div class="mt-8 flex justify-between items-center">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-primary-600 hover:text-navy-900 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Warta
            </a>
            <a href="{{ route('pendaftaran.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary-600 hover:bg-primary-700 text-white text-xs font-bold rounded-xl transition shadow">
                Informasi Pendaftaran Siswa Baru <i class="fa-solid fa-chevron-right text-[10px]"></i>
            </a>
        </div>
    </div>
</article>

<!-- Related Posts -->
@if(isset($relatedPosts) && $relatedPosts->count() > 0)
<section class="py-12 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl sm:text-2xl font-bold text-navy-900 mb-6 flex items-center gap-2">
            <i class="fa-solid fa-newspaper text-primary-600"></i> Warta Terkait Lainnya
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedPosts as $related)
                <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-slate-200/80 flex flex-col group">
                    <a href="{{ route('berita.show', $related->slug) }}" class="relative h-44 overflow-hidden bg-slate-100 block">
                        <img src="{{ $related->image_url }}" alt="{{ $related->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-navy-900/80 text-white text-[11px] font-semibold rounded-md">
                            {{ $related->category }}
                        </span>
                    </a>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-xs text-slate-600 flex items-center gap-1.5 mb-2">
                                <i class="fa-regular fa-calendar text-primary-600"></i>
                                {{ $related->published_at ? $related->published_at->translatedFormat('d M Y') : $related->created_at->translatedFormat('d M Y') }}
                            </span>
                            <h3 class="text-sm font-bold text-navy-900 group-hover:text-primary-700 transition line-clamp-2 leading-snug">
                                <a href="{{ route('berita.show', $related->slug) }}">
                                    {{ $related->title }}
                                </a>
                            </h3>
                        </div>
                        <a href="{{ route('berita.show', $related->slug) }}" class="mt-4 text-xs font-bold text-primary-600 hover:text-navy-900 flex items-center gap-1">
                            Baca <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
