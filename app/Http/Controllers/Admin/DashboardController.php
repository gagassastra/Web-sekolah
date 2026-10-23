<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Program;
use App\Models\Registration;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'total_galleries' => Gallery::count(),
            'total_tutors' => Tutor::count(),
            'total_programs' => Program::count(),
            'total_registrations' => Registration::count(),
            'new_registrations' => Registration::where('status', 'baru')->count(),
            'verified_registrations' => Registration::where('status', 'diverifikasi')->count(),
            'accepted_registrations' => Registration::where('status', 'diterima')->count(),
            'total_messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
            'total_users' => User::count(),
        ];

        $recentRegistrations = Registration::with('program')->latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentPosts = Post::latest()->take(4)->get();
        $examUrl = env('EXAM_APP_URL', 'https://sistem-ujian.pkbmalqudwah.id/');

        return view('admin.dashboard', compact(
            'stats',
            'recentRegistrations',
            'recentMessages',
            'recentPosts',
            'examUrl'
        ));
    }
}
