@extends('layouts.admin', [
    'title' => 'Edit Tenaga Pendidik: ' . $tutor->nama,
    'header' => 'Edit Data Pendidik / Tutor'
])

@section('content')
<div class="max-w-4xl">
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-navy-900">Perbarui Pendidik: {{ $tutor->nama }}</h2>
                <p class="text-xs text-slate-500">Ubah data jabatan, kontak, profil biodata, atau perbarui foto profil.</p>
            </div>
            <a href="{{ route('admin.tutors.index') }}" class="text-xs font-bold text-slate-500 hover:text-navy-900 flex items-center gap-1">
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

        <form action="{{ route('admin.tutors.update', $tutor->id) }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6 text-xs">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Nama Lengkap & Gelar *</label>
                    <input type="text" name="nama" value="{{ old('nama', $tutor->nama) }}" required
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Jabatan / Amanah *</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan', $tutor->jabatan) }}" required
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Kategori Kepegawaian *</label>
                    <select name="kategori" required class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                        <option value="Pimpinan & Pengelola" {{ old('kategori', $tutor->kategori) == 'Pimpinan & Pengelola' ? 'selected' : '' }}>Pimpinan & Pengelola</option>
                        <option value="Tutor & Guru" {{ old('kategori', $tutor->kategori) == 'Tutor & Guru' ? 'selected' : '' }}>Tutor & Guru</option>
                        <option value="Staf IT & Administrasi" {{ old('kategori', $tutor->kategori) == 'Staf IT & Administrasi' ? 'selected' : '' }}>Staf IT & Administrasi</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                        <option value="L" {{ old('jenis_kelamin', $tutor->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki (L)</option>
                        <option value="P" {{ old('jenis_kelamin', $tutor->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan (P)</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">NUPTK / PegID</label>
                    <input type="text" name="nuptk" value="{{ old('nuptk', $tutor->nuptk) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $tutor->tempat_lahir) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', optional($tutor->tanggal_lahir)->format('Y-m-d')) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email', $tutor->email) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Nomor Telepon / WA</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $tutor->no_hp) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Profil Singkat / Bio</label>
                <textarea name="bio" rows="3"
                          class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('bio', $tutor->bio) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                <div class="sm:col-span-2">
                    <label class="block font-bold text-slate-700 uppercase mb-1">Foto Formal Pendidik</label>
                    @if($tutor->foto)
                        <img src="{{ $tutor->foto_url }}" alt="{{ $tutor->nama }}" class="w-16 h-16 object-cover rounded-xl mb-2 border border-slate-200">
                    @endif
                    <input type="file" name="foto" accept="image/*" class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', $tutor->urutan) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="pt-2">
                <label class="flex items-center gap-2 cursor-pointer select-none">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $tutor->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 border-slate-300">
                    <span class="font-bold text-slate-700">Aktifkan Pendidik (Tampilkan pada profil staf website)</span>
                </label>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.tutors.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 font-bold transition">
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
