<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $query = Registration::with('program');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('program_id')) {
            $query->where('program_id', $request->program_id);
        }

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nomor_pendaftaran', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $registrations = $query->latest()->paginate(15)->withQueryString();
        $programs = Program::all();
        $statusCounts = [
            'semua' => Registration::count(),
            'baru' => Registration::where('status', 'baru')->count(),
            'diverifikasi' => Registration::where('status', 'diverifikasi')->count(),
            'diterima' => Registration::where('status', 'diterima')->count(),
            'ditolak' => Registration::where('status', 'ditolak')->count(),
        ];

        return view('admin.registrations.index', compact('registrations', 'programs', 'statusCounts'));
    }

    public function show(Registration $registration)
    {
        $registration->load('program');
        return view('admin.registrations.show', compact('registration'));
    }

    public function updateStatus(Request $request, Registration $registration)
    {
        $validated = $request->validate([
            'status' => 'required|in:baru,diverifikasi,diterima,ditolak',
            'catatan_admin' => 'nullable|string',
        ]);

        $registration->update($validated);

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.registrations.index')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
