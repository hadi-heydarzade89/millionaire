<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\V1\Admin\GameController;
use App\Http\Controllers\V1\Customer\UserGameController;
use App\Http\Controllers\V1\Customer\UserGameQuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authentication'])->name('authenticate');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('games', [GameController::class, 'index'])->name('public.game.index');

Route::middleware(['auth:web'])->as('user')->group(function () {

    Route::resource('user_games', UserGameController::class);
    Route::resource('user_game_questions', UserGameQuestionController::class);
});

