<?php
use Devsfort\ChatGpt\Http\Controllers\ChatGptController;

/*
* This is the main app route [Devsfort Location Operator]
*/
Route::prefix('api/v1')->group(function () {
    Route::get('/', [ChatGptController::class,'index']);
    Route::post('/get-response', [ChatGptController::class,'getResponse']);
});