<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

Route::get('/s/room', [RoomController::class, 'search'])->name('search');
Route::get('/room/new', [RoomController::class, 'index'])->name('room.new');
Route::post('/room', [RoomController::class, 'store'])->name('room');
Route::get('/room/{id}', [RoomController::class, 'show'])->whereNumber('id');

Route::post('/room/{id}/review/', [ReviewController::class, 'store'])->whereNumber('id')->name('review');
Route::delete('/room/{id}/review/', [ReviewController::class, 'destroy'])->whereNumber('id');
Route::get('/room/{id}/review/{review_id}', [ReviewController::class, 'show'])->whereNumber('id')->name('review.edit');
