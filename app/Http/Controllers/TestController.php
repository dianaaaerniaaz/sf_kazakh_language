<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function questionByCategory(Category $category){
        return view('tests.create', ['questions'=>$category->questions,'categories'=>Category::all()]);
    }
    public function create()
    {
        $categories = Category::all();
        $questions = Question::all();
        return view('tests.create',compact('questions', 'categories')); // передайте переменную в представление
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id'
        ]);

        $questions = Question::where('category_id', $validated['category_id'])->get();
        $score = 0;

        foreach ($questions as $question) {
            if ($request->get('answer_' . $question->id) == $question->correct_option) {
                $score++;
            }
        }

        Test::create([
            'user_id' => $validated['user_id'],
            'category_id' => $validated['category_id'],
            'score' => $score
        ]);

        return redirect()->route('tests.result', ['score' => $score, 'total' => count($questions)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function result($score, $total)
    {
        return view('tests.result', ['score' => $score, 'total' => $total]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
