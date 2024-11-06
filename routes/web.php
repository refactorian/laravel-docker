<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\PostmarkController;

Route::get('/', [TaskListController::class, 'index']);


Route::get('/codetest', function () {
    return view('codetest');
});


Route::post('/saveItem', [TaskListController::class, 'saveItem'])->name('saveItem');


Route::post('/sendEmail', [PostmarkController::class, 'sendEmail'])->name('sendEmail');

Route::post('/webhook', [PostmarkController::class, 'webhook']);