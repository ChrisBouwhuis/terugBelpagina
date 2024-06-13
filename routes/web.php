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

//Route::get('/test', function () {
//    dd(\App\Models\CallbackOrderUser::all());
//    return view('test');
//});
