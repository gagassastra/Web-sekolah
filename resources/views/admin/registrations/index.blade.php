@extends('layouts.admin', [
    'title' => 'Pendaftaran Siswa Baru',
    'header' => 'Penerimaan Peserta Didik Baru (PPDB)'
])

@section('content')
<div class="space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-base font-bold text-navy-900">Data Pengajuan Pendaftaran PPDB</h2>
            <p class="text-xs text-slate-500">Kelola dan verifikasi pendaftar Paket B dan Paket C secara daring.</p>
        </div>
    </div>

    <!-- Status Tabs -->
    <div class="flex items-center gap-2 overflow-x-auto pb-1 text-xs">
        <a href="{{ route('admin.registrations.index') }}"
           class="px-3.5 py-2 rounded-xl font-bold transition whitespace-nowrap {{ !request('status') ? 'bg-navy-900 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Semua ({{ $statusCounts['semua'] }})
        </a>
        <a href="{{ route('admin.registrations.index', ['status' => 'baru']) }}"
           class="px-3.5 py-2 rounded-xl font-bold transition whitespace-nowrap {{ request('status') == 'baru' ? 'bg-amber-500 text-navy-950 shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Baru Masuk ({{ $statusCounts['baru'] }})
        </a>
        <a href="{{ route('admin.registrations.index', ['status' => 'diverifikasi']) }}"
           class="px-3.5 py-2 rounded-xl font-bold transition whitespace-nowrap {{ request('status') == 'diverifikasi' ? 'bg-primary-600 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Diverifikasi ({{ $statusCounts['diverifikasi'] }})
        </a>
        <a href="{{ route('admin.registrations.index', ['status' => 'diterima']) }}"
           class="px-3.5 py-2 rounded-xl font-bold transition whitespace-nowrap {{ request('status') == 'diterima' ? 'bg-emerald-600 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Diterima ({{ $statusCounts['diterima'] }})
        </a>
        <a href="{{ route('admin.registrations.index', ['status' => 'ditolak']) }}"
           class="px-3.5 py-2 rounded-xl font-bold transition whitespace-nowrap {{ request('status') == 'ditolak' ? 'bg-red-600 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
            Ditolak ({{ $statusCounts['ditolak'] }})
        </a>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-200/80 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form action="{{ route('admin.registrations.index') }}" method="GET" class="flex flex-wrap items-center gap-3 w-full sm:w-auto">
            @if(request('status'))
                <input type="hidden" name="status" value="{{ request('status') }}">
            @endif
            <div class="relative min-w-[240px]">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama, nomor reg, WhatsApp, NIK..."
                       class="w-full pl-9 pr-3 py-2 text-xs rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-slate-400 text-xs"></i>
            </div>
            <select name="program_id" onchange="this.form.submit()" class="text-xs py-2 px-3 rounded-xl border border-slate-300 focus:outline-none">
                <option value="">-- Semua Program --</option>
                @foreach($programs as $p)
                    <option value="{{ $p->id }}" {{ request('program_id') == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                @endforeach
            </select>
            <button type="submit" class="px-3 py-2 bg-navy-900 text-white rounded-xl text-xs font-semibold hover:bg-primary-700 transition">
                Cari
            </button>
            @if(request('q') || request('program_id'))
                <a href="{{ route('admin.registrations.index', request('status') ? ['status' => request('status')] : []) }}" class="text-xs text-red-600 hover:underline">Reset</a>
            @endif
        </form>

        <a href="{{ route('pendaftaran.index') }}" target="_blank" class="text-xs text-primary-600 hover:text-navy-900 font-bold flex items-center gap-1">
            Lihat Formulir Publik <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-600 uppercase font-bold text-[10px] tracking-wider border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3.5">No. Registrasi</th>
                        <th class="px-6 py-3.5">Nama Pendaftar</th>
                        <th class="px-6 py-3.5">Program</th>
                        <th class="px-6 py-3.5">Domisili / Kontak</th>
                        <th class="px-6 py-3.5">Tanggal Daftar</th>
                        <th class="px-6 py-3.5">Status</th>
                        <th class="px-6 py-3.5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($registrations as $reg)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-6 py-4 font-mono font-bold text-navy-900">
                                {{ $reg->nomor_pendaftaran }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="block font-bold text-slate-900">{{ $reg->nama_lengkap }}</span>
                                <span class="block text-[11px] text-slate-400">JK: {{ $reg->jenis_kelamin }}</span>
                            </td>
                            <td class="px-6 py-4 font-semibold text-primary-700">
                                {{ $reg->program->nama ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-slate-600 text-[11px]">
                                <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $reg->no_hp)) }}" target="_blank" rel="noopener" class="font-bold text-emerald-600 hover:underline flex items-center gap-1">
                                    <i class="fa-brands fa-whatsapp"></i> {{ $reg->no_hp }}
                                </a>
                                <span class="text-slate-400 block">{{ $reg->desa ?? 'Cidadap' }}, Kec. {{ $reg->kecamatan ?? 'Campaka' }}</span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 text-[11px]">
                                {{ $reg->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold 
                                    {{ $reg->status == 'baru' ? 'bg-amber-100 text-amber-800' : '' }}
                                    {{ $reg->status == 'diverifikasi' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $reg->status == 'diterima' ? 'bg-emerald-100 text-emerald-800' : '' }}
                                    {{ $reg->status == 'ditolak' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($reg->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.registrations.show', $reg->id) }}" class="px-3 py-1.5 bg-primary-50 text-primary-700 hover:bg-primary-100 rounded-lg text-xs font-bold transition flex items-center gap-1">
                                        <i class="fa-solid fa-file-lines text-xs"></i> Periksa
                                    </a>
                                    <form action="{{ route('admin.registrations.destroy', $reg->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendaftar ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-red-500 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-slate-500">
                                Tidak ada data pendaftar yang sesuai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $registrations->links() }}
        </div>
    </div>

</div>
@endsection
