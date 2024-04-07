<?php

use App\Http\Controllers\Admin\ProprieteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function  () {
    Route::resource('propriete', ProprieteController::class)->except(['show']); 
});
