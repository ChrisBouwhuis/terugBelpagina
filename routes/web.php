<?php

use App\Http\Controllers\OrderControler;
use Illuminate\Support\Facades\Route;

Route::get('/callback', [OrderControler::class , 'index'])->name('callback');

Route::get('/', function () {
    return view('home-page');
})->name('home');

Route::get('/home', function () {
    return redirect(route('home'));
});

Route::get('/success', function () {
    return view('home-page')-> with('success', 'Order created successfully');
})->name('success');
