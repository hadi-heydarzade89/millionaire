<?php

namespace App\Providers;

use App\Services\AnswerService;
use App\Services\contracts\AnswerServiceInterface;
use App\Services\contracts\GameServiceInterface;
use App\Services\contracts\QuestionServiceInterface;
use App\Services\GameService;
use App\Services\QuestionService;
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
        $this->app->bind(QuestionServiceInterface::class, QuestionService::class);
        $this->app->bind(AnswerServiceInterface::class, AnswerService::class);
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
