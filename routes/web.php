<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});*/
Route::get('/',[\App\Http\Controllers\LoginController::class,'index'])->name('viewLogin');
Route::post('/register',[\App\Http\Controllers\LoginController::class,'create'])->name('reg');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'login'])->name('enterLogin');
Route::get('/dash',[\App\Http\Controllers\LoginController::class,'dashboard'])->name('dash');
Route::get('/logout',[\App\Http\Controllers\LoginController::class,'logout'])->name('logoff');
