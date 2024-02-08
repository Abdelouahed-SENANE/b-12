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
// Trips
Route::get('/mytrips', [PassengerController::class , 'mytrips'] )->middleware('can:passenger');
Route::get('/mytrajets', [DriverController::class , 'mytrajets'] )->middleware('can:driver');

Route::group(['middleware' => 'can:admin'] , function() {
    Route::get('/dashboard' , [AdminController::class , 'dashboard']);

});


