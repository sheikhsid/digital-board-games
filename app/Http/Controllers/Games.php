<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Player;

class Games extends Controller
{

    /*Player Area*/

    function seeGames(){

        $games= Game::all()->where('status','on');

        return view('/single',['games' => $games]);

    }

    function addPlayer(Request $req){

        $game= new Player;
        $game->game_id=$req->game_id;
        $game->ip_address=request()->ip();
        $game->save();

        $play= Game::all()->where('id',$game->game_id)->first();

        // return redirect('/play/'.$game->game_id);
        return view('/play',['play' => $play]);

    }
    
    /*Admin Area*/

    function viewGames(){

        $games= Game::all();

        return view('/games',['games' => $games]);

    }
    
    function addGame(Request $req){

        $req->validate([
            'name'=>'required | max:225',
            'iframe'=>'required | max:225',
            'thumbnail'=>'required | max:225',
            'status'=>'max:225'
        ]);

        $game= new Game;
        $game->name=$req->name;
        $game->username=$req->username.'';
        $game->iframe=$req->iframe;
        $game->thumbnail=$req->thumbnail;
        $game->status=$req->status.'';
        $game->save();

        return redirect('/games');

    }

    function Status(Request $req){

        $game= Game::find($req->id);
        $game->status=$req->status;
        $game->save();

        return redirect('/games');

    }

    function viewPlayers(){

        $players= Player::all();
        $games= Game::all();

        return view('/players',['players' => $players, 'games' => $games]);

    }
    
}
