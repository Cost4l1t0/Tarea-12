<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::apiResource('movies', MovieController::class);
Route::apiResource('characters', CharacterController::class);
