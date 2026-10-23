@extends('layouts.admin', [
    'title' => 'Program Kesetaraan',
    'header' => 'Kelola Program Pendidikan Kesetaraan'
])

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-base font-bold text-navy-900">Daftar Program Pendidikan</h2>
            <p class="text-xs text-slate-500">Program kesetaraan resmi Paket B dan Paket C di PKBM AL-QUDWAH.</p>
        </div>
        <a href="{{ route('admin.programs.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white rounded-xl text-xs font-bold transition shadow-xs">
            <i class="fa-solid fa-plus"></i> Tambah Program Baru
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-600 uppercase font-bold text-[10px] tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3.5">Urutan</th>
                        <th class="px-6 py-3.5">Program</th>
                        <th class="px-6 py-3.5">Jenjang</th>
                        <th class="px-6 py-3.5">Durasi</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($programs as $prog)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-6 py-4 font-mono font-bold text-slate-500">
                                #{{ $prog->urutan }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $prog->foto_url }}" alt="{{ $prog->nama }}" class="w-12 h-10 object-cover rounded-lg border border-slate-200 shrink-0">
                                    <div>
                                        <span class="block font-bold text-navy-900 text-sm">{{ $prog->nama }}</span>
                                        <span class="block text-[11px] text-slate-500">{{ $prog->kode }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-700">
                                {{ $prog->jenjang }}
                            </td>
                            <td class="px-6 py-4 text-slate-600">
                                {{ $prog->durasi }}
                            </td>
                            <td class="px-6 py-4">
                                @if($prog->is_active)
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                        Aktif
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('program.detail', $prog->kode) }}" target="_blank" class="p-2 text-slate-500 hover:text-navy-900 hover:bg-slate-100 rounded-lg transition" title="Lihat Halaman">
                                        <i class="fa-solid fa-eye text-xs"></i>
                                    </a>
                                    <a href="{{ route('admin.programs.edit', $prog->id) }}" class="p-2 text-primary-600 hover:text-primary-800 hover:bg-primary-50 rounded-lg transition" title="Edit">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </a>
                                    <form action="{{ route('admin.programs.destroy', $prog->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus program ini?');" class="inline">
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
                                Belum ada program kesetaraan terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
