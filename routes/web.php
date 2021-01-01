<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\SummaryController;
use App\Models\Quiz;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('quiz.index_quiz');
});

Route::get('/register', function () {
    
    return view('quiz.create_quiz');
});
Route::resource('quiz', QuizController::class);
Route::resource('answer', AnswerController::class);
Route::resource('summary', SummaryController::class);