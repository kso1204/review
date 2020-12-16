<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;


Route::middleware('auth:api')->group(function() {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('tags',[TagController::class,'store']);

});