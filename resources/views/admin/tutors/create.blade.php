@extends('layouts.admin', [
    'title' => 'Tambah Tenaga Pendidik',
    'header' => 'Tambah Data Pendidik / Tutor Baru'
])

@section('content')
<div class="max-w-4xl">
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-navy-900">Formulir Tenaga Pendidik</h2>
                <p class="text-xs text-slate-500">Tambahkan data tutor, pengelola, atau staf kepegawaian PKBM AL-QUDWAH.</p>
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

        <form action="{{ route('admin.tutors.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6 text-xs">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Nama Lengkap & Gelar *</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required placeholder="Contoh: Muhammad Gagas S.B, S.T"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Jabatan / Amanah *</label>
                    <input type="text" name="jabatan" value="{{ old('jabatan') }}" required placeholder="Contoh: Operator IT & Wali Kelas"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Kategori Kepegawaian *</label>
                    <select name="kategori" required class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                        <option value="Pimpinan & Pengelola" {{ old('kategori') == 'Pimpinan & Pengelola' ? 'selected' : '' }}>Pimpinan & Pengelola</option>
                        <option value="Tutor & Guru" {{ old('kategori', 'Tutor & Guru') == 'Tutor & Guru' ? 'selected' : '' }}>Tutor & Guru</option>
                        <option value="Staf IT & Administrasi" {{ old('kategori') == 'Staf IT & Administrasi' ? 'selected' : '' }}>Staf IT & Administrasi</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki (L)</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan (P)</option>
                    </select>
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">NUPTK / PegID (Jika Ada)</label>
                    <input type="text" name="nuptk" value="{{ old('nuptk') }}" placeholder="16 digit NUPTK"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Contoh: Cianjur"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Alamat Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="tutor@pkbmalqudwah.sch.id"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Nomor Telepon / WA</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Profil Singkat / Bio</label>
                <textarea name="bio" rows="3" placeholder="Tuliskan latar belakang pendidikan, spesialisasi mata pelajaran, atau pengalaman mengajar..."
                          class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">{{ old('bio') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                <div class="sm:col-span-2">
                    <label class="block font-bold text-slate-700 uppercase mb-1">Foto Formal Pendidik</label>
                    <input type="file" name="foto" accept="image/*" class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Urutan Tampil</label>
                    <input type="number" name="urutan" value="{{ old('urutan', 99) }}"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="pt-2">
                <label class="flex items-center gap-2 cursor-pointer select-none">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-primary-600 focus:ring-primary-500 border-slate-300">
                    <span class="font-bold text-slate-700">Aktifkan Pendidik (Tampilkan pada profil staf website)</span>
                </label>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.tutors.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 font-bold transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition shadow-xs flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Simpan Pendidik
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
