<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameeController extends Controller
{
    public function index()
    {
        // Get a random word from your list
        $word = $this->getRandomWord();

        // Pass the word to the view
        return view('word-game', ['word' => $word]);
    }

    private function getRandomWord()
    {
        // Define an array of words
        $words = ['apple', 'banana', 'cherry', 'durian', 'elderberry'];

        // Get a random word from the array
        $index = array_rand($words);
        return $words[$index];
    }
}
