<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\ProprieteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProprieteController as ControllersProprieteController;
use Illuminate\Support\Facades\Route;

$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index']);
Route::get('/biens', [ControllersProprieteController::class, 'index'])->name('propriete.index');
Route::get('/biens/{slug}-{propriete}', [ControllersProprieteController::class, 'show'])->name('propriete.show')->where([
    'propriete' => $idRegex,
    'slug' => $slugRegex,
]);

Route::post('/biens/{propriete}/contact', [ControllersProprieteController::class, 'contact'])->name('propriete.contact')->where([
    'propriete' => $idRegex,
]);

Route::get('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthController::class, 'dologin']);
Route::delete('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('propriete', ProprieteController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});
