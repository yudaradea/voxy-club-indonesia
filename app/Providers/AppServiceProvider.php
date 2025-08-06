<?php

namespace App\Providers;

use App\Models\Review;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Responses\LogoutResponse;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Carbon::setLocale('id');
        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
        require_once app_path('Helpers/helpers.php');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view) {
            $reviews = Review::orderBy('created_at', 'desc')->get();
            $view->with([
                'reviews' => $reviews,
            ]);
        });

        Filament::serving(function () {
            if (!Auth::check() || Auth::user()->role !== 'admin') {
                abort(403, 'Unauthorized');
            }
        });

        // agar semua pagination Livewire menulis ?page=... ke URL
        Livewire::setScriptRoute(function ($handle) {
            return Route::get('/livewire/livewire.js', $handle);
        });
    }
}
