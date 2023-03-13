<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class Games extends Controller
{
    
    function viewGames(){

        $games= Game::all();

        return view('/games',['games' => $games]);

    }
    
    //Check validation and add New Request
    function addGame(Request $req){

        $req->validate([
            'name'=>'required | max:225',
            'iframe'=>'required | max:225',
            'status'=>'max:225'
        ]);

        $game= new Game;
        $game->name=$req->name;
        $game->username=$req->username.'';
        $game->iframe=$req->iframe;
        $game->status=$req->status.'';
        $game->save();

        return redirect('/games');

    }
}
