<?php

namespace App\Providers;

use App\DenemeProp;
use Illuminate\Support\ServiceProvider;
use Schema;
use Vanilo\Properties\PropertyTypes;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->app->concord->registerModel(\Konekt\User\Contracts\User::class, \App\User::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
