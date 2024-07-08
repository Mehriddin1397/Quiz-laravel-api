<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index($quizId)
    {
        return Question::where('quiz_id', $quizId)->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_option' => 'required',
        ]);

        return Question::create($request->all());
    }

    public function show(Question $question)
    {
        return $question;
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_option' => 'required',
        ]);

        $question->update($request->all());
        return $question;
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response()->noContent();
    }
}
