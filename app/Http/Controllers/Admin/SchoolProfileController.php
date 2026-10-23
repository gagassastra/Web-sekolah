<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolProfileController extends Controller
{
    public function edit()
    {
        $profile = SchoolProfile::firstOrCreate([], [
            'nama_sekolah' => 'PKBM AL QUDWAH',
            'npsn' => 'P9998654',
            'bentuk_pendidikan' => 'PKBM (Pendidikan Kesetaraan)',
            'status_sekolah' => 'Swasta',
            'alamat' => 'Kp. Ciwalen Rt. 003 Rw. 004',
            'desa' => 'Cidadap',
            'kecamatan' => 'Kec. Campaka',
            'kabupaten' => 'Kab. Cianjur',
            'provinsi' => 'Prov. Jawa Barat',
            'kode_pos' => '43263',
        ]);

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = SchoolProfile::firstOrFail();

        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'required|string|max:50',
            'bentuk_pendidikan' => 'required|string|max:100',
            'status_sekolah' => 'required|string|max:50',
            'sk_pendirian' => 'nullable|string|max:100',
            'tanggal_sk_pendirian' => 'nullable|date',
            'sk_izin_operasional' => 'nullable|string|max:100',
            'tanggal_sk_izin' => 'nullable|date',
            'alamat' => 'required|string|max:255',
            'desa' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:20',
            'telepon' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'jam_layanan' => 'nullable|string|max:100',
            'kepala_sekolah' => 'required|string|max:100',
            'sambutan_kepala' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi_text' => 'nullable|string',
            'tujuan_text' => 'nullable|string',
            'maps_embed' => 'nullable|string',
            'foto_kepala' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'foto_gedung' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Process misi and tujuan from newline separated textarea
        if (!empty($validated['misi_text'])) {
            $validated['misi'] = array_values(array_filter(array_map('trim', explode("\n", $validated['misi_text']))));
        }
        if (!empty($validated['tujuan_text'])) {
            $validated['tujuan'] = array_values(array_filter(array_map('trim', explode("\n", $validated['tujuan_text']))));
        }

        unset($validated['misi_text'], $validated['tujuan_text']);

        if ($request->hasFile('foto_kepala')) {
            $path = $request->file('foto_kepala')->store('profile', 'public');
            $validated['foto_kepala'] = '/storage/' . $path;
        }

        if ($request->hasFile('foto_gedung')) {
            $path = $request->file('foto_gedung')->store('profile', 'public');
            $validated['foto_gedung'] = '/storage/' . $path;
        }

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('profile', 'public');
            $validated['logo_path'] = '/storage/' . $path;
        }

        $profile->update($validated);

        return redirect()->route('admin.profile.edit')->with('success', 'Profil lembaga PKBM AL-QUDWAH berhasil diperbarui.');
    }
}
