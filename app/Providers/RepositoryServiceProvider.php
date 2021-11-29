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
            'Admin',
            'AdminRole',
            'Role',
            'Category',
            'CategoryBlog',
            'Blog',
            'SettingLink',
            'Product',
            'VariantProduct',
            'Brand',
            'Banner',
            'Slider',
            'User',
            'Cart',
            'Order',
            'OrderDetail',
            'Comment',
            'Customer'
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
