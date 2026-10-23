<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::where('is_active', true)->orderBy('urutan')->get();
        return view('pages.programs', compact('programs'));
    }

    public function show(string $kode)
    {
        $program = Program::where('kode', $kode)->where('is_active', true)->firstOrFail();
        $otherPrograms = Program::where('id', '!=', $program->id)->where('is_active', true)->get();
        return view('pages.program-detail', compact('program', 'otherPrograms'));
    }
}
