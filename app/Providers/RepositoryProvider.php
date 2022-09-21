<?php

namespace App\Providers;

use App\Repositories\AnswerRepository;
use App\Repositories\contracts\AnswerRepositoryInterface;
use App\Repositories\contracts\GameRepositoryInterface;
use App\Repositories\contracts\QuestionRepositoryInterface;
use App\Repositories\contracts\UserGameQuestionRepositoryInterface;
use App\Repositories\contracts\UserGameRepositoryInterface;
use App\Repositories\contracts\UserRepositoryInterface;
use App\Repositories\GameRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\UserGameQuestionRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AnswerRepositoryInterface::class, AnswerRepository::class);
        $this->app->bind(GameRepositoryInterface::class, GameRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(UserGameQuestionRepositoryInterface::class, UserGameQuestionRepository::class);
        $this->app->bind(UserGameRepositoryInterface::class, UserGameRepositoryInterface::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
