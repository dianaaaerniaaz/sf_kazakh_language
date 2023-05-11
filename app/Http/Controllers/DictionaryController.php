<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function index()
    {
        $words = Word::all();

        return view('dictionary.index', compact('words'));
    }
}
