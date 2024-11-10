<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');


Route::get('/image-picker', function () {
    return redirect()->route('image-picker');
});

Route::get('/image-color-picker', function () {
    return view('pages.image-picker');
})->name('image-picker');

Route::any('/favicon-generator', [App\Http\Controllers\FaviconGeneratorController::class, 'index'])
    ->name('favicon-generator');

Route::get('/sitemap-generator', [App\Http\Controllers\SitemapGeneratorController::class, 'index'])
    ->name('sitemap-generator');