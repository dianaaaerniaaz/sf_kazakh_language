<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index(){
        $game = Game::inRandomOrder()->first();

        return view('games.index', compact('game'));
    }
    public function check(Request $request, Game $game)
    {
        $answer = strtoupper($request->input('answer'));

        if ($answer === $game->word) {
            return redirect()->route('games.index')->with('success', 'Вы угадали слово!');
        } else {
            return redirect()->back()->with('error', 'Вы ошиблись.');
        }
    }

}
