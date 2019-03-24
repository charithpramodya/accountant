<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('accountant')->user();

    //dd($users);

    return view('final.Accountant.home');
})->name('home');

