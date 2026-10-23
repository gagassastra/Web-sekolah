<?php

use Illuminate\Support\Facades\Route;

// Public Website Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExamPortalController;
use App\Http\Controllers\AuthController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\TutorController as AdminTutorController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| Public School Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
Route::get('/profil-lembaga-pkbm', [ProfileController::class, 'index'])->name('profil');

Route::prefix('program-pendidikan')->name('programs.')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('index');
    Route::get('/{kode}', [ProgramController::class, 'show'])->name('show');
});
// Aliases for program routes
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/{kode}', [ProgramController::class, 'show'])->name('program.detail');

Route::get('/tenaga-pendidik', [TutorController::class, 'index'])->name('tutors.index');
Route::get('/tutor', [TutorController::class, 'index'])->name('tutor.index');

Route::prefix('berita-kegiatan')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{slug}', [PostController::class, 'show'])->name('show');
});
// Aliases for news routes
Route::get('/berita', [PostController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [PostController::class, 'show'])->name('berita.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri-foto', [GalleryController::class, 'index'])->name('galeri.index');

Route::prefix('informasi-pendaftaran')->name('pendaftaran.')->group(function () {
    Route::get('/', [RegistrationController::class, 'index'])->name('index');
    Route::post('/', [RegistrationController::class, 'store'])->name('store');
    Route::get('/sukses/{nomor}', [RegistrationController::class, 'success'])->name('success');
});

Route::prefix('kontak')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/', [ContactController::class, 'store'])->name('store');
});
// Aliases for contact
Route::get('/hubungi-kami', [ContactController::class, 'index'])->name('kontak.index');
Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('kontak.store');

// Portal Ujian CBT Sekolah
Route::get('/ujian-cbt', [ExamPortalController::class, 'index'])->name('exam.portal');

/*
|--------------------------------------------------------------------------
| Fallback Serve Uploaded Files
|--------------------------------------------------------------------------
| Jika symlink public/storage tidak ada di hosting (php artisan storage:link
| tidak dijalankan / tidak didukung), file upload tetap bisa ditampilkan lewat
| route ini. Bila symlink ada, web server melayani file langsung tanpa route ini.
*/
Route::get('/storage/{path}', function (string $path) {
    $root = realpath(storage_path('app/public'));
    $file = $root ? realpath($root . DIRECTORY_SEPARATOR . $path) : false;

    abort_unless(
        $file && is_file($file) && str_starts_with($file, $root . DIRECTORY_SEPARATOR),
        404
    );

    return response()->file($file, ['Cache-Control' => 'public, max-age=86400']);
})->where('path', '.*')->name('storage.fallback');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| School Information System & Admin Panel Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Profil Sekolah
    Route::get('/profil-lembaga', [SchoolProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil-lembaga', [SchoolProfileController::class, 'update'])->name('profile.update');

    // Program Pendidikan CRUD
    Route::resource('programs', AdminProgramController::class)->except(['show']);

    // Tenaga Pendidik CRUD
    Route::resource('tutors', AdminTutorController::class)->except(['show']);

    // Berita & Kegiatan CRUD
    Route::resource('posts', AdminPostController::class)->except(['show']);

    // Galeri Foto CRUD
    Route::resource('galleries', AdminGalleryController::class)->except(['show']);

    // Pendaftaran Siswa Baru
    Route::prefix('pendaftaran')->name('registrations.')->group(function () {
        Route::get('/', [AdminRegistrationController::class, 'index'])->name('index');
        Route::get('/{registration}', [AdminRegistrationController::class, 'show'])->name('show');
        Route::match(['put', 'patch'], '/{registration}/status', [AdminRegistrationController::class, 'updateStatus'])->name('status');
        Route::match(['put', 'patch'], '/{registration}/update-status', [AdminRegistrationController::class, 'updateStatus'])->name('update_status');
        Route::delete('/{registration}', [AdminRegistrationController::class, 'destroy'])->name('destroy');
    });

    // Pesan Kontak Masuk
    Route::prefix('pesan')->name('messages.')->group(function () {
        Route::get('/', [AdminContactMessageController::class, 'index'])->name('index');
        Route::get('/{message}', [AdminContactMessageController::class, 'show'])->name('show');
        Route::patch('/{message}/read', [AdminContactMessageController::class, 'markAsRead'])->name('read');
        Route::delete('/{message}', [AdminContactMessageController::class, 'destroy'])->name('destroy');
    });

    // Pengelolaan Pengguna (Admin)
    Route::resource('users', AdminUserController::class)->except(['show']);
});
