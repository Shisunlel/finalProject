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

Route::resource('/register', RegisterController::class)->only([
    'index', 'store',
]);

Route::resource('/login', LoginController::class)->only([
    'index', 'store',
]);

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

Route::get('/s/rooms', [RoomController::class, 'search'])->name('search');
Route::resource('/rooms', RoomController::class)->except([
    'index',
])->parameters([
    'rooms' => 'id',
]);

Route::resource('/rooms.reviews', ReviewController::class)->except([
    'index', 'show',
])->parameters([
    'rooms' => 'id',
    'reviews' => 'review_id',
])->shallow();

Route::get('/rooms/saved', [WishlistController::class, 'index'])->name('saved');
Route::post('/rooms/{room}/saved', [WishlistController::class, 'store'])->name('saved.action');
Route::delete('/rooms/{room}/saved', [WishlistController::class, 'destroy']);
