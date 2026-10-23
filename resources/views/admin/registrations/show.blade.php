@extends('layouts.admin', [
    'title' => 'Detail Pendaftar: ' . $registration->nama_lengkap,
    'header' => 'Verifikasi Data Calon Peserta Didik'
])

@section('content')
<div class="max-w-4xl space-y-6">
    
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.registrations.index') }}" class="text-xs font-bold text-slate-500 hover:text-navy-900 flex items-center gap-1">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Pendaftar
        </a>
        <button type="button" onclick="window.print()" class="px-3.5 py-1.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-bold transition flex items-center gap-1.5">
            <i class="fa-solid fa-print"></i> Cetak Berkas
        </button>
    </div>

    <!-- Header Card -->
    <div class="bg-gradient-to-r from-navy-950 via-navy-900 to-primary-900 text-white rounded-2xl p-6 sm:p-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 shadow-md">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <span class="font-mono text-xs px-2.5 py-1 bg-white/10 rounded-lg text-gold-400 font-bold border border-white/10">
                    {{ $registration->nomor_pendaftaran }}
                </span>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold 
                    {{ $registration->status == 'baru' ? 'bg-amber-400 text-navy-950' : '' }}
                    {{ $registration->status == 'diverifikasi' ? 'bg-blue-400 text-navy-950' : '' }}
                    {{ $registration->status == 'diterima' ? 'bg-emerald-400 text-navy-950' : '' }}
                    {{ $registration->status == 'ditolak' ? 'bg-red-400 text-white' : '' }}">
                    Status: {{ ucfirst($registration->status) }}
                </span>
            </div>
            <h2 class="text-2xl font-black text-white">{{ $registration->nama_lengkap }}</h2>
            <p class="text-xs text-navy-200 mt-1">
                Mengajukan: <strong class="text-gold-400">{{ $registration->program->nama ?? 'Program Kesetaraan' }}</strong> &bull; Masuk: {{ $registration->created_at->translatedFormat('l, d F Y - H:i') }} WIB
            </p>
        </div>

        <div class="flex flex-col gap-2 shrink-0 w-full sm:w-auto">
            <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $registration->no_hp)) }}?text={{ urlencode('Halo Bapak/Ibu ' . $registration->nama_lengkap . ', kami dari PKBM AL-QUDWAH menindaklanjuti pendaftaran kesetaraan nomor ' . $registration->nomor_pendaftaran . '.') }}"
               target="_blank" rel="noopener"
               class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition flex items-center justify-center gap-2 shadow">
                <i class="fa-brands fa-whatsapp text-sm"></i> Hubungi WhatsApp
            </a>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        
        <!-- Left: Candidate Biodata (8 cols) -->
        <div class="md:col-span-8 bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 space-y-6 text-xs">
            <div>
                <h3 class="text-xs font-bold text-navy-900 uppercase tracking-wider pb-2 border-b border-slate-200 flex items-center gap-2">
                    <i class="fa-solid fa-user text-primary-600"></i> Identitas Calon Peserta Didik
                </h3>
                <div class="grid grid-cols-2 gap-4 mt-3">
                    <div>
                        <span class="text-slate-400 block text-[11px]">Nama Lengkap</span>
                        <span class="font-bold text-navy-900 text-sm">{{ $registration->nama_lengkap }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Jenis Kelamin</span>
                        <span class="font-bold text-navy-900">{{ $registration->jenis_kelamin }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">NIK</span>
                        <span class="font-mono text-navy-900">{{ $registration->nik ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">NISN</span>
                        <span class="font-mono text-navy-900">{{ $registration->nisn ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Tempat, Tanggal Lahir</span>
                        <span class="text-navy-900">{{ $registration->tempat_lahir ?? '-' }}, {{ $registration->tanggal_lahir ? $registration->tanggal_lahir->format('d/m/Y') : '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Agama</span>
                        <span class="text-navy-900">{{ $registration->agama ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xs font-bold text-navy-900 uppercase tracking-wider pb-2 border-b border-slate-200 flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-primary-600"></i> Alamat & Kontak
                </h3>
                <div class="grid grid-cols-2 gap-4 mt-3">
                    <div class="col-span-2">
                        <span class="text-slate-400 block text-[11px]">Alamat Lengkap</span>
                        <span class="font-semibold text-navy-900">{{ $registration->alamat }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Desa / Kecamatan</span>
                        <span class="text-navy-900">{{ $registration->desa ?? '-' }}, Kec. {{ $registration->kecamatan ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Kabupaten</span>
                        <span class="text-navy-900">{{ $registration->kabupaten ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Nomor HP / WhatsApp</span>
                        <span class="font-mono font-bold text-emerald-700">{{ $registration->no_hp }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Email</span>
                        <span class="text-navy-900">{{ $registration->email ?? '-' }}</span>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-xs font-bold text-navy-900 uppercase tracking-wider pb-2 border-b border-slate-200 flex items-center gap-2">
                    <i class="fa-solid fa-graduation-cap text-primary-600"></i> Pendidikan & Wali
                </h3>
                <div class="grid grid-cols-2 gap-4 mt-3">
                    <div>
                        <span class="text-slate-400 block text-[11px]">Pendidikan Terakhir</span>
                        <span class="font-semibold text-navy-900">{{ $registration->pendidikan_terakhir ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Program Dipilih</span>
                        <span class="font-bold text-primary-700">{{ $registration->program->nama ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Nama Orang Tua / Wali</span>
                        <span class="text-navy-900">{{ $registration->nama_wali ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[11px]">Pekerjaan Wali</span>
                        <span class="text-navy-900">{{ $registration->pekerjaan_wali ?? '-' }}</span>
                    </div>
                    <div class="col-span-2">
                        <span class="text-slate-400 block text-[11px]">Alasan Mendaftar / Catatan Siswa</span>
                        <p class="text-slate-700 italic bg-slate-50 p-3 rounded-xl border border-slate-200 mt-1">
                            "{{ $registration->alasan_mendaftar ?? 'Tidak ada catatan tambahan.' }}"
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Status Update Form (4 cols) -->
        <div class="md:col-span-4 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 text-xs">
                <h3 class="font-bold text-navy-900 text-sm mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fa-solid fa-clipboard-check text-primary-600"></i> Update Status PPDB
                </h3>

                <form action="{{ route('admin.registrations.status', $registration->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Status Verifikasi</label>
                        <select name="status" class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                            <option value="baru" {{ $registration->status == 'baru' ? 'selected' : '' }}>Baru Masuk</option>
                            <option value="diverifikasi" {{ $registration->status == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi (Berkas Cocok)</option>
                            <option value="diterima" {{ $registration->status == 'diterima' ? 'selected' : '' }}>Diterima Resmi</option>
                            <option value="ditolak" {{ $registration->status == 'ditolak' ? 'selected' : '' }}>Ditolak / Batal</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Catatan Administrator</label>
                        <textarea name="catatan_admin" rows="4" placeholder="Tuliskan catatan berkas, jadwal tes orientasi, atau kekurangan dokumen..."
                                  class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('catatan_admin', $registration->catatan_admin) }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition shadow-xs flex items-center justify-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Status
                    </button>
                </form>
            </div>

            <div class="bg-blue-50/70 border border-blue-200/60 rounded-2xl p-5 text-xs text-slate-600">
                <span class="font-bold text-primary-800 block mb-1 flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-info text-primary-600"></i> Panduan Verifikasi
                </span>
                <p class="leading-relaxed">
                    Setelah berkas fisik diperiksa dan dinyatakan lengkap, ubah status menjadi <strong>Diterima</strong> dan data calon siswa dapat dimasukkan ke Dapodik Kesetaraan serta dibuatkan akun ujian CBT.
                </p>
            </div>
        </div>

    </div>

</div>
@endsection
