<?php

use App\Http\Controllers\OrderControler;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderControler::class , 'index'])->name('callbackOrder.index');
Route::post('/callbackOrder', [OrderControler::class , 'store'])->name('create.callbackOrder');

Route::get('/success', function () {
    return view('success');
});
