<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;



class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
            // Mendapatkan data pengguna yang sedang login
            $user = Auth::user();
            $name = $user ? $user->name : null;
    
            // Menetapkan variabel $name ke setiap view
            $view->with('name', $name);
        });
    }
}
