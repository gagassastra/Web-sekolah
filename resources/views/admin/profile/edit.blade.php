@extends('layouts.admin', [
    'title' => 'Edit Profil Lembaga',
    'header' => 'Pengaturan Profil PKBM AL-QUDWAH'
])

@section('content')
<div class="max-w-5xl">
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-navy-900">Kelola Data Identitas & Lembaga</h2>
                <p class="text-xs text-slate-500">Perbarui data Dapodik, legalitas perizinan, visi misi, dan informasi kontak.</p>
            </div>
            <a href="{{ route('profil') }}" target="_blank" class="text-xs font-bold text-primary-600 hover:text-navy-900 flex items-center gap-1">
                Pratinjau Halaman <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
            </a>
        </div>

        @if($errors->any())
            <div class="m-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-xs space-y-1">
                <div class="font-bold mb-1">Terjadi kesalahan validasi:</div>
                @foreach($errors->all() as $error)
                    <div>&bull; {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-8">
            @csrf
            @method('PUT')

            <!-- Bagian 1: Identitas Dapodik & Lembaga -->
            <div>
                <h3 class="text-sm font-bold text-navy-900 border-b border-slate-200 pb-2 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-school text-primary-600"></i> Identitas Pokok & Legalitas
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-xs">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Nama Lembaga *</label>
                        <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah', $profile->nama_sekolah) }}" required
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">NPSN *</label>
                        <input type="text" name="npsn" value="{{ old('npsn', $profile->npsn) }}" required
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Bentuk Pendidikan *</label>
                        <input type="text" name="bentuk_pendidikan" value="{{ old('bentuk_pendidikan', $profile->bentuk_pendidikan) }}" required
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Status Lembaga *</label>
                        <input type="text" name="status_sekolah" value="{{ old('status_sekolah', $profile->status_sekolah) }}" required
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">SK Pendirian</label>
                        <input type="text" name="sk_pendirian" value="{{ old('sk_pendirian', $profile->sk_pendirian) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Tanggal SK Pendirian</label>
                        <input type="date" name="tanggal_sk_pendirian" value="{{ old('tanggal_sk_pendirian', optional($profile->tanggal_sk_pendirian)->format('Y-m-d')) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">SK Izin Operasional</label>
                        <input type="text" name="sk_izin_operasional" value="{{ old('sk_izin_operasional', $profile->sk_izin_operasional) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Tanggal SK Izin Operasional</label>
                        <input type="date" name="tanggal_sk_izin" value="{{ old('tanggal_sk_izin', optional($profile->tanggal_sk_izin)->format('Y-m-d')) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Nama Kepala Sekolah / PKBM *</label>
                        <input type="text" name="kepala_sekolah" value="{{ old('kepala_sekolah', $profile->kepala_sekolah) }}" required
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                </div>
            </div>

            <!-- Bagian 2: Kontak & Alamat -->
            <div>
                <h3 class="text-sm font-bold text-navy-900 border-b border-slate-200 pb-2 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-map-location-dot text-primary-600"></i> Alamat & Narahubung
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-xs">
                    <div class="sm:col-span-2 lg:col-span-3">
                        <label class="block font-bold text-slate-700 uppercase mb-1">Alamat (Kp, RT/RW) *</label>
                        <input type="text" name="alamat" value="{{ old('alamat', $profile->alamat) }}" required
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Desa / Kelurahan</label>
                        <input type="text" name="desa" value="{{ old('desa', $profile->desa) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{ old('kecamatan', $profile->kecamatan) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Kabupaten</label>
                        <input type="text" name="kabupaten" value="{{ old('kabupaten', $profile->kabupaten) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Provinsi</label>
                        <input type="text" name="provinsi" value="{{ old('provinsi', $profile->provinsi) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Kode Pos</label>
                        <input type="text" name="kode_pos" value="{{ old('kode_pos', $profile->kode_pos) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">No. WhatsApp</label>
                        <input type="text" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">No. Telepon Alternatif</label>
                        <input type="text" name="telepon" value="{{ old('telepon', $profile->telepon) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Email Resmi</label>
                        <input type="email" name="email" value="{{ old('email', $profile->email) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Jam Layanan</label>
                        <input type="text" name="jam_layanan" value="{{ old('jam_layanan', $profile->jam_layanan) }}"
                               class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    </div>
                </div>
            </div>

            <!-- Bagian 3: Narasi Sejarah, Sambutan, Visi & Misi -->
            <div>
                <h3 class="text-sm font-bold text-navy-900 border-b border-slate-200 pb-2 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-book-open-reader text-primary-600"></i> Narasi, Sambutan & Visi Misi
                </h3>
                <div class="space-y-4 text-xs">
                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Sambutan Kepala PKBM</label>
                        <textarea name="sambutan_kepala" rows="4"
                                  class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('sambutan_kepala', $profile->sambutan_kepala) }}</textarea>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Sejarah Singkat Lembaga</label>
                        <textarea name="sejarah" rows="4"
                                  class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('sejarah', $profile->sejarah) }}</textarea>
                    </div>

                    <div>
                        <label class="block font-bold text-slate-700 uppercase mb-1">Visi Lembaga</label>
                        <textarea name="visi" rows="2"
                                  class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('visi', $profile->visi) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-bold text-slate-700 uppercase mb-1">Misi Lembaga (Tulis per baris baru)</label>
                            <textarea name="misi_text" rows="5"
                                      class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500"
                                      placeholder="Misi 1&#10;Misi 2&#10;Misi 3">{{ old('misi_text', is_array($profile->misi) ? implode("\n", $profile->misi) : '') }}</textarea>
                            <span class="text-[11px] text-slate-400 mt-1 block">Pisahkan setiap butir misi dengan menekan Enter / baris baru.</span>
                        </div>

                        <div>
                            <label class="block font-bold text-slate-700 uppercase mb-1">Tujuan Pendidikan (Tulis per baris baru)</label>
                            <textarea name="tujuan_text" rows="5"
                                      class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500"
                                      placeholder="Tujuan 1&#10;Tujuan 2&#10;Tujuan 3">{{ old('tujuan_text', is_array($profile->tujuan) ? implode("\n", $profile->tujuan) : '') }}</textarea>
                            <span class="text-[11px] text-slate-400 mt-1 block">Pisahkan setiap butir tujuan dengan menekan Enter / baris baru.</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian 4: Gambar & Foto Profil -->
            <div>
                <h3 class="text-sm font-bold text-navy-900 border-b border-slate-200 pb-2 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-image text-primary-600"></i> Logo & Foto Resmi
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-xs">
                    
                    <!-- Foto Kepala -->
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <span class="block font-bold text-navy-900 uppercase mb-2">Foto Kepala Lembaga</span>
                        @if($profile->foto_kepala)
                            <img src="{{ $profile->foto_kepala }}" alt="Kepala PKBM" class="w-24 h-24 object-cover rounded-xl mb-3 border border-slate-300">
                        @endif
                        <input type="file" name="foto_kepala" accept="image/*" class="text-xs text-slate-600 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                    </div>

                    <!-- Foto Gedung -->
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <span class="block font-bold text-navy-900 uppercase mb-2">Foto Gedung / Lingkungan</span>
                        @if($profile->foto_gedung)
                            <img src="{{ $profile->foto_gedung }}" alt="Gedung PKBM" class="w-full h-24 object-cover rounded-xl mb-3 border border-slate-300">
                        @endif
                        <input type="file" name="foto_gedung" accept="image/*" class="text-xs text-slate-600 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                    </div>

                    <!-- Logo -->
                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-200">
                        <span class="block font-bold text-navy-900 uppercase mb-2">Logo Lembaga</span>
                        @if($profile->logo_path)
                            <img src="{{ $profile->logo_path }}" alt="Logo PKBM" class="w-24 h-24 object-contain bg-white p-2 rounded-xl mb-3 border border-slate-300">
                        @endif
                        <input type="file" name="logo" accept="image/*" class="text-xs text-slate-600 file:mr-2 file:py-1 file:px-2.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                    </div>

                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6 border-t border-slate-200 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl text-xs shadow-md transition flex items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan Profil
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
