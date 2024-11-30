<?php
namespace Fitseder85\UserTypes\Providers;

use Illuminate\Support\ServiceProvider;

class UserTypesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'userTypes');

        // Allow publishing views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('/views/admin/userTypes'),
        ]);

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {

    }
}
