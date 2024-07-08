<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('quizzes', \App\Http\Controllers\Api\QuizController::class);
Route::apiResource('quizzes.questions', \App\Http\Controllers\Api\QuestionController::class)->shallow();

