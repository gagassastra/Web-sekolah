@extends('layouts.admin', [
    'title' => 'Tambah Pengguna Baru',
    'header' => 'Tambah Akun Pengelola Baru'
])

@section('content')
<div class="max-w-2xl">
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h2 class="text-base font-bold text-navy-900">Formulir Pengguna Baru</h2>
                <p class="text-xs text-slate-500">Buat akun untuk staf atau admin pengelola konten website.</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="text-xs font-bold text-slate-500 hover:text-navy-900 flex items-center gap-1">
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

        <form action="{{ route('admin.users.store') }}" method="POST" class="p-6 sm:p-8 space-y-5 text-xs">
            @csrf

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Nama Lengkap *</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Muhammad Gagas"
                       class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Alamat Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@pkbmalqudwah.sch.id"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div>
                <label class="block font-bold text-slate-700 uppercase mb-1">Peran / Hak Akses *</label>
                <select name="role" required class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                    <option value="editor" {{ old('role') == 'editor' ? 'selected' : '' }}>Editor / Pengelola Konten (Berita, Galeri, Profil)</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrator Utama (Hak Akses Penuh Termasuk User)</option>
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Kata Sandi *</label>
                    <input type="password" name="password" required placeholder="Minimal 6 karakter"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
                <div>
                    <label class="block font-bold text-slate-700 uppercase mb-1">Konfirmasi Kata Sandi *</label>
                    <input type="password" name="password_confirmation" required placeholder="Ulangi kata sandi"
                           class="w-full px-3 py-2.5 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500">
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-100 font-bold transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl transition shadow-xs flex items-center gap-2">
                    <i class="fa-solid fa-user-plus"></i> Tambah Pengguna
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
