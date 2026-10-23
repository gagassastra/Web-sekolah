@extends('layouts.admin', [
    'title' => 'Tenaga Pendidik & Tutor',
    'header' => 'Kelola Data Tenaga Pendidik'
])

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-base font-bold text-navy-900">Daftar Pendidik & Tenaga Kependidikan</h2>
            <p class="text-xs text-slate-500">Total {{ $tutors->total() }} dewan guru, pengelola, dan staf PKBM AL-QUDWAH.</p>
        </div>
        <a href="{{ route('admin.tutors.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white rounded-xl text-xs font-bold transition shadow-xs">
            <i class="fa-solid fa-plus"></i> Tambah Tenaga Pendidik
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form action="{{ route('admin.tutors.index') }}" method="GET" class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
            <div class="relative min-w-[240px]">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama, jabatan, email..."
                       class="w-full pl-9 pr-3 py-2 text-xs rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-slate-400 text-xs"></i>
            </div>
            <select name="kategori" onchange="this.form.submit()" class="text-xs py-2 px-3 rounded-xl border border-slate-300 focus:outline-none">
                <option value="">-- Semua Kategori --</option>
                <option value="Pimpinan & Pengelola" {{ request('kategori') == 'Pimpinan & Pengelola' ? 'selected' : '' }}>Pimpinan & Pengelola</option>
                <option value="Tutor & Guru" {{ request('kategori') == 'Tutor & Guru' ? 'selected' : '' }}>Tutor & Guru</option>
                <option value="Staf IT & Administrasi" {{ request('kategori') == 'Staf IT & Administrasi' ? 'selected' : '' }}>Staf IT & Administrasi</option>
            </select>
            <button type="submit" class="px-3 py-2 bg-navy-900 text-white rounded-xl text-xs font-semibold hover:bg-primary-700 transition">
                Filter
            </button>
            @if(request('q') || request('kategori'))
                <a href="{{ route('admin.tutors.index') }}" class="text-xs text-red-600 hover:underline">Reset</a>
            @endif
        </form>

        <a href="{{ route('tutor.index') }}" target="_blank" class="text-xs text-primary-600 hover:text-navy-900 font-bold flex items-center gap-1">
            Lihat Halaman Publik <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-600 uppercase font-bold text-[10px] tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3.5">Urutan</th>
                        <th class="px-6 py-3.5">Nama & Foto</th>
                        <th class="px-6 py-3.5">Jabatan & Kategori</th>
                        <th class="px-6 py-3.5">Kontak</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($tutors as $tutor)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-6 py-4 font-mono font-bold text-slate-500">
                                #{{ $tutor->urutan }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $tutor->foto_url }}" alt="{{ $tutor->nama }}" class="w-10 h-10 object-cover rounded-xl border border-slate-200 shrink-0">
                                    <div>
                                        <span class="block font-bold text-navy-900 text-xs">{{ $tutor->nama }}</span>
                                        <span class="block text-[11px] text-slate-400">JK: {{ $tutor->jenis_kelamin ?? '-' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="block font-semibold text-slate-800">{{ $tutor->jabatan }}</span>
                                <span class="inline-block mt-0.5 px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-primary-700">
                                    {{ $tutor->kategori }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-600 text-[11px]">
                                <div>{{ $tutor->email ?? '-' }}</div>
                                <div class="text-slate-400">{{ $tutor->no_hp ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                @if($tutor->is_active)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">Aktif</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600">Nonaktif</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.tutors.edit', $tutor->id) }}" class="p-2 text-primary-600 hover:text-primary-800 hover:bg-primary-50 rounded-lg transition" title="Edit">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    <form action="{{ route('admin.tutors.destroy', $tutor->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendidik ini?');" class="inline">
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
                                Tidak ada data tenaga pendidik yang cocok.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $tutors->links() }}
        </div>
    </div>

</div>
@endsection
