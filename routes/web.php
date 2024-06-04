<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;

Route::get('/', [AdminController::class, 'home']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

route::get('/home', [AdminController::class, 'index'])->name('home');

// Admin
// CRUD
route::get('/create_room', [AdminController::class, 'create_room'])->name('admin.create_room');
route::post('/store_room', [AdminController::class, 'store_room'])->name('admin.store_room');
route::get('/view_room', [AdminController::class, 'view_room'])->name('admin.view_room');
route::get('/edit_room/{id}', [AdminController::class, 'edit_room'])->name('admin.edit_room');
route::post('/update_room/{id}', [AdminController::class, 'update_room'])->name('admin.update_room');
route::get('/delete_room/{id}', [AdminController::class, 'delete_room'])->name('admin.delete_room');

// Booking 
route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
route::get('/status_approve/{id}', [AdminController::class, 'status_approve'])->name('admin.status_approve');
route::get('/status_reject/{id}', [AdminController::class, 'status_reject'])->name('admin.status_reject');

// Gallery
route::get('/galleries', [AdminController::class, 'gallery'])->name('admin.gallery');
route::post('/store_gallery', [AdminController::class, 'store_gallery'])->name('admin.store_gallery');
route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery'])->name('user.delete_gallery');

// Contact
route::get('/contacts', [AdminController::class, 'contacts'])->name('admin.contacts');
route::get('/send_mail/{id}', [AdminController::class, 'send_mail'])->name('admin.send_mail');
route::post('/mail/{id}', [AdminController::class, 'mail'])->name('admin.mail');

// User
route::get('/room_details/{id}', [HomeController::class, 'room_details'])->name('user.room_details');
route::post('/book_room', [BookingController::class, 'book_room'])->name('user.book_room');

route::get('/delete_booking/{id}', [BookingController::class, 'delete_booking'])->name('user.delete_booking');

route::post('/contact', [HomeController::class, 'contact'])->name('user.contact');