<?php

use App\Http\Controllers\LoginController as CLogin;
use App\Http\Controllers\Student\HomeController as CHome;
use Illuminate\Support\Facades\Route;

    // Teacher

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
*/

    Route::get('/', fn () => view('welcome'));

    Route::get('/login', [CLogin::class, 'index']);
    Route::post('/login', [CLogin::class, 'login']);

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
*/

    Route::middleware('session')->group(function () {
        Route::get('/logout', [CHome::class, 'logout']);

        Route::middleware('student')->group(function () {

            Route::prefix('student')->group(function () {
                Route::get('/', [CHome::class, 'index']);
            });
        });
    });

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
|
*/
