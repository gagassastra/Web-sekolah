@extends('layouts.app', ['title' => 'Pendaftaran Berhasil - PKBM AL-QUDWAH'])

@section('content')
<section class="py-16 bg-slate-50 min-h-[80vh] flex items-center">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden text-center p-8 sm:p-12 relative">
            
            <!-- Success Icon -->
            <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl shadow-inner">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <span class="inline-block px-3 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-full uppercase tracking-wider mb-2">
                Pendaftaran Berhasil Terkirim
            </span>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-navy-900 mb-3">
                Terima Kasih, {{ $registration->nama_lengkap }}!
            </h1>
            
            <p class="text-slate-600 text-sm leading-relaxed mb-8 max-w-lg mx-auto">
                Permintaan pendaftaran Anda pada program kesetaraan telah tersimpan di sistem PKBM AL-QUDWAH. Silakan simpan nomor bukti pendaftaran di bawah ini:
            </p>

            <!-- Registration Number Card -->
            <div class="bg-gradient-to-r from-navy-900 via-navy-800 to-primary-900 text-white rounded-2xl p-6 mb-8 shadow-md">
                <span class="text-xs uppercase font-semibold text-gold-400 tracking-wider block mb-1">Nomor Registrasi PPDB</span>
                <span class="text-2xl sm:text-3xl font-mono font-black tracking-widest text-white selection:bg-gold-500">
                    {{ $registration->nomor_pendaftaran }}
                </span>
                <p class="text-[11px] text-navy-200 mt-2">
                    Gunakan nomor ini saat berkonsultasi atau menyerahkan berkas persyaratan fisik.
                </p>
            </div>

            <!-- Detail Summary Table -->
            <div class="bg-slate-50 rounded-2xl p-6 text-left border border-slate-200 mb-8 space-y-3 text-xs sm:text-sm">
                <div class="flex justify-between py-1 border-b border-slate-200">
                    <span class="text-slate-500">Nama Calon Siswa</span>
                    <span class="font-bold text-navy-900">{{ $registration->nama_lengkap }}</span>
                </div>
                <div class="flex justify-between py-1 border-b border-slate-200">
                    <span class="text-slate-500">Program Dipilih</span>
                    <span class="font-bold text-primary-700">{{ $registration->program->nama_program ?? 'Program Kesetaraan' }}</span>
                </div>
                <div class="flex justify-between py-1 border-b border-slate-200">
                    <span class="text-slate-500">No. WhatsApp / HP</span>
                    <span class="font-medium text-navy-900">{{ $registration->no_hp }}</span>
                </div>
                <div class="flex justify-between py-1 border-b border-slate-200">
                    <span class="text-slate-500">Domisili</span>
                    <span class="font-medium text-navy-900">{{ $registration->desa ?? 'Cidadap' }}, Kec. {{ $registration->kecamatan ?? 'Campaka' }}</span>
                </div>
                <div class="flex justify-between py-1">
                    <span class="text-slate-500">Waktu Pendaftaran</span>
                    <span class="font-medium text-navy-900">{{ $registration->created_at->translatedFormat('d F Y, H:i') }} WIB</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <button type="button" onclick="window.print()" class="w-full sm:w-auto px-5 py-3 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 font-bold text-xs transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-print"></i> Cetak Bukti Pendaftaran
                </button>
                <a href="https://wa.me/6285864183271?text={{ urlencode('Halo PKBM AL-QUDWAH, saya telah mendaftar online dengan nomor pendaftaran: ' . $registration->nomor_pendaftaran . ' atas nama ' . $registration->nama_lengkap) }}"
                   target="_blank" rel="noopener"
                   class="w-full sm:w-auto px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs transition flex items-center justify-center gap-2 shadow-sm">
                    <i class="fa-brands fa-whatsapp text-sm"></i> Konfirmasi ke WhatsApp Admin
                </a>
                <a href="{{ route('home') }}" class="w-full sm:w-auto px-5 py-3 rounded-xl bg-navy-900 hover:bg-primary-700 text-white font-bold text-xs transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-house"></i> Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</section>
@endsection
