@extends('layouts.admin', [
    'title' => 'Edit Warta: ' . $post->title,
    'header' => 'Edit Berita / Kegiatan'
])

@section('content')
<div class="max-w-4xl">
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-navy-900">Perbarui Warta: {{ $post->title }}</h2>
                <p class="text-xs text-slate-500">Edit isi artikel, ganti foto sampul, atau sesuaikan status penayangan.</p>
            </div>
            <a href="{{ route('admin.posts.index') }}" class="text-xs font-bold text-slate-500 hover:text-navy-900 flex items-center gap-1">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

        @if($errors->any())
            <div class="m-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-xs space-y-1">
                <div class="font-bold mb-1">Ada kesalahan pengisian data:</div>
                @foreach($errors->all() as $error)
                    <div>&bull; {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6 text-xs">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Judul Artikel / Warta *</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}" required
                       class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm font-semibold">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Kategori *</label>
                    <select name="category" required class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category', $post->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Slug URL *</label>
                    <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" required
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Tanggal Terbit</label>
                    <input type="date" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d')) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Ringkasan Singkat (Summary) *</label>
                <textarea name="summary" rows="2" required
                          class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('summary', $post->summary) }}</textarea>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Isi Konten Berita Lengkap *</label>
                <textarea name="content" rows="10" required
                          class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 leading-relaxed font-sans">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Foto Sampul / Featured Image</label>
                    @if($post->featured_image)
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-24 h-16 object-cover rounded-lg mb-2 border border-slate-200">
                    @endif
                    <input type="file" name="featured_image" accept="image/*" class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                </div>
                <div class="pt-4">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post->is_published) ? 'checked' : '' }}
                               class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 border-slate-300">
                        <span class="font-bold text-slate-700">Terbitkan Sekarang (Tampilkan di Beranda & Warta)</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.posts.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 font-bold transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition shadow-xs flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
