<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\PassengerController;
use \App\Http\Controllers\DriverController;
use \App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    dd(request()->user()->can('admin'));
    return view('pages.welcome');

});
//Authentification
Route::get('/signup', [AuthController::class , 'create'] );
Route::post('/passenger', [AuthController::class , 'passenger'] );
Route::post('/driver', [AuthController::class , 'driver'] );
Route::get('/signin', [AuthController::class , 'login'] )->name('login');
Route::post('/signin', [AuthController::class , 'verify'] );
Route::get('/logout', [AuthController::class , 'logout'] );

// Driver Route
Route::get('/driver/profile', [DriverController::class , 'profile'])->middleware('can:driver');
Route::patch('/driver/image/{id}', [DriverController::class , 'update_img'] )->middleware('can:driver');
Route::patch('/driver/update/{id}', [DriverController::class , 'update_info'] )->middleware('can:driver');
Route::get('/mytrajets', [DriverController::class , 'mytrajets'] )->middleware('can:driver');

// Routes Admin
Route::group(['middleware' => 'can:admin'] , function() {
    Route::get('/admin/dashboard' , [AdminController::class , 'dashboard']);
    Route::get('/admin/profile' , [AdminController::class , 'profile']);
    Route::patch('/admin/image/{id}' , [AdminController::class , 'update_img']);
    Route::patch('/admin/update/{id}', [AdminController::class , 'update_info'] );
    Route::get('/admin/users' , [AdminController::class , 'users']);
    Route::get('/admin/reservations' , [AdminController::class , 'reservations']);
    Route::get('/admin/routes' , [AdminController::class , 'routes']);

});

// Passenger Route
Route::get('/passenger/profile', [PassengerController::class , 'profile'])->middleware('can:passenger');
Route::get('/mytrips', [PassengerController::class , 'mytrips'] )->middleware('can:passenger');
Route::patch('/passenger/image/{id}', [PassengerController::class , 'update_img'] )->middleware('can:passenger');
Route::patch('/passenger/update/{id}', [PassengerController::class , 'update_info'] )->middleware('can:passenger');


