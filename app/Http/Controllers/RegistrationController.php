<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)->orderBy('urutan')->get();
        return view('pages.registration', compact('programs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'nullable|string|max:20',
            'nisn' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable|string|max:50',
            'program_id' => 'required|exists:programs,id',
            'alamat' => 'required|string',
            'desa' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'pendidikan_terakhir' => 'nullable|string|max:100',
            'nama_wali' => 'nullable|string|max:255',
            'pekerjaan_wali' => 'nullable|string|max:100',
            'alasan_mendaftar' => 'nullable|string',
        ]);

        $year = date('Y');
        $count = Registration::whereYear('created_at', $year)->count() + 1;
        $nomorPendaftaran = 'REG-' . $year . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);

        $validated['nomor_pendaftaran'] = $nomorPendaftaran;
        $validated['status'] = 'baru';

        $registration = Registration::create($validated);

        return redirect()->route('pendaftaran.success', ['nomor' => $nomorPendaftaran])
            ->with('success', 'Pendaftaran Anda berhasil dikirim! Silakan simpan nomor pendaftaran Anda.');
    }

    public function success(string $nomor)
    {
        $registration = Registration::with('program')->where('nomor_pendaftaran', $nomor)->firstOrFail();
        return view('pages.registration-success', compact('registration'));
    }
}
