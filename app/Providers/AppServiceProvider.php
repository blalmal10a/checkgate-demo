<?php

namespace App\Providers;

use App\Filament\Pages\Dashboard;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();
        Filament::registerPages([
            Dashboard::class,
            // Other pages...
        ]);
    }
}
