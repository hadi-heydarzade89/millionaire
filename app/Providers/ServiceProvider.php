<?php

namespace App\Providers;

use App\Services\contracts\GameServiceInterface;
use App\Services\GameService;
use Illuminate\Support\ServiceProvider as MainServiceProvider;

class ServiceProvider extends MainServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GameServiceInterface::class, GameService::class);
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
