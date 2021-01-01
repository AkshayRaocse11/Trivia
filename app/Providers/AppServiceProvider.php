<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['*'], function
        ($view) {
         $users = User::latest()->first();
        $quiz = Quiz::all();
        $answer = Answer::all();
        $view->with('users', $users)->with('quiz', $quiz)->with('answer', $answer);
        });
    }
}
