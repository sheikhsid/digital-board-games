<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Games;
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
Route::get('/single',[Games::class,'seeGames'])->name('/single');
Route::post("play",[Games::class,'addPlayer'])->name('play');

// Auth::routes();
Auth::routes(['register' => false]);


Route::middleware('auth')->group(function () {

    Route::get('/home',[Games::class,'Dashboard'])->name('/home');

    //Game Pages
    Route::get('/games',[Games::class,'viewGames'])->name('/games');
    Route::post("game",[Games::class,'addGame'])->name('game');

    Route::post("active",[Games::class,'Status'])->name('active');

    //Player Pages
    Route::get('/players',[Games::class,'viewPlayers'])->name('/players');
    
});
    