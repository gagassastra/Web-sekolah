<?php

namespace App\Providers;

use App\Models\SchoolProfile;
use App\Models\ContactMessage;
use App\Models\Registration;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();

        try {
            if (Schema::hasTable('school_profiles')) {
                $schoolProfile = SchoolProfile::first();
                View::share('schoolProfile', $schoolProfile);
            }
            if (Schema::hasTable('contact_messages') && Schema::hasTable('registrations')) {
                View::composer(['layouts.admin', 'admin.*'], function ($view) {
                    $unreadMessages = ContactMessage::where('is_read', false)->count();
                    $newRegistrations = Registration::where('status', 'baru')->count();
                    $view->with('unreadMessagesCount', $unreadMessages)
                         ->with('newRegistrationsCount', $newRegistrations);
                });
            }
        } catch (\Throwable $e) {
            // Silently ignore during migrations/build
        }
    }
}
