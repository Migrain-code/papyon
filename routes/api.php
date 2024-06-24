<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AjaxController;

Route::get('check-slug', [AjaxController::class, 'checkSlug']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
