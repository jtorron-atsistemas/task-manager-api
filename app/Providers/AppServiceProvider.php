<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Proveedor de servicios para IoC de Laravel
 * 
 * @category ServiceProviders
 * @package  LaravelCore
 * @author   Javier Torron <jtorron@atsistemas.com>
 * @license  http://taskmanger.local/conditions/ EULA
 * @link     http://taskmanger.local/
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\TaskRepositoryInterface',
            'App\Repositories\TaskRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
