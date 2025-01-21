<?php

use Illuminate\Http\Request;
use App\Models\Calculator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::post('/register', [RegisterController::class, 'register']); 

Route::post('/login', [LoginController::class, 'login']); 

Route::get('/user-info', [UserController::class, 'getUserInfo'])->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});


Route::post('/calculate', function (Request $request, Calculator $calculator) {
    $request->validate([
        'number1' => 'required|numeric|max:999999999',
        'number2' => 'required|numeric|max:999999999',
        'operator' => 'required|string|in:+,-,*,/'
    ]);

    $number1 = $request->input('number1');
    $number2 = $request->input('number2');
    $operator = $request->input('operator');

    $result = $calculator->calculate($number1, $number2, $operator);

    return response()->json(['result' => $result]);
});