<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');


Route::get('/image-picker', function () {
    return view('pages.image-picker');
})->name('image-picker');

Route::any('/favicon-generator', [App\Http\Controllers\FaviconGeneratorController::class, 'index'])
    ->name('favicon-generator');