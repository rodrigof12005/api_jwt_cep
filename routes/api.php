<?php

use App\Http\Controllers\BuscaCepController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

       /*Routes without JWT*/
       Route::post('register', [UserController::class, 'register'])->name('register');
       Route::post('login', [UserController::class, 'login'])->name('login');

    /*Routes JWT */
    Route::middleware('auth:api')->group(function () {
       Route::post('logoff', [UserController::class, 'logoff'])->name('logoff');
       Route::post('refreshToken', [UserController::class, 'refreshToken'])->name('refreshToken');
       Route::get('findCep', [BuscaCepController::class, 'findCep'])->name('findCep');
       Route::get('findCepName', [BuscaCepController::class, 'findCepName'])->name('findCepName');

    });
