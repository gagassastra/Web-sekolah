@extends('layouts.admin', [
    'title' => 'Warta & Kegiatan',
    'header' => 'Kelola Berita & Dokumentasi Kegiatan'
])

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-base font-bold text-navy-900">Daftar Warta & Artikel</h2>
            <p class="text-xs text-slate-500">Total {{ $posts->total() }} berita dan kegiatan terdaftar di sistem.</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white rounded-xl text-xs font-bold transition shadow-xs">
            <i class="fa-solid fa-plus"></i> Tulis Berita Baru
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form action="{{ route('admin.posts.index') }}" method="GET" class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
            <div class="relative min-w-[240px]">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul berita..."
                       class="w-full pl-9 pr-3 py-2 text-xs rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-slate-400 text-xs"></i>
            </div>
            <select name="kategori" onchange="this.form.submit()" class="text-xs py-2 px-3 rounded-xl border border-slate-300 focus:outline-none">
                <option value="">-- Semua Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('kategori') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            <button type="submit" class="px-3 py-2 bg-navy-900 text-white rounded-xl text-xs font-semibold hover:bg-primary-700 transition">
                Filter
            </button>
            @if(request('q') || request('kategori'))
                <a href="{{ route('admin.posts.index') }}" class="text-xs text-red-600 hover:underline">Reset</a>
            @endif
        </form>

        <a href="{{ route('berita.index') }}" target="_blank" class="text-xs text-primary-600 hover:text-navy-900 font-bold flex items-center gap-1">
            Lihat Warta di Web <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-600 uppercase font-bold text-[10px] tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3.5">Judul & Gambar</th>
                        <th class="px-6 py-3.5">Kategori</th>
                        <th class="px-6 py-3.5">Penulis</th>
                        <th class="px-6 py-3.5">Tanggal / Views</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($posts as $post)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3 max-w-md">
                                    <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-14 h-10 object-cover rounded-lg border border-slate-200 shrink-0">
                                    <div class="min-w-0">
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="font-bold text-navy-900 hover:text-primary-600 line-clamp-1 text-xs">
                                            {{ $post->title }}
                                        </a>
                                        <span class="text-[11px] text-slate-400 font-mono block truncate">{{ $post->slug }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-primary-700">
                                    {{ $post->category }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-600">
                                {{ $post->author->name ?? 'Admin PKBM' }}
                            </td>
                            <td class="px-6 py-4 text-slate-500 text-[11px]">
                                <div>{{ $post->published_at ? $post->published_at->format('d M Y') : '-' }}</div>
                                <div class="text-slate-400">{{ $post->views }} tayang</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($post->is_published)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Tayang</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">Draf</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    @if($post->is_published)
                                        <a href="{{ route('berita.show', $post->slug) }}" target="_blank" class="p-2 text-slate-500 hover:text-navy-900 hover:bg-slate-100 rounded-lg transition" title="Lihat">
                                            <i class="fa-solid fa-eye text-xs"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="p-2 text-primary-600 hover:text-primary-800 hover:bg-primary-50 rounded-lg transition" title="Edit">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                                Belum ada artikel warta yang cocok.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection
