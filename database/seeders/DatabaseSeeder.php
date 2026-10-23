<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SchoolProfile;
use App\Models\Program;
use App\Models\Tutor;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Registration;
use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with verified real data.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        // 1. Users (Admin & Editor)
        $admin = User::firstOrCreate(
            ['email' => 'admin@pkbmalqudwah.sch.id'],
            [
                'name' => 'Muhammad Gagas S.B, S.T',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '085864183271',
                'avatar' => null,
            ]
        );

        $adminGagas = User::firstOrCreate(
            ['email' => 'muhammad.gagas293@pendidik.kesetaraan.belajar.id'],
            [
                'name' => 'Muhammad Gagas S.B, S.T',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '085864183271',
            ]
        );

        $kepala = User::firstOrCreate(
            ['email' => 'elismarsidah@gmail.com'],
            [
                'name' => 'Elis Masridah',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '085722499957',
            ]
        );

        // 2. School Profile (Sesuai Dokumen Biodata Resmi Dapodik & SK)
        SchoolProfile::truncate();
        SchoolProfile::create([
            'nama_sekolah' => 'PKBM AL QUDWAH',
            'npsn' => 'P9998654',
            'bentuk_pendidikan' => 'Pusat Kegiatan Belajar Masyarakat (PKBM)',
            'status_sekolah' => 'Swasta',
            'sk_pendirian' => '021/SK/YAHC/XI/2022',
            'tanggal_sk_pendirian' => '2022-11-18',
            'sk_izin_operasional' => '421.9/ 1627 /PAUDNI/KAB/2022',
            'tanggal_sk_izin' => '2024-10-02',
            'alamat' => 'Kp. Ciwalen Rt. 003 Rw. 004',
            'desa' => 'Cidadap',
            'kecamatan' => 'Kec. Campaka',
            'kabupaten' => 'Kab. Cianjur',
            'provinsi' => 'Prov. Jawa Barat',
            'kode_pos' => '43263',
            'telepon' => '085864183271',
            'whatsapp' => '085864183271',
            'email' => 'pkbmalqudwah2022@gmail.com',
            'jam_layanan' => 'Senin s/d Sabtu: 08.00 - 16.00 WIB',
            'kepala_sekolah' => 'Elis Masridah',
            'foto_kepala' => '/images/tutor/dewan-tutor-1.jpg',
            'sambutan_kepala' => 'Assalamu’alaikum Warahmatullahi Wabarakatuh. Selamat datang di Website Resmi PKBM AL-QUDWAH. Lembaga kami hadir dengan tekad tulus untuk memberikan layanan pendidikan nonformal berkualitas bagi seluruh masyarakat. Melalui program pendidikan kesetaraan Paket B (setara SMP) dan Paket C (setara SMA), kami membuka kesempatan seluas-luasnya bagi siapapun yang ingin menuntaskan pendidikannya tanpa memandang batasan usia atau waktu. Kami berkomitmen mendampingi setiap warga belajar hingga sukses menggapai ijazah resmi negara dan meraih masa depan yang lebih cerah.',
            'sejarah' => 'PKBM AL QUDWAH didirikan di Kp. Ciwalen RT 003 RW 004, Desa Cidadap, Kecamatan Campaka, Kabupaten Cianjur berdasarkan SK Pendirian Sekolah Nomor 021/SK/YAHC/XI/2022 pada tanggal 18 November 2022, serta telah memperoleh Izin Operasional resmi dari Dinas Pendidikan dengan Nomor 421.9/ 1627 /PAUDNI/KAB/2022 tertanggal 02 Oktober 2024. Lahir dari kepedulian mendalam terhadap pentingnya pemerataan pendidikan di wilayah pedesaan Campaka Cianjur, PKBM AL QUDWAH bertekad menjadi wadah belajar yang ramah, berdaya guna, dan membina kemandirian warga belajar.',
            'visi' => 'Terwujudnya lembaga pendidikan nonformal yang unggul, berakhlak mulia, mandiri, dan berdaya saing dalam mencerdaskan kehidupan masyarakat melalui layanan pendidikan kesetaraan berkualitas.',
            'misi' => [
                'Menyelenggarakan pembelajaran kesetaraan Paket B dan Paket C yang berkualitas, aplikatif, dan sesuai standar pendidikan nasional.',
                'Menanamkan nilai-nilai keimanan, ketaqwaan, dan budi pekerti luhur dalam setiap proses pembinaan karakter warga belajar.',
                'Membekali peserta didik dengan keterampilan hidup (life skills), penguasaan teknologi digital, dan jiwa kewirausahaan.',
                'Menyediakan sistem pembelajaran fleksibel (tatap muka dan mandiri) yang ramah bagi warga belajar pekerja dan keluarga.',
                'Membangun sinergi aktif dengan masyarakat, dunia usaha, dan pemerintah guna menyalurkan potensi lulusan.',
            ],
            'tujuan' => [
                'Menuntaskan wajib belajar 9 tahun dan 12 tahun bagi masyarakat usia sekolah maupun dewasa di Campaka dan sekitarnya.',
                'Menghasilkan lulusan yang memiliki ijazah setara SMP dan SMA dengan kompetensi akademik serta karakter yang teruji.',
                'Memberikan kesempatan bagi lulusan Paket B melanjutkan ke tingkat SMA/SMK/Paket C, dan lulusan Paket C melanjutkan ke perguruan tinggi atau dunia kerja.',
                'Meningkatkan taraf hidup dan daya saing ekonomi warga belajar melalui keterampilan praktis dan kemandirian.',
            ],
            'maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126685.20392336214!2d107.05435955!3d-7.008479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68444a7f0e69bf%3A0x401e8f1fc28c6a0!2sCampaka%2C%20Cianjur%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'logo_path' => '/images/logo.png',
            'foto_gedung' => '/images/hero/hero-warga-belajar-tutor.jpg',
        ]);

        // 3. Programs (Paket B & Paket C)
        Program::truncate();
        Program::create([
            'kode' => 'paket-b',
            'nama' => 'Pendidikan Kesetaraan Paket B',
            'jenjang' => 'Setara SMP / MTs',
            'tagline' => 'Tuntaskan Pendidikan Menengah Pertama dengan Pembelajaran Fleksibel',
            'deskripsi' => 'Program pendidikan kesetaraan Paket B diselenggarakan untuk memberikan kesempatan bagi warga masyarakat yang belum sempat menamatkan jenjang SMP/MTs. Program ini memberikan ijazah resmi negara yang setara dengan lulusan SMP formal dan dapat dipergunakan untuk melanjutkan pendidikan ke jenjang SMA/SMK atau Paket C.',
            'persyaratan' => [
                'Fotokopi Ijazah SD/MI atau Surat Keterangan Lulus (SKL) / Rapor terakhir',
                'Fotokopi Kartu Keluarga (KK)',
                'Fotokopi Akta Kelahiran / KTP',
                'Pas foto berwarna ukuran 3x4 (3 lembar)',
                'Mengisi formulir pendaftaran resmi PKBM AL-QUDWAH',
            ],
            'kurikulum' => [
                'Pendidikan Agama dan Budi Pekerti',
                'Pendidikan Pancasila dan Kewarganegaraan (PPKn)',
                'Bahasa Indonesia',
                'Matematika Terapan',
                'Ilmu Pengetahuan Alam (IPA)',
                'Ilmu Pengetahuan Sosial (IPS)',
                'Bahasa Inggris',
                'Pemberdayaan dan Keterampilan Khusus',
            ],
            'durasi' => '3 Tahun / Penyesuaian Riwayat Belajar',
            'keunggulan' => [
                'Ijazah resmi negara yang diakui pemerintah dan Dapodik Kemdikbudristek',
                'Metode belajar kombinasi tatap muka berkala dan modul mandiri yang ramah waktu',
                'Dibimbing oleh tutor yang berdedikasi dan berpengalaman',
                'Biaya pendidikan terjangkau dan didukung program BOSP/BOP Kesetaraan',
            ],
            'prospek_lulusan' => 'Lulusan berhak melanjutkan pendidikan ke jenjang Paket C, SMA, SMK, Madrasah Aliyah negeri maupun swasta, serta meningkatkan kualifikasi administrasi pekerjaan.',
            'foto' => '/images/kegiatan/pembelajaran-tatap-muka-1.jpg',
            'urutan' => 1,
            'is_active' => true,
        ]);

        Program::create([
            'kode' => 'paket-c',
            'nama' => 'Pendidikan Kesetaraan Paket C',
            'jenjang' => 'Setara SMA / MA',
            'tagline' => 'Raih Ijazah Setara SMA untuk Kuliah, Karier, dan Masa Depan Gemilang',
            'deskripsi' => 'Program pendidikan kesetaraan Paket C diperuntukkan bagi lulusan SMP/MTs/Paket B yang ingin memiliki ijazah setara SMA. Program ini dirancang fleksibel sehingga sangat cocok bagi usia sekolah, pekerja, atlet, santri, wirausahawan, maupun orang dewasa yang ingin menuntaskan jenjang pendidikan 12 tahun.',
            'persyaratan' => [
                'Fotokopi Ijazah SMP/MTs/Paket B atau Surat Keterangan Lulus / Rapor lanjutan',
                'Fotokopi Kartu Keluarga (KK)',
                'Fotokopi KTP / Akta Kelahiran',
                'Pas foto berwarna ukuran 3x4 (3 lembar)',
                'Mengisi formulir pendaftaran resmi PKBM AL-QUDWAH',
            ],
            'kurikulum' => [
                'Pendidikan Agama dan Budi Pekerti',
                'Pendidikan Pancasila dan Kewarganegaraan (PPKn)',
                'Bahasa Indonesia dan Bahasa Inggris',
                'Matematika',
                'Kelompok Peminatan Ilmu Sosial (Sosiologi, Geografi, Ekonomi, Sejarah)',
                'Literasi Digital dan Keterampilan Komputer',
                'Kewirausahaan dan Keterampilan Terapan Daerah',
            ],
            'durasi' => '3 Tahun / Penyesuaian Riwayat Belajar',
            'keunggulan' => [
                'Ijazah sah dan legal bernomor seri nasional yang diakui untuk mendaftar Kuliah PTN/PTS, Seleksi CPNS, TNI, POLRI, BUMN, dan Karyawan Swasta',
                'Waktu belajar terjadwal yang tidak mengganggu jam kerja atau aktivitas harian',
                'Tersedia bimbingan literasi digital dan persiapan ujian kesetaraan berbasis komputer (CBT)',
                'Lingkungan belajar yang hangat, suportif, dan kekeluargaan',
            ],
            'prospek_lulusan' => 'Lulusan dapat langsung mendaftar kuliah ke perguruan tinggi (PTN/PTS) baik reguler maupun kelas karyawan, mendaftar ke instansi kedinasan, seleksi ASN/TNI/Polri, serta syarat kenaikan jabatan.',
            'foto' => '/images/kegiatan/pembelajaran-digital-laptop.jpg',
            'urutan' => 2,
            'is_active' => true,
        ]);

        // 4. Tutors & Staff (21 Personil Asli dari File Biodata Resmi)
        Tutor::truncate();
        $tutorsData = [
            [
                'nama' => 'Elis Masridah',
                'jabatan' => 'Kepala PKBM',
                'kategori' => 'Pimpinan & Pengelola',
                'nuptk' => '018/YAHC/PTG-kep/II/2024',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1987-03-06',
                'email' => 'elismarsidah@gmail.com',
                'no_hp' => '085722499957',
                'bio' => 'Kepala PKBM AL QUDWAH yang memimpin dan membina seluruh kegiatan operasional akademik dan kelembagaan.',
                'foto' => '/images/tutor/dewan-tutor-1.jpg',
                'urutan' => 1,
            ],
            [
                'nama' => 'Muhammad Gagas S.B, S.T',
                'jabatan' => 'Operator Sekolah & Wali Kelas',
                'kategori' => 'Staf IT & Administrasi',
                'nuptk' => '025/SK/PKBM-AQ/VII/2024',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '2003-06-14',
                'email' => 'gagassastra12345@gmail.com',
                'no_hp' => '085864183271',
                'bio' => 'Pengelola sistem informasi, data pokok pendidikan (Dapodik), teknologi digital, serta wali kelas di PKBM AL QUDWAH.',
                'foto' => '/images/tutor/dewan-tutor-2.jpg',
                'urutan' => 2,
            ],
            [
                'nama' => 'Ropiul Anwar',
                'jabatan' => 'Guru & Bendahara BOP/BOS',
                'kategori' => 'Pimpinan & Pengelola',
                'nuptk' => '016/SK-WK-S/PKBM-AQ/VI/2025',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '2006-08-02',
                'email' => 'ropiulanwar3615@gmail.com',
                'no_hp' => '085624782594',
                'bio' => 'Tenaga pendidik dan pengelola keuangan serta administrasi BOP kesetaraan PKBM AL QUDWAH.',
                'foto' => null,
                'urutan' => 3,
            ],
            [
                'nama' => 'Asep Saepudin Pratama',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '819438557406000',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1997-07-01',
                'email' => 'asepsaepudinpratama@gmail.com',
                'no_hp' => '081573402663',
                'bio' => 'Tutor mata pelajaran kesetaraan yang berdedikasi tinggi membimbing warga belajar.',
                'foto' => null,
                'urutan' => 4,
            ],
            [
                'nama' => 'Asep Supriatna, S.H.',
                'jabatan' => 'Tutor / Guru Pendidikan Kewarganegaraan & Hukum',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '026/SK/PKBM-AQ/VII/2024',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1978-05-10',
                'email' => 'asepsupriatna40@gmail.com',
                'no_hp' => '085885553037',
                'bio' => 'Sarjana Hukum dan tutor PPKn berpengalaman membina pemahaman kebangsaan warga belajar.',
                'foto' => null,
                'urutan' => 5,
            ],
            [
                'nama' => 'Ayi Mulyadi',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '018/SK-WK-S/PKBM-AQ/VI/2025',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Sukabumi',
                'tanggal_lahir' => '1995-06-04',
                'email' => 'ayiixb@gmail.com',
                'no_hp' => '085816869363',
                'bio' => 'Tutor pendamping warga belajar Paket B dan Paket C.',
                'foto' => null,
                'urutan' => 6,
            ],
            [
                'nama' => 'Dede Arifan',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '814.1/130.a/SMPN 1 CAMPAKA/2024',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '2003-07-25',
                'email' => 'dedearifan69@gmail.com',
                'no_hp' => '085797837431',
                'bio' => 'Tutor muda aktif yang membina mata pelajaran sains dan matematika terapan.',
                'foto' => null,
                'urutan' => 7,
            ],
            [
                'nama' => 'Dede Rohayati',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '469.5/002/YASDIKUZ-SK-GTY/VI/2024',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1977-07-13',
                'email' => 'Dhedeerohayati07@gmail.com',
                'no_hp' => '085703348805',
                'bio' => 'Tutor senior berjiwa keibuan yang membimbing warga belajar dengan sabar dan telaten.',
                'foto' => null,
                'urutan' => 8,
            ],
            [
                'nama' => 'Dindin Diana',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '6642762663200012',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1984-03-10',
                'email' => 'dianadindin33@gmail.com',
                'no_hp' => '083112596884',
                'bio' => 'Tutor bersertifikasi dengan pengalaman luas di dunia pendidikan dasar dan menengah.',
                'foto' => null,
                'urutan' => 9,
            ],
            [
                'nama' => 'Helen Angelina Gunawan',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '003/SPKS-KB.MWR/YMPN/VII/2023',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '2003-08-16',
                'email' => 'helen.mwr.cpk@gmail.com',
                'no_hp' => '085649481322',
                'bio' => 'Tutor energik yang aktif membimbing kegiatan pembelajaran interaktif.',
                'foto' => null,
                'urutan' => 10,
            ],
            [
                'nama' => 'Ijah Hodijah',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '421.2/005/SK-PAUD/Kec/IV/2017',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1986-01-08',
                'email' => 'ijahdahliasatu@mailnesia.com',
                'no_hp' => '085863208052',
                'bio' => 'Tutor berpengalaman dalam pembinaan karakter dan pembelajaran sosial.',
                'foto' => null,
                'urutan' => 11,
            ],
            [
                'nama' => 'Linda Ruhwina Fauziah',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '4847778679230172',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '2000-05-15',
                'email' => 'linda.ruhwina6@guru.sd.belajar.id',
                'no_hp' => '085780114518',
                'bio' => 'Tutor bersertifikat Kemdikbud yang piawai dalam penyampaian materi kurikulum merdeka.',
                'foto' => null,
                'urutan' => 12,
            ],
            [
                'nama' => 'M. Alpin Rivaldi',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '024/SK/PKBM-AQ/VII/2024',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '2004-10-01',
                'email' => 'alpinripaldi715@gmail.com',
                'no_hp' => '085885553037',
                'bio' => 'Tutor muda bersemangat dalam pendampingan belajar dan kepemudaan.',
                'foto' => null,
                'urutan' => 13,
            ],
            [
                'nama' => 'Mira Nurjayanti',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '0454767667210022',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Sukabumi',
                'tanggal_lahir' => '1989-01-22',
                'email' => 'miranurjayanti123@gmail.com',
                'no_hp' => '085861977737',
                'bio' => 'Tutor mata pelajaran bahasa dan literasi dengan dedikasi tinggi.',
                'foto' => null,
                'urutan' => 14,
            ],
            [
                'nama' => 'Neneng Romilah',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '728757329406000',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1991-08-20',
                'email' => 'nenkromi92@gmail.com',
                'no_hp' => '085624917332',
                'bio' => 'Tutor yang aktif dalam pendampingan kegiatan keagamaan dan sosial kemasyarakatan.',
                'foto' => null,
                'urutan' => 15,
            ],
            [
                'nama' => 'Nia Rahmawati Ansari',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '469.5/002/YASDIKUZ-SK-GTY/VI/2024',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1999-02-14',
                'email' => 'niaansari14@gmail.com',
                'no_hp' => '085703348805',
                'bio' => 'Tutor mata pelajaran sosial dan humaniora yang inspiratif.',
                'foto' => null,
                'urutan' => 16,
            ],
            [
                'nama' => 'Pepep Jalaludin',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '421/0025/PKBM-AH/V/202',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1983-06-15',
                'email' => 'abyjalal1983@gmail.com',
                'no_hp' => '08156167060',
                'bio' => 'Tutor senior dengan komitmen membimbing masyarakat pedesaan.',
                'foto' => null,
                'urutan' => 17,
            ],
            [
                'nama' => 'Quratul Nabila Tsania',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '469.5/002/YASDIKUZ-SK-GTY/VI/2024',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '2003-05-05',
                'email' => 'quratulnabilatsania@gmail.com',
                'no_hp' => '085885553037',
                'bio' => 'Tutor ramah yang berfokus pada pendampingan belajar kelompok warga belajar.',
                'foto' => null,
                'urutan' => 18,
            ],
            [
                'nama' => 'Riska Amelia',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '4145776677230033',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1998-08-13',
                'email' => 'ameliariska1308@gmail.com',
                'no_hp' => '08156079808',
                'bio' => 'Tutor berpengalaman di bidang administrasi dan pengajaran terpadu.',
                'foto' => null,
                'urutan' => 19,
            ],
            [
                'nama' => 'Siti Nurhasanah Habibah, M.Pd.',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '469.5/002/YASDIKUZ-SK-GTY/VI/2024',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '1998-05-17',
                'email' => 'syairpecinta2@gmail.com',
                'no_hp' => '085703348805',
                'bio' => 'Magister Pendidikan yang membina mutu akademik serta metodologi pengajaran inovatif di PKBM AL QUDWAH.',
                'foto' => null,
                'urutan' => 20,
            ],
            [
                'nama' => 'Suci Putri Pratiwi',
                'jabatan' => 'Tutor / Guru',
                'kategori' => 'Tutor & Guru',
                'nuptk' => '022/SK-WK-S/PKBM-AQ/VI/2025',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '2007-01-10',
                'email' => 'suciput12345@gmail.com',
                'no_hp' => '085860322853',
                'bio' => 'Tutor muda yang mendampingi bimbingan belajar dan kreativitas peserta didik.',
                'foto' => null,
                'urutan' => 21,
            ],
        ];

        foreach ($tutorsData as $tutor) {
            Tutor::create($tutor);
        }

        // 5. Posts (Berita & Kegiatan Berdasarkan Dokumentasi Nyata Foto PKBM)
        Post::truncate();
        $postsData = [
            [
                'title' => 'Kegiatan Upacara dan Kepramukaan Warga Belajar PKBM AL-QUDWAH Tumbuhkan Jiwa Disiplin dan Nasionalisme',
                'slug' => 'kegiatan-upacara-dan-kepramukaan-warga-belajar-pkbm-al-qudwah',
                'category' => 'Kegiatan',
                'summary' => 'PKBM AL-QUDWAH menyelenggarakan kegiatan kepramukaan dan upacara bendera bersama seluruh warga belajar di halaman sekolah untuk menanamkan kedisiplinan dan rasa cinta tanah air.',
                'content' => '<p>Pendidikan karakter merupakan salah satu pilar utama yang terus dibangun di lingkungan PKBM AL-QUDWAH. Sebagai wujud nyata dari pembinaan tersebut, PKBM AL-QUDWAH menyelenggarakan kegiatan upacara dan latihan kepramukaan yang diikuti oleh seluruh warga belajar program Paket B dan Paket C di halaman sekolah Kp. Ciwalen, Desa Cidadap, Kecamatan Campaka.</p><p>Kegiatan ini dipandu langsung oleh dewan tutor dengan penuh khidmat. Dalam amanatnya, pihak pengelola PKBM menekankan bahwa pendidikan kesetaraan tidak hanya berfokus pada kelulusan akademik, tetapi juga membentuk mentalitas yang tangguh, berbudi pekerti luhur, dan memiliki rasa nasionalisme tinggi.</p><p>Para peserta didik tampak antusias dan tertib mengikuti seluruh rangkaian kegiatan dari penghormatan bendera merah putih hingga materi dasar kepramukaan dan kerja sama regu. Melalui kegiatan ini, diharapkan tali persaudaraan antarwarga belajar semakin erat serta terbangun rasa percaya diri yang kuat.</p>',
                'featured_image' => '/images/kegiatan/upacara-pramuka.jpg',
                'author_id' => $admin->id,
                'views' => 142,
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Pelaksanaan Pembelajaran Tatap Muka dan Bimbingan Modul Paket B dan Paket C',
                'slug' => 'pelaksanaan-pembelajaran-tatap-muka-dan-bimbingan-modul-paket-b-dan-paket-c',
                'category' => 'Kegiatan',
                'summary' => 'Kegiatan bimbingan belajar tatap muka berkala berlangsung kondusif dan penuh antusiasme, membantu warga belajar memahami materi modul kesetaraan secara mendalam.',
                'content' => '<p>Dalam rangka memastikan capaian kompetensi pembelajaran berjalan optimal, PKBM AL-QUDWAH secara konsisten menggelar bimbingan tatap muka berkala bagi para warga belajar Paket B (setara SMP) dan Paket C (setara SMA). Bimbingan ini disesuaikan dengan kurikulum kesetaraan yang menekankan pemahaman kontekstual dan aplikatif.</p><p>Dalam suasana belajar yang nyaman dan kekeluargaan, para tutor mendampingi peserta didik membahas rangkuman materi modul, tanya-jawab seputar materi yang dianggap sulit, serta diskusi kelompok. Model pembelajaran ini sangat membantu terutama bagi warga belajar yang memiliki kesibukan kerja pada hari-hari kerja biasa.</p><p>Kepala PKBM AL-QUDWAH, Ibu Elis Masridah, menyampaikan apresiasi atas semangat belajar para peserta. "Meskipun sebagian besar warga belajar memiliki tanggung jawab lain di keluarga atau tempat kerja, antusiasme dan komitmen mereka untuk hadir menuntut ilmu sungguh membanggakan," tuturnya.</p>',
                'featured_image' => '/images/kegiatan/pembelajaran-tatap-muka-1.jpg',
                'author_id' => $admin->id,
                'views' => 98,
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Pemanfaatan Media Laptop dan Literasi Digital dalam Pembelajaran Warga Belajar PKBM AL-QUDWAH',
                'slug' => 'pemanfaatan-media-laptop-dan-literasi-digital-dalam-pembelajaran',
                'category' => 'Berita',
                'summary' => 'PKBM AL-QUDWAH mengintegrasikan pembelajaran berbasis teknologi dan literasi digital guna membekali warga belajar dengan kecakapan abad 21.',
                'content' => '<p>Menghadapi era transformasi digital, PKBM AL-QUDWAH terus berinovasi dalam metode pembelajaran dengan menghadirkan pengenalan dan pemanfaatan media komputer dan laptop bagi para warga belajar. Kegiatan ini bertujuan untuk meningkatkan keterampilan literasi digital yang kini menjadi kebutuhan mendasar di dunia kerja maupun kehidupan bermasyarakat.</p><p>Dalam sesi praktik ini, warga belajar dibimbing langsung oleh Operator Sekolah & IT, Muhammad Gagas S.B, S.T, untuk mengenal pengoperasian dasar komputer, pencarian referensi belajar berbasis internet sehat, serta simulasi pengisian asesmen berbasis komputer.</p><p>Dengan keterampilan digital ini, diharapkan lulusan PKBM AL-QUDWAH tidak hanya mengantongi ijazah formal setara SMP atau SMA, tetapi juga memiliki kepercayaan diri tinggi dalam memanfaatkan teknologi secara produktif dan positif.</p>',
                'featured_image' => '/images/kegiatan/pembelajaran-digital-laptop.jpg',
                'author_id' => $admin->id,
                'views' => 125,
                'is_published' => true,
                'published_at' => now()->subDays(18),
            ],
            [
                'title' => 'Rapat Koordinasi dan Peningkatan Kapasitas Dewan Tutor PKBM AL-QUDWAH Menyongsong Tahun Ajaran Baru',
                'slug' => 'rapat-koordinasi-dan-peningkatan-kapasitas-dewan-tutor',
                'category' => 'Pengumuman',
                'summary' => 'Dewan Tutor dan pengelola PKBM AL-QUDWAH melaksanakan pertemuan koordinasi berkala guna mematangkan strategi kurikulum dan pelayanan administrasi peserta didik.',
                'content' => '<p>Kualitas layanan sebuah lembaga pendidikan berakar dari soliditas dan profesionalitas para pendidiknya. Guna memperkuat komitmen tersebut, seluruh jajaran tutor dan pengelola PKBM AL-QUDWAH menyelenggarakan rapat evaluasi dan koordinasi berkala.</p><p>Pertemuan ini membahas pembaruan modul ajar kesetaraan, standarisasi penilaian pembelajaran, pemutakhiran data Dapodik, serta sinkronisasi jadwal bimbingan tatap muka dengan modul daring.</p><p>Melalui semangat kebersamaan ini, PKBM AL-QUDWAH terus berbenah memberikan pelayanan pendidikan nonformal yang inklusif, ramah, dan transparan bagi masyarakat di wilayah Kecamatan Campaka dan Kabupaten Cianjur pada umumnya.</p>',
                'featured_image' => '/images/tutor/dewan-tutor-1.jpg',
                'author_id' => $admin->id,
                'views' => 74,
                'is_published' => true,
                'published_at' => now()->subDays(25),
            ],
            [
                'title' => 'Penerimaan Warga Belajar Baru (PWBB) Program Kesetaraan Paket B dan Paket C Resmi Dibuka',
                'slug' => 'penerimaan-warga-belajar-baru-pwbb-paket-b-dan-paket-c-resmi-dibuka',
                'category' => 'Pengumuman',
                'summary' => 'PKBM AL-QUDWAH kembali membuka pendaftaran bagi calon warga belajar baru untuk program Paket B (setara SMP) dan Paket C (setara SMA) dengan syarat mudah dan bimbingan fleksibel.',
                'content' => '<p>Kabar gembira bagi masyarakat luas yang ingin melanjutkan dan menuntaskan pendidikan formal yang sempat tertunda. PKBM AL-QUDWAH mengumumkan pembukaan Penerimaan Warga Belajar Baru (PWBB) untuk Tahun Ajaran berjalan pada program unggulan Pendidikan Kesetaraan Paket B (setara SMP) dan Paket C (setara SMA).</p><p>Pendaftaran terbuka untuk semua kalangan tanpa batas usia. Persyaratan pendaftaran cukup dengan menyerahkan fotokopi ijazah jenjang sebelumnya (SD untuk Paket B, SMP untuk Paket C), fotokopi Kartu Keluarga (KK), KTP/Akta Lahir, dan pas foto terbaru.</p><p>Bagi calon peserta yang berlokasi jauh atau memiliki kesibukan, PKBM AL-QUDWAH juga menyediakan fasilitas pendaftaran online melalui website resmi ini atau menghubungi layanan konsultasi via WhatsApp resmi di 0858-6418-3271.</p>',
                'featured_image' => '/images/hero/hero-warga-belajar-tutor.jpg',
                'author_id' => $admin->id,
                'views' => 210,
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($postsData as $post) {
            Post::create($post);
        }

        // 6. Galleries (Menggunakan Foto Nyata Folder Referensi)
        Gallery::truncate();
        $galleriesData = [
            [
                'title' => 'Upacara dan Latihan Kepramukaan Warga Belajar',
                'category' => 'Upacara & Kepramukaan',
                'image_path' => '/images/kegiatan/upacara-pramuka.jpg',
                'caption' => 'Penghormatan bendera merah putih dan pembinaan kedisiplinan warga belajar di halaman sekolah.',
                'event_date' => '2026-09-15',
                'urutan' => 1,
            ],
            [
                'title' => 'Sesi Pembelajaran Tatap Muka & Bimbingan Belajar',
                'category' => 'Kegiatan Pembelajaran',
                'image_path' => '/images/kegiatan/pembelajaran-tatap-muka-1.jpg',
                'caption' => 'Suasana bimbingan tatap muka antara tutor dan warga belajar Paket B & Paket C.',
                'event_date' => '2026-09-20',
                'urutan' => 2,
            ],
            [
                'title' => 'Praktik Literasi Digital dan Media Komputer',
                'category' => 'Kegiatan Pembelajaran',
                'image_path' => '/images/kegiatan/pembelajaran-digital-laptop.jpg',
                'caption' => 'Warga belajar berlatih mengoperasikan perangkat digital dan menyelesaikan modul.',
                'event_date' => '2026-09-22',
                'urutan' => 3,
            ],
            [
                'title' => 'Diskusi Belajar dan Penguatan Modul Kesetaraan',
                'category' => 'Kegiatan Pembelajaran',
                'image_path' => '/images/kegiatan/diskusi-belajar-wb.jpg',
                'caption' => 'Warga belajar saling bertukar pikiran dan mendalami materi pelajaran.',
                'event_date' => '2026-09-25',
                'urutan' => 4,
            ],
            [
                'title' => 'Foto Bersama Warga Belajar dan Dewan Tutor',
                'category' => 'Warga Belajar & Kebersamaan',
                'image_path' => '/images/hero/hero-warga-belajar-tutor.jpg',
                'caption' => 'Kebersamaan hangat antara pengelola, dewan tutor, dan warga belajar PKBM AL-QUDWAH di lingkungan sekolah.',
                'event_date' => '2026-10-01',
                'urutan' => 5,
            ],
            [
                'title' => 'Kebersamaan Seluruh Civitas PKBM AL QUDWAH',
                'category' => 'Warga Belajar & Kebersamaan',
                'image_path' => '/images/kegiatan/kebersamaan-wb-tutor.jpg',
                'caption' => 'Dokumentasi kekeluargaan civitas akademika PKBM AL QUDWAH berlatar panorama alam asri Campaka.',
                'event_date' => '2026-10-05',
                'urutan' => 6,
            ],
            [
                'title' => 'Keluarga Besar Dewan Tutor PKBM AL-QUDWAH',
                'category' => 'Dewan Tutor & Pengelola',
                'image_path' => '/images/tutor/dewan-tutor-1.jpg',
                'caption' => 'Kompak dan berdedikasi: Dewan tutor PKBM AL-QUDWAH dalam seragam nuansa biru institusi.',
                'event_date' => '2026-10-01',
                'urutan' => 7,
            ],
            [
                'title' => 'Kemitraan dan Silaturahmi Pengelola PKBM AL-QUDWAH',
                'category' => 'Dewan Tutor & Pengelola',
                'image_path' => '/images/tutor/dewan-tutor-2.jpg',
                'caption' => 'Pertemuan silaturahmi dan koordinasi pimpinan serta tutor PKBM AL-QUDWAH.',
                'event_date' => '2026-10-01',
                'urutan' => 8,
            ],
            [
                'title' => 'Sesi Pendalaman Materi dan Ujian Mandiri',
                'category' => 'Kegiatan Pembelajaran',
                'image_path' => '/images/kegiatan/pembelajaran-tatap-muka-2.jpg',
                'caption' => 'Konsentrasi warga belajar saat mengerjakan tugas terstruktur di kelas kesetaraan.',
                'event_date' => '2026-10-10',
                'urutan' => 9,
            ],
            [
                'title' => 'Dokumentasi Sertifikat Biodata Resmi Kemdikbud',
                'category' => 'Dokumen Lembaga',
                'image_path' => '/images/dokumen/biodata-sekolah.png',
                'caption' => 'Bukti identitas resmi NPSN P9998654 dan legalitas operasional PKBM AL QUDWAH.',
                'event_date' => '2024-10-02',
                'urutan' => 10,
            ],
        ];

        foreach ($galleriesData as $gal) {
            Gallery::create($gal);
        }

        // 7. Initial Sample Registration & Contact
        $paketC = Program::where('kode', 'paket-c')->first();
        if ($paketC) {
            Registration::create([
                'nomor_pendaftaran' => 'REG-2026-0001',
                'nama_lengkap' => 'Ahmad Fauzi',
                'nik' => '3203151203010005',
                'nisn' => '0012345678',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Cianjur',
                'tanggal_lahir' => '2001-03-12',
                'agama' => 'Islam',
                'program_id' => $paketC->id,
                'alamat' => 'Kp. Sukamaju RT 02 RW 03',
                'desa' => 'Cidadap',
                'kecamatan' => 'Campaka',
                'kabupaten' => 'Cianjur',
                'no_hp' => '085712345678',
                'email' => 'ahmadfauzi@example.com',
                'pendidikan_terakhir' => 'SMP / MTs',
                'nama_wali' => 'H. Maman',
                'pekerjaan_wali' => 'Petani / Wiraswasta',
                'alasan_mendaftar' => 'Ingin mendapatkan ijazah SMA untuk syarat melanjutkan kuliah dan kemajuan kerja.',
                'status' => 'diverifikasi',
                'catatan_admin' => 'Dokumen fotokopi ijazah dan KK telah lengkap.',
            ]);
        }

        ContactMessage::create([
            'name' => 'Bapak Rahmat',
            'email' => 'rahmat.cianjur@gmail.com',
            'phone' => '081298765432',
            'subject' => 'Informasi Pendaftaran Paket C untuk Karyawan',
            'message' => 'Selamat siang admin PKBM AL-QUDWAH, saya ingin menanyakan jadwal belajar Paket C apakah fleksibel untuk yang sedang bekerja shift? Terima kasih.',
            'is_read' => true,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
