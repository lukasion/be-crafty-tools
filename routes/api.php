<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/sitemap-generator', [App\Http\Controllers\SitemapGeneratorController::class, 'generate']);
//    ->middleware('throttle:15,1');
