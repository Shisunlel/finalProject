<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\WishlistController;
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

Route::get('/s/rooms', [RoomController::class, 'search'])->name('search');
Route::get('/rooms/new', [RoomController::class, 'index'])->name('room.new');
Route::post('/rooms', [RoomController::class, 'store'])->name('room');
Route::get('/rooms/{id}', [RoomController::class, 'show'])->whereNumber('id')->name('show.room');

Route::post('/rooms/{id}/review/', [ReviewController::class, 'store'])->whereNumber('id')->name('review');
Route::delete('/rooms/{id}/review/', [ReviewController::class, 'destroy'])->whereNumber('id');
Route::get('/rooms/{id}/review/{review_id}', [ReviewController::class, 'show'])->whereNumber('id')->name('review.edit');

Route::get('/rooms/saved', [WishlistController::class, 'index'])->name('saved');
Route::post('/rooms/{room}/saved', [WishlistController::class, 'store'])->name('saved.action');
Route::delete('/rooms/{room}/saved', [WishlistController::class, 'destroy']);

Route::get('/checkout',function(){
    return view('checkout.checkout');
});