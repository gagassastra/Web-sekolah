<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('urutan')->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'nullable|string|max:50|unique:programs,kode',
            'jenjang' => 'required|string|max:100',
            'tagline' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan_text' => 'nullable|string',
            'kurikulum_text' => 'nullable|string',
            'keunggulan_text' => 'nullable|string',
            'durasi' => 'nullable|string|max:100',
            'prospek_lulusan' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if (empty($validated['kode'])) {
            $validated['kode'] = Str::slug($validated['nama']);
        }

        if (!empty($validated['persyaratan_text'])) {
            $validated['persyaratan'] = array_values(array_filter(array_map('trim', explode("\n", $validated['persyaratan_text']))));
        }
        if (!empty($validated['kurikulum_text'])) {
            $validated['kurikulum'] = array_values(array_filter(array_map('trim', explode("\n", $validated['kurikulum_text']))));
        }
        if (!empty($validated['keunggulan_text'])) {
            $validated['keunggulan'] = array_values(array_filter(array_map('trim', explode("\n", $validated['keunggulan_text']))));
        }

        unset($validated['persyaratan_text'], $validated['kurikulum_text'], $validated['keunggulan_text']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('programs', 'public');
            $validated['foto'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['urutan'] = $validated['urutan'] ?? 1;

        Program::create($validated);

        return redirect()->route('admin.programs.index')->with('success', 'Program pendidikan berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:programs,kode,' . $program->id,
            'jenjang' => 'required|string|max:100',
            'tagline' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan_text' => 'nullable|string',
            'kurikulum_text' => 'nullable|string',
            'keunggulan_text' => 'nullable|string',
            'durasi' => 'nullable|string|max:100',
            'prospek_lulusan' => 'nullable|string',
            'urutan' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if (!empty($validated['persyaratan_text'])) {
            $validated['persyaratan'] = array_values(array_filter(array_map('trim', explode("\n", $validated['persyaratan_text']))));
        }
        if (!empty($validated['kurikulum_text'])) {
            $validated['kurikulum'] = array_values(array_filter(array_map('trim', explode("\n", $validated['kurikulum_text']))));
        }
        if (!empty($validated['keunggulan_text'])) {
            $validated['keunggulan'] = array_values(array_filter(array_map('trim', explode("\n", $validated['keunggulan_text']))));
        }

        unset($validated['persyaratan_text'], $validated['kurikulum_text'], $validated['keunggulan_text']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('programs', 'public');
            $validated['foto'] = '/storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['urutan'] = $validated['urutan'] ?? $program->urutan;

        $program->update($validated);

        return redirect()->route('admin.programs.index')->with('success', 'Program pendidikan berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        if ($program->registrations()->exists()) {
            return back()->with('error', 'Program tidak dapat dihapus karena sudah memiliki data pendaftaran terkait.');
        }

        $program->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program pendidikan berhasil dihapus.');
    }
}
