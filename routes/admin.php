<?php


use App\Http\Controllers\V1\Admin\GameController;
use Illuminate\Support\Facades\Route;


Route::resource('games', GameController::class);

