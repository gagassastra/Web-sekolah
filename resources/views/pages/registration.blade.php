@extends('layouts.app', ['title' => 'Informasi & Pendaftaran Peserta Didik Baru - PKBM AL-QUDWAH'])

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-navy-900 via-navy-800 to-primary-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-gold-400 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-primary-400 blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-gold-400 text-xs font-semibold uppercase tracking-wider mb-4 border border-white/15">
            Penerimaan Peserta Didik Baru (PPDB)
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
            Pendaftaran Program Kesetaraan
        </h1>
        <p class="text-navy-100 max-w-2xl mx-auto text-base sm:text-lg">
            Raih masa depan yang lebih baik dengan melanjutkan pendidikan resmi Paket B (Setara SMP) dan Paket C (Setara SMA) di PKBM AL-QUDWAH.
        </p>
    </div>
</section>

<!-- Main Section -->
<section class="py-12 lg:py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Info Cards: Alur & Persyaratan -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
            <!-- Card 1: Pilihan Program -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-primary-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h3 class="text-lg font-bold text-navy-900 mb-2">Program Kesetaraan</h3>
                <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                    PKBM AL-QUDWAH menyelenggarakan dua jenjang program pendidikan kesetaraan resmi:
                </p>
                <ul class="space-y-2 text-xs text-slate-700">
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600 mt-0.5"></i>
                        <span><strong>Paket B</strong>: Setara Sekolah Menengah Pertama (SMP)</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600 mt-0.5"></i>
                        <span><strong>Paket C</strong>: Setara Sekolah Menengah Atas (SMA)</span>
                    </li>
                </ul>
            </div>

            <!-- Card 2: Persyaratan Berkas -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-folder-open"></i>
                </div>
                <h3 class="text-lg font-bold text-navy-900 mb-2">Persyaratan Dokumen</h3>
                <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                    Dokumen yang perlu disiapkan untuk verifikasi pendaftaran:
                </p>
                <ul class="space-y-2 text-xs text-slate-700">
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check text-primary-600"></i> Fotokopi Ijazah / SKL pendidikan terakhir
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check text-primary-600"></i> Fotokopi Kartu Keluarga (KK) & KTP / KIA
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check text-primary-600"></i> Fotokopi Akta Kelahiran
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fa-solid fa-check text-primary-600"></i> Pas foto terbaru berwarna (3x4 & 2x3)
                    </li>
                </ul>
            </div>

            <!-- Card 3: Alur Pendaftaran -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-list-ol"></i>
                </div>
                <h3 class="text-lg font-bold text-navy-900 mb-2">Alur Pendaftaran</h3>
                <ol class="space-y-3 text-xs text-slate-700">
                    <li class="flex items-start gap-2.5">
                        <span class="w-5 h-5 rounded-full bg-navy-900 text-white flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">1</span>
                        <span><strong>Pengisian Formulir:</strong> Isi formulir online di halaman ini atau datang langsung ke sekretariat.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="w-5 h-5 rounded-full bg-navy-900 text-white flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">2</span>
                        <span><strong>Verifikasi Berkas:</strong> Pengelola PKBM akan menghubungi Anda untuk penyerahan berkas fisik.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="w-5 h-5 rounded-full bg-navy-900 text-white flex items-center justify-center text-[10px] font-bold shrink-0 mt-0.5">3</span>
                        <span><strong>Penetapan Kelas:</strong> Terdaftar resmi dalam Dapodik Kesetaraan dan mulai pembelajaran.</span>
                    </li>
                </ol>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-3xl shadow-xl border border-slate-200/80 overflow-hidden">
            <div class="bg-gradient-to-r from-navy-900 via-navy-800 to-primary-900 text-white p-6 sm:p-8">
                <div class="max-w-3xl">
                    <span class="px-3 py-1 bg-white/10 rounded-full text-gold-400 text-xs font-semibold uppercase tracking-wider">
                        Formulir Permintaan Pendaftaran
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold mt-2 mb-2">Isi Data Calon Peserta Didik</h2>
                    <p class="text-navy-100 text-xs sm:text-sm">
                        Mohon lengkapi formulir di bawah ini dengan data yang sebenarnya. Data ini digunakan untuk registrasi awal dan akan diverifikasi oleh tim administrasi PKBM AL-QUDWAH.
                    </p>
                </div>
            </div>

            <!-- Error Notification -->
            @if($errors->any())
                <div class="m-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800">
                    <div class="flex items-center gap-2 font-bold mb-1 text-sm">
                        <i class="fa-solid fa-triangle-exclamation text-red-600"></i> Ada kesalahan pada isian formulir:
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pendaftaran.store') }}" method="POST" class="p-6 sm:p-10 space-y-8">
                @csrf

                <!-- Section A: Pilihan Program -->
                <div>
                    <h3 class="text-base font-bold text-navy-900 border-b border-slate-200 pb-2 mb-4 flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-primary-600 text-white text-xs flex items-center justify-center font-bold">A</span>
                        Pilihan Program Pendidikan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($programs as $program)
                            <label class="relative flex items-center p-4 border rounded-2xl cursor-pointer hover:border-primary-500 transition {{ old('program_id') == $program->id ? 'border-primary-600 bg-blue-50/50 ring-2 ring-primary-500/20' : 'border-slate-200 bg-white' }}">
                                <input type="radio" name="program_id" value="{{ $program->id }}"
                                       class="text-primary-600 focus:ring-primary-500 h-4 w-4"
                                       {{ (old('program_id') == $program->id || $loop->first && !old('program_id')) ? 'checked' : '' }} required>
                                <div class="ml-4">
                                    <span class="block font-bold text-navy-900 text-sm">{{ $program->nama_program }}</span>
                                    <span class="block text-xs text-slate-600 mt-0.5">{{ $program->jenjang }} - Setara {{ $program->kode_program == 'PAKET-B' ? 'SMP' : 'SMA' }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Section B: Identitas Calon Peserta Didik -->
                <div>
                    <h3 class="text-base font-bold text-navy-900 border-b border-slate-200 pb-2 mb-4 flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-primary-600 text-white text-xs flex items-center justify-center font-bold">B</span>
                        Identitas Calon Peserta Didik
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                   placeholder="Contoh: Ahmad Hidayat"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- NIK -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Nomor Induk Kependudukan (NIK)
                            </label>
                            <input type="text" name="nik" value="{{ old('nik') }}"
                                   placeholder="16 digit sesuai Kartu Keluarga / KTP"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- NISN -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                NISN (Jika Memiliki)
                            </label>
                            <input type="text" name="nisn" value="{{ old('nisn') }}"
                                   placeholder="10 digit nomor induk siswa nasional"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Jenis Kelamin <span class="text-red-500">*</span>
                            </label>
                            <select name="jenis_kelamin" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <!-- Agama -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Agama
                            </label>
                            <select name="agama"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                                <option value="Islam" {{ old('agama', 'Islam') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>

                        <!-- Tempat Lahir -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Tempat Lahir
                            </label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                   placeholder="Contoh: Cianjur"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Tanggal Lahir
                            </label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>
                    </div>
                </div>

                <!-- Section C: Alamat & Kontak -->
                <div>
                    <h3 class="text-base font-bold text-navy-900 border-b border-slate-200 pb-2 mb-4 flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-primary-600 text-white text-xs flex items-center justify-center font-bold">C</span>
                        Alamat Domisili & Kontak
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Alamat Lengkap -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Alamat Lengkap (Kampung, RT/RW) <span class="text-red-500">*</span>
                            </label>
                            <textarea name="alamat" rows="2" required placeholder="Contoh: Kp. Ciwalen Rt. 003 Rw. 004"
                                      class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">{{ old('alamat') }}</textarea>
                        </div>

                        <!-- Desa -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Desa / Kelurahan
                            </label>
                            <input type="text" name="desa" value="{{ old('desa', 'Cidadap') }}"
                                   placeholder="Contoh: Cidadap"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- Kecamatan -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Kecamatan
                            </label>
                            <input type="text" name="kecamatan" value="{{ old('kecamatan', 'Campaka') }}"
                                   placeholder="Contoh: Campaka"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- Kabupaten -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Kabupaten / Kota
                            </label>
                            <input type="text" name="kabupaten" value="{{ old('kabupaten', 'Cianjur') }}"
                                   placeholder="Contoh: Cianjur"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- No HP / WhatsApp -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                No. Telepon / WhatsApp <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="no_hp" value="{{ old('no_hp') }}" required
                                   placeholder="Contoh: 081234567890"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Alamat Email (Opsional)
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   placeholder="Contoh: nama@gmail.com"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- Pendidikan Terakhir -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Pendidikan Terakhir
                            </label>
                            <input type="text" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}"
                                   placeholder="Contoh: Tamat SD / Putus SMP Kelas 2"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>
                    </div>
                </div>

                <!-- Section D: Data Orang Tua / Wali -->
                <div>
                    <h3 class="text-base font-bold text-navy-900 border-b border-slate-200 pb-2 mb-4 flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-primary-600 text-white text-xs flex items-center justify-center font-bold">D</span>
                        Data Orang Tua / Wali & Catatan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Wali -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Nama Orang Tua / Wali
                            </label>
                            <input type="text" name="nama_wali" value="{{ old('nama_wali') }}"
                                   placeholder="Nama ayah / ibu / wali"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- Pekerjaan Wali -->
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Pekerjaan Orang Tua / Wali
                            </label>
                            <input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}"
                                   placeholder="Contoh: Petani / Wiraswasta / Karyawan"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>

                        <!-- Alasan Mendaftar -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Alasan Mendaftar / Catatan Tambahan
                            </label>
                            <textarea name="alasan_mendaftar" rows="3" placeholder="Tuliskan motivasi Anda melanjutkan pendidikan atau pertanyaan khusus..."
                                      class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">{{ old('alasan_mendaftar') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-6 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs text-slate-600">
                        Dengan menekan tombol kirim, Anda menyetujui bahwa data yang diisikan adalah benar.
                    </p>
                    <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl shadow-lg shadow-primary-600/30 transition flex items-center justify-center gap-2 text-sm">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Pendaftaran Sekarang
                    </button>
                </div>

            </form>
        </div>

        <!-- Help Section -->
        <div class="mt-12 bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl shrink-0">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div>
                    <h4 class="font-bold text-navy-900 text-base">Butuh Bantuan atau Konsultasi Pendaftaran?</h4>
                    <p class="text-slate-600 text-xs sm:text-sm">Hubungi kami melalui WhatsApp untuk informasi seputar jadwal, berkas, dan pendaftaran langsung.</p>
                </div>
            </div>
            <a href="https://wa.me/6285864183271?text={{ urlencode('Halo PKBM AL-QUDWAH, saya ingin menanyakan informasi pendaftaran Paket B / Paket C.') }}"
               target="_blank" rel="noopener"
               class="px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl text-xs sm:text-sm transition flex items-center gap-2 shrink-0 shadow-md">
                <i class="fa-brands fa-whatsapp text-lg"></i> Hubungi WhatsApp Resmi
            </a>
        </div>

    </div>
</section>
@endsection
