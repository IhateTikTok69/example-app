<?php

namespace App\Providers;

use App\Models\transactions;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
    public function boot()
    {
        View::composer('admin.layout.main', function ($view) {
            $user = Auth::guard('admin')->user();
            $view->with([
                'user' => $user,
            ]);
        });
        View::composer('admin.dashboard', function ($view) {
        });
    }
}
