@extends('layouts.admin', [
    'title' => 'Edit Program: ' . $program->nama,
    'header' => 'Edit Program Kesetaraan'
])

@section('content')
<div class="max-w-4xl">
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-navy-900">Perbarui Program: {{ $program->nama }}</h2>
                <p class="text-xs text-slate-500">Perbarui deskripsi, silabus mata pelajaran, keunggulan, atau foto.</p>
            </div>
            <a href="{{ route('admin.programs.index') }}" class="text-xs font-bold text-slate-500 hover:text-navy-900 flex items-center gap-1">
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

        <form action="{{ route('admin.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6 text-xs">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Nama Program *</label>
                    <input type="text" name="nama" value="{{ old('nama', $program->nama) }}" required
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Kode Slug Program *</label>
                    <input type="text" name="kode" value="{{ old('kode', $program->kode) }}" required
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Jenjang Pendidikan *</label>
                    <input type="text" name="jenjang" value="{{ old('jenjang', $program->jenjang) }}" required
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Durasi / Waktu Studi</label>
                    <input type="text" name="durasi" value="{{ old('durasi', $program->durasi) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', $program->urutan) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Tagline Ringkas</label>
                <input type="text" name="tagline" value="{{ old('tagline', $program->tagline) }}"
                       class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Deskripsi Lengkap *</label>
                <textarea name="deskripsi" rows="4" required
                          class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('deskripsi', $program->deskripsi) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Persyaratan (Per Baris)</label>
                    <textarea name="persyaratan_text" rows="5"
                              class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('persyaratan_text', is_array($program->persyaratan) ? implode("\n", $program->persyaratan) : '') }}</textarea>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Mata Pelajaran (Per Baris)</label>
                    <textarea name="kurikulum_text" rows="5"
                              class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('kurikulum_text', is_array($program->kurikulum) ? implode("\n", $program->kurikulum) : '') }}</textarea>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Keunggulan (Per Baris)</label>
                    <textarea name="keunggulan_text" rows="5"
                              class="w-full px-3 py-2 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('keunggulan_text', is_array($program->keunggulan) ? implode("\n", $program->keunggulan) : '') }}</textarea>
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Prospek Lulusan</label>
                <textarea name="prospek_lulusan" rows="2"
                          class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('prospek_lulusan', $program->prospek_lulusan) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Foto Sampul Program</label>
                    @if($program->foto)
                        <img src="{{ $program->foto_url }}" alt="{{ $program->nama }}" class="w-24 h-16 object-cover rounded-lg mb-2 border border-slate-200">
                    @endif
                    <input type="file" name="foto" accept="image/*" class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                </div>
                <div class="pt-4">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $program->is_active) ? 'checked' : '' }}
                               class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 border-slate-300">
                        <span class="font-bold text-slate-700">Aktifkan Program (Tampilkan di Website)</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.programs.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 font-bold transition">
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
