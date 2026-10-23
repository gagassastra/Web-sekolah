<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use App\Models\Program;
use App\Models\SchoolProfile;
use App\Models\Tutor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = SchoolProfile::first();
        $programs = Program::where('is_active', true)->orderBy('urutan')->get();
        $latestPosts = Post::published()->take(3)->get();
        $galleries = Gallery::orderBy('urutan')->take(6)->get();
        $tutorsCount = Tutor::where('is_active', true)->count();
        $leadTutors = Tutor::where('is_active', true)->orderBy('urutan')->take(4)->get();

        return view('pages.home', compact(
            'profile',
            'programs',
            'latestPosts',
            'galleries',
            'tutorsCount',
            'leadTutors'
        ));
    }
}
