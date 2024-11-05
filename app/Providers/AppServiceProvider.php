<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\DataPengguna;

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
        // view()->composer('website.main.header', function ($view) {
        //     $user = Auth::user();
        //     $pengguna = $user ? DataPengguna::where('akun_idpengguna', $user->id)->first() : null;
        //     $view->with(['user' => $user, 'pengguna' => $pengguna]);
        // });

        // View::composer('website.main.header', function ($view) {
        //     $pengguna = Auth::user();
        //     $view->with('pengguna', $pengguna);
        // });

    }
}
