<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');




Route::group(['prefix' => 'hotel'], function () {

    // hotel
    Route::get('/rooms/{id}', [App\Http\Controllers\Hotels\HotelsController::class, 'rooms'])->name('hotel.rooms');
    Route::get('/room-details/{id}', [App\Http\Controllers\Hotels\HotelsController::class, 'roomDetails'])->name('hotel.room.details');
    Route::post('/room-booking/{id}', [App\Http\Controllers\Hotels\HotelsController::class, 'roomBooking'])->name('hotel.room.booking');

    // pay
    Route::get('/pay', [App\Http\Controllers\Hotels\HotelsController::class, 'paywithpaypal'])->name('hotel.pay')->middleware('check.for.price');
    Route::get('/success', [App\Http\Controllers\Hotels\HotelsController::class, 'success'])->name('hotel.success')->middleware('check.for.price');
});





// Users
Route::get('/users/mybookings', [App\Http\Controllers\Users\UsersController::class, 'mybookings'])->name('users.bookings')->middleware('auth:web');



// Admin panel

Route::get('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('admin.viewlogin')->middleware('check.for.login');
Route::post('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('admin.checklogin');

Route::group(['prefix' => 'admin','middleware'=>'auth:admin'], function () {
Route::get('/index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');



// Admins
Route::get('/all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'allAdmins'])->name('admins.alladmins');
Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('admins.create');
Route::post('/store-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('admins.store');



// hotel

Route::get('/hotel-all', [App\Http\Controllers\Admins\AdminsController::class, 'allHotels'])->name('hotel.all');
Route::get('/hotel-create', [App\Http\Controllers\Admins\AdminsController::class, 'createHotel'])->name('hotel.create');
Route::post('/hotel-create', [App\Http\Controllers\Admins\AdminsController::class, 'storeHotel'])->name('hotel.store');
Route::get('/hotel-edit/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editHotel'])->name('hotel.edit');
Route::post('/hotel-update/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateHotel'])->name('hotel.update');
Route::get('/hotel-delete/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteHotel'])->name('hotel.delete');


// Rooms

Route::get('/all-rooms', [App\Http\Controllers\Admins\AdminsController::class, 'allRooms'])->name('all.rooms');
Route::get('/create-rooms', [App\Http\Controllers\Admins\AdminsController::class, 'createRooms'])->name('create.rooms');
Route::post('/creat-rooms', [App\Http\Controllers\Admins\AdminsController::class, 'storeRooms'])->name('store.rooms');
Route::get('/rooms-delete/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteRooms'])->name('rooms.delete');

// Booking

Route::get('/all-bookings', [App\Http\Controllers\Admins\AdminsController::class, 'allBookings'])->name('all.bookings');
Route::get('/edit-status/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editStatus'])->name('booking.edit.status');
Route::post('/update-status/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateStatus'])->name('booking.update.status');
Route::get('/delete-status/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteStatus'])->name('booking.delete.status');


});



