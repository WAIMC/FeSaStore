<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $models = array(
            'SettingLink',
        );

        foreach ($models as $model) {
            $this->app->bind("App\Repositories\Contracts\\{$model}Interface", "App\Repositories\Eloquent\\{$model}Repository");
        }
        
        //$this->app->bind('App\Repositories\Contracts\SettingLinkInterface', 'App\Repositories\Eloquent\SettingLinkRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
