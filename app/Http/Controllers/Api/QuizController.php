<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index()
    {
        $quizzes = Quiz::all();
        return response()->json($quizzes);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $quiz = Quiz::create($request->all());

        return response()->json($quiz, 201);
    }


    public function show(string $id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        return response()->json($quiz);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());

        return response()->json($quiz);
    }


    public function destroy(string $id)
    {
        Quiz::destroy($id);

        return response()->json(null, 204);
    }
}
