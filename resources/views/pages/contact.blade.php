@extends('layouts.app', ['title' => 'Kontak & Lokasi - PKBM AL-QUDWAH'])

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-br from-navy-900 via-navy-800 to-primary-900 text-white py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-gold-400 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-primary-400 blur-3xl"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-gold-400 text-xs font-semibold uppercase tracking-wider mb-4 border border-white/15">
            Layanan Informasi
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 tracking-tight">
            Hubungi PKBM AL-QUDWAH
        </h1>
        <p class="text-navy-100 max-w-2xl mx-auto text-base sm:text-lg">
            Kami siap memberikan informasi lengkap mengenai program pendidikan kesetaraan, konsultasi ijazah, dan pendaftaran peserta didik baru.
        </p>
    </div>
</section>

<!-- Main Contact Section -->
<section class="py-12 lg:py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Contact Cards Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Card Alamat -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-primary-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h3 class="font-bold text-navy-900 text-sm mb-2">Alamat Sekretariat</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ $profile->alamat_lengkap ?? 'Kp. Ciwalen Rt. 003 Rw. 004, Desa Cidadap, Kec. Campaka, Kab. Cianjur, Jawa Barat 43263' }}
                </p>
            </div>

            <!-- Card WhatsApp -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <h3 class="font-bold text-navy-900 text-sm mb-2">WhatsApp / Telepon</h3>
                <p class="text-xs text-slate-600 mb-2">Hubungi admin resmi:</p>
                <a href="https://wa.me/6285864183271" target="_blank" rel="noopener" class="text-xs font-bold text-emerald-600 hover:underline block mb-1">
                    0858-6418-3271
                </a>
                <a href="https://wa.me/6285722499957" target="_blank" rel="noopener" class="text-xs font-bold text-emerald-600 hover:underline block">
                    0857-2249-9957
                </a>
            </div>

            <!-- Card Email -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-regular fa-envelope"></i>
                </div>
                <h3 class="font-bold text-navy-900 text-sm mb-2">Surat Elektronik</h3>
                <p class="text-xs text-slate-600 mb-2">Layanan surat & korespondensi:</p>
                <a href="mailto:{{ $profile->email ?? 'pkbmalqudwah2022@gmail.com' }}" class="text-xs font-bold text-primary-700 hover:underline break-all">
                    {{ $profile->email ?? 'pkbmalqudwah2022@gmail.com' }}
                </a>
            </div>

            <!-- Card Jam Layanan -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl mb-4">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <h3 class="font-bold text-navy-900 text-sm mb-2">Jam Layanan</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    <strong>Senin - Sabtu:</strong> 08.00 - 16.00 WIB<br>
                    <strong>Minggu:</strong> Layanan Daring / Pembelajaran Terjadwal
                </p>
            </div>
        </div>

        <!-- Form and Map Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            
            <!-- Message Form (7 cols) -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-200">
                <span class="px-3 py-1 bg-blue-50 text-primary-700 text-xs font-bold rounded-full uppercase tracking-wider">
                    Formulir Kirim Pesan
                </span>
                <h2 class="text-2xl font-extrabold text-navy-900 mt-2 mb-2">Tinggalkan Pesan atau Pertanyaan</h2>
                <p class="text-slate-600 text-xs sm:text-sm mb-6">
                    Isi formulir di bawah ini jika Anda ingin berkonsultasi seputar program Paket B, Paket C, atau kerjasama lembaga.
                </p>

                <!-- Feedback Notifications -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center gap-3 text-sm">
                        <i class="fa-solid fa-circle-check text-emerald-600 text-lg"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-xs space-y-1">
                        @foreach($errors->all() as $error)
                            <div><i class="fa-solid fa-circle-exclamation text-red-500 mr-1"></i> {{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('kontak.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Nama Anda <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Nama Lengkap"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Email Anda <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@contoh.com"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                No. Telepon / WhatsApp
                            </label>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                                Subjek Pesan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="subject" value="{{ old('subject') }}" required placeholder="Contoh: Info Pendaftaran Paket C"
                                   class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-navy-900 uppercase tracking-wider mb-2">
                            Pesan / Pertanyaan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="message" rows="5" required placeholder="Tuliskan pertanyaan atau informasi yang ingin Anda ketahui..."
                                  class="w-full px-4 py-3 rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-primary-500/20 focus:border-primary-500 text-sm">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-primary-600 hover:bg-primary-700 text-white font-bold rounded-xl shadow-lg shadow-primary-600/30 transition flex items-center justify-center gap-2 text-sm">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Pesan
                    </button>
                </form>
            </div>

            <!-- Map & Quick Info (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                <!-- Google Maps Card -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-200">
                    <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-map-location-dot text-primary-600"></i>
                            <h3 class="font-bold text-navy-900 text-sm">Peta Lokasi PKBM</h3>
                        </div>
                        <span class="text-[11px] text-slate-500">Kec. Campaka, Cianjur</span>
                    </div>
                    <div class="h-72 w-full bg-slate-100">
                        <!-- Embedded Google Maps targeting Cidadap Campaka Cianjur -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63388.94191310156!2d107.08643219999999!3d-6.9134015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e685f0962b8a7c1%3A0x7d337a6b245a478b!2sCidadap%2C%20Kec.%20Campaka%2C%20Kabupaten%20Cianjur%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="p-4 bg-slate-50 text-xs text-slate-600 flex items-start gap-2">
                        <i class="fa-solid fa-circle-info text-primary-600 mt-0.5"></i>
                        <span>Kp. Ciwalen Rt. 003 Rw. 004, Desa Cidadap, Kecamatan Campaka, Kabupaten Cianjur, Jawa Barat 43263.</span>
                    </div>
                </div>

                <!-- Fast WhatsApp Card -->
                <div class="bg-gradient-to-br from-emerald-800 to-navy-900 text-white rounded-3xl p-6 shadow-md relative overflow-hidden">
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-emerald-400/10 rounded-full blur-xl"></div>
                    <span class="text-xs uppercase font-semibold text-emerald-300 tracking-wider">Respon Cepat</span>
                    <h3 class="text-lg font-bold mt-1 mb-2">Ingin Konsultasi Langsung Melalui WhatsApp?</h3>
                    <p class="text-xs text-emerald-100 leading-relaxed mb-4">
                        Tanyakan seputar legalitas ijazah, masa studi paket kesetaraan, maupun kelengkapan berkas Anda.
                    </p>
                    <a href="https://wa.me/6285864183271?text={{ urlencode('Halo PKBM AL-QUDWAH, saya ingin bertanya mengenai program kesetaraan Paket B / Paket C.') }}"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-bold transition shadow">
                        <i class="fa-brands fa-whatsapp text-sm"></i> Chat WhatsApp (0858-6418-3271)
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
