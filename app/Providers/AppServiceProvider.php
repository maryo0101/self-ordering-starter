<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Vite;
use Revolution\Ordering\Contracts\Menu\MenuData;
use App\Services\Menu\DatabaseMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->scoped(MenuData::class, DatabaseMenu::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::useBuildDirectory('.vite');
    }
}
