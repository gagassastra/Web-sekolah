@extends('layouts.admin', [
    'title' => 'Unggah Foto Galeri',
    'header' => 'Unggah Dokumentasi Foto Baru'
])

@section('content')
<div class="max-w-3xl">
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-navy-900">Formulir Galeri Foto</h2>
                <p class="text-xs text-slate-500">Unggah foto kegiatan belajar, kepramukaan, orientasi, atau dokumen resmi.</p>
            </div>
            <a href="{{ route('admin.galleries.index') }}" class="text-xs font-bold text-slate-500 hover:text-navy-900 flex items-center gap-1">
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

        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6 text-xs">
            @csrf

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Judul Foto Dokumentasi *</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Pembelajaran Modul Matematika Paket B"
                       class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm font-semibold">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Kategori Galeri *</label>
                    <select name="category" required class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                        @php $selectedCategory = old('category', 'Kegiatan Pembelajaran'); @endphp
                        @if($selectedCategory && !in_array($selectedCategory, $defaultCategories))
                            <option value="{{ $selectedCategory }}" selected>{{ $selectedCategory }}</option>
                        @endif
                        @foreach($defaultCategories as $def)
                            <option value="{{ $def }}" {{ $selectedCategory == $def ? 'selected' : '' }}>{{ $def }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Tanggal Kegiatan</label>
                    <input type="date" name="event_date" value="{{ old('event_date', date('Y-m-d')) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Keterangan / Caption Foto</label>
                <textarea name="caption" rows="3" placeholder="Tuliskan keterangan tempat, suasana, atau peserta yang ada di dalam foto..."
                          class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('caption') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                <div class="sm:col-span-2">
                    <label class="block font-bold text-slate-700 uppercase mb-1">Pilih File Foto *</label>
                    <input type="file" name="image" accept="image/*" required class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                    <span class="text-[10px] text-slate-400 mt-1 block">Format: JPG, PNG, WEBP (Maksimal 4MB).</span>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Urutan Prioritas</label>
                    <input type="number" name="urutan" value="{{ old('urutan', 1) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.galleries.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 font-bold transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition shadow-xs flex items-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up"></i> Unggah Foto
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
