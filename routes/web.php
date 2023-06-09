<?php

use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\RepasController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;

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
    $restaurants=Restaurant::all()->take(10);
    return view('welcome',compact('restaurants'));
});

Route::post('/restaurantUpload',[RestaurantController::class,'restaurantUpload']);
Route::get('/RedirigerVers',[HomeController::class,'RedirigerVers'])->name('RedirigerVers');
Route::get('/restaurant',[HomeController::class,'restaurantview'])->name('restaurant');
Route::get('/repas',[HomeController::class,'repasview'])->name('repasview');
Route::get('/local',[HomeController::class,'localview'])->name('localview');
Route::get('/reservation',[ReservationController::class,'reservationview'])->name('reservation');
Route::get('/reservation/{id}/updateState', [ReservationController::class,'updateState'])->name('reservation.updateState');
Route::get('/reservation/{id}/updateStateR', [ReservationController::class,'updateStateR'])->name('reservation.updateStateR');
Route::get('/reservations',[HomeController::class,'reservationsview'])->name('reservations');
Route::get('/reservations/{id}',[HomeController::class,'deleteReservation'])->name('reservations.deleteReservation');
Route::get('search',[HomeController::class,'searchrestaurant']);
Route::post('/foodUpload',[RepasController::class,'foodUpload']);
Route::post('/localUpload',[LocalController::class,'localUpload']);

Route::post('/makeReservation/{id}',[ReservationController::class,'makeReservation'])->name('makeReservation')->middleware('auth');
Route::get('/detailView/{id}',[HomeController::class,'detailView'])->name('reservation.detailView');

//routes pour modififer et supprimer une photo de local
Route::get('/localshow',[LocalController::class,'localshow'])->name('localshow');
Route::get('/localshow/{id}',[LocalController::class,'localdelete'])->name('localdelete');

//routes pour modifier et supprimer un repas
Route::get('/fooddelete/{id}',[RepasController::class,'fooddelete'])->name('fooddelete');
Route::get('/foodshow',[RepasController::class,'foodshow'])->name('foodshow');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
