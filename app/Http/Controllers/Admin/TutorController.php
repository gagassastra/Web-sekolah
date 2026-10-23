<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function index(Request $request)
    {
        $query = Tutor::query();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('jabatan', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $tutors = $query->orderBy('urutan')->paginate(15)->withQueryString();
        return view('admin.tutors.index', compact('tutors'));
    }

    public function create()
    {
        return view('admin.tutors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|string|in:Pimpinan & Pengelola,Tutor & Guru,Staf IT & Administrasi',
            'nuptk' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|string|in:L,P',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'email' => 'nullable|email|max:100',
            'no_hp' => 'nullable|string|max:50',
            'bio' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('tutors', 'public');
            $validated['foto'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['urutan'] = $validated['urutan'] ?? 99;

        Tutor::create($validated);

        return redirect()->route('admin.tutors.index')->with('success', 'Data tenaga pendidik berhasil ditambahkan.');
    }

    public function edit(Tutor $tutor)
    {
        return view('admin.tutors.edit', compact('tutor'));
    }

    public function update(Request $request, Tutor $tutor)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|string|in:Pimpinan & Pengelola,Tutor & Guru,Staf IT & Administrasi',
            'nuptk' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|string|in:L,P',
            'tempat_lahir' => 'nullable|string|max:100',
            'tanggal_lahir' => 'nullable|date',
            'email' => 'nullable|email|max:100',
            'no_hp' => 'nullable|string|max:50',
            'bio' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('tutors', 'public');
            $validated['foto'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['urutan'] = $validated['urutan'] ?? $tutor->urutan;

        $tutor->update($validated);

        return redirect()->route('admin.tutors.index')->with('success', 'Data tenaga pendidik berhasil diperbarui.');
    }

    public function destroy(Tutor $tutor)
    {
        $tutor->delete();
        return redirect()->route('admin.tutors.index')->with('success', 'Data tenaga pendidik berhasil dihapus.');
    }
}
