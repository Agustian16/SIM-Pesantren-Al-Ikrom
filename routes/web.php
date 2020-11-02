<?php

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

/*
|--------------------------------------------------------------------------
| Import Class
|--------------------------------------------------------------------------
|
*/

    // Public
    use App\Http\Controllers\LoginController as CLogin;

    // Student
    use App\Http\Controllers\Student\HomeController as CHome;

    // Teacher

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/login', [CLogin::class, 'index']);
    Route::post('/login', [CLogin::class, 'login']);

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
*/

    Route::middleware('session')->group(function () {
        Route::get('/logout',  [CHome::class, 'logout']);

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
