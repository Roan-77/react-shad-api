<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

Route::post('/register', [RegisterController::class, 'register']); {
    // Log::info($request);

};

Route::post('/login', [LoginController::class, 'login']); {
    // Log::info($request);

};
