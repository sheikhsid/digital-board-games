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

Route::get('/', function () { return view('welcome'); });
Route::get('/single', function () { return view('single'); });

Auth::routes();


Route::middleware('auth')->group(function () {

    // Route::get('/home',[HomeController::class,'index'])->name('/home');
    Route::get('/home', function () { return view('home'); });

    Route::get('/home', function () { return view('home'); });
    Route::get('/games', function () { return view('games'); });

    // Route::get('/games',[Games::class,'viewGames'])->name('/games');
    Route::post("/game",[Games::class,'addGame'])->name('/game');

});
    