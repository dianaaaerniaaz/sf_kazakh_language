<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DictionaryController extends Controller
{
    public function index()
    {
        $words = Word::all();

        return view('dictionary.index', compact('words'));
    }
    public function create()
    {
        return view('dictionary.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'word' => 'required',
            'transcription' => 'required',
            'translation' => 'required',
            'img' => 'nullable|image',
        ]);

        $fileName = time().$request->file('img')->getClientOriginalName();
        $image_path = $request->file('img')->storeAs('words', $fileName, 'public');
        $validated['img'] = '/storage/'.$image_path;

        Word::create($validated);

        return redirect()->route('dictionary.index')->with('message', __('messages.saved'));
    }
    public function destroy(Word $word)
    {
        $word->delete();

        return redirect()->route('dictionary.index');
    }
}
