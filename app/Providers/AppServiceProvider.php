<?php

namespace App\Providers;

use App\Repositories\Contract\RepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('App\Repositories\Contracts\RepositoryInterface', 'App\Repositories\Eloquent\BaseRepository');
        $this->app->bind('App\Repositories\Contracts\SettingLinkInterface', 'App\Repositories\Eloquent\SettingLinkRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
