<?php


use App\Http\Controllers\V1\Admin\AnswerController;
use App\Http\Controllers\V1\Admin\GameController;
use App\Http\Controllers\V1\Admin\QuestionController;
use Illuminate\Support\Facades\Route;


Route::resource('games', GameController::class);
Route::resource('answers', AnswerController::class);
Route::resource('questions', QuestionController::class);
