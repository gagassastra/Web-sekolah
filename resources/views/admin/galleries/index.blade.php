@extends('layouts.admin', [
    'title' => 'Galeri Foto',
    'header' => 'Kelola Dokumentasi & Galeri Foto'
])

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-base font-bold text-navy-900">Koleksi Foto & Dokumentasi Kegiatan</h2>
            <p class="text-xs text-slate-500">Total {{ $galleries->total() }} foto pembelajaran dan kegiatan PKBM AL-QUDWAH.</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white rounded-xl text-xs font-bold transition shadow-xs">
            <i class="fa-solid fa-cloud-arrow-up"></i> Unggah Foto Baru
        </a>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form action="{{ route('admin.galleries.index') }}" method="GET" class="flex flex-wrap items-center gap-3">
            <select name="kategori" onchange="this.form.submit()" class="text-xs py-2 px-3 rounded-xl border border-slate-300 focus:outline-none">
                <option value="">-- Semua Kategori Galeri --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('kategori') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            @if(request('kategori'))
                <a href="{{ route('admin.galleries.index') }}" class="text-xs text-red-600 hover:underline">Reset Filter</a>
            @endif
        </form>

        <a href="{{ route('galeri.index') }}" target="_blank" class="text-xs text-primary-600 hover:text-navy-900 font-bold flex items-center gap-1">
            Lihat Galeri Publik <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
        </a>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleries as $gal)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-200/80 flex flex-col justify-between group">
                <div class="relative h-48 overflow-hidden bg-slate-100">
                    <img src="{{ $gal->image_url }}" alt="{{ $gal->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded bg-navy-900/80 text-white text-[10px] font-bold">
                        {{ $gal->category }}
                    </span>
                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded bg-white/90 text-navy-950 font-mono text-[10px] font-bold">
                        #{{ $gal->urutan }}
                    </span>
                </div>
                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-xs text-navy-900 line-clamp-1 mb-1">{{ $gal->title }}</h3>
                        <p class="text-[11px] text-slate-500 line-clamp-2">{{ $gal->caption ?? 'Tanpa keterangan' }}</p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-[10px] text-slate-400">
                            {{ $gal->event_date ? $gal->event_date->format('d/m/Y') : $gal->created_at->format('d/m/Y') }}
                        </span>
                        <div class="flex items-center gap-1">
                            <a href="{{ route('admin.galleries.edit', $gal->id) }}" class="p-1.5 text-primary-600 hover:bg-primary-50 rounded-lg transition" title="Edit">
                                <i class="fa-solid fa-pen-to-square text-xs"></i>
                            </a>
                            <form action="{{ route('admin.galleries.destroy', $gal->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini dari galeri?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-2xl p-12 text-center text-slate-500 text-xs border border-slate-200">
                Belum ada foto dalam galeri.
            </div>
        @endforelse
    </div>

    <div>
        {{ $galleries->links() }}
    </div>

</div>
@endsection
