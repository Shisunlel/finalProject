<?php

use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RentDetailController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
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

Route::middleware('can:dashboard')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/user', [AdminController::class, 'user'])->name('dashboard-user');

    Route::get('/dashboard/rooms', [AdminController::class, 'room'])->name('dashboard-room');

    Route::get('/dashboard/transaction', [AdminController::class, 'transc'])->name('dashboard-transc');
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
]);

Route::resource('/rooms.reviews', ReviewController::class)->only([
    'store', 'destroy',
])->shallow();

Route::get('/saved', [WishlistController::class, 'index'])->name('saved.index');
Route::post('/rooms/{room}/saved', [WishlistController::class, 'store'])->name('saved.store');
Route::delete('/rooms/{room}/saved', [WishlistController::class, 'destroy'])->name('saved.destroy');

Route::get('/profile-setting', [UserController::class, 'index'])->name('profile');
Route::put('/profile-setting/{user}', [UserController::class, 'update'])->name('profile.update');
Route::delete('/profile-setting/{user}', [UserController::class, 'destroy'])->name('profile.destroy');
Route::get('/view-home', [UserController::class, 'home'])->name('view-home');
Route::get('/history', [RentDetailController::class, 'history'])->name('history');
Route::get('{room}/checkout', [RentController::class, 'index'])->name('checkout.index');
Route::post('{room}/checkout', [RentController::class, 'store'])->name('checkout.store');
