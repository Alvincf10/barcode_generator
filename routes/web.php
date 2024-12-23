<?php

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\BookingController;
use App\Mail\BookingMail;
use Illuminate\Support\Facades\Mail;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BarcodeController::class, 'home'])->name('barcode.home');
Route::post('/', [BarcodeController::class, 'validateBarcode'])->name('barcode.validate');

Route::get('/booking-form', [BookingController::class, 'showForm'])->name('booking.form');
Route::post('/send-booking', [BookingController::class, 'sendBookingEmail'])->name('booking.send');