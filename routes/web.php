<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingAdminController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\CouponAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\RoomAdminController;
use App\Http\Controllers\User\CouponController;
use App\Http\Controllers\User\HomeController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Language;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', [AdminController::class, 'home'])->middleware(Language::class);

route::get('/home', [AdminController::class, 'index'])->name('home');

// Admin
Route::middleware([Admin::class])->group(function () {
    // CRUD
    route::get('/create_room', [RoomAdminController::class, 'create'])->name('admin.create_room');
    route::post('/store_room', [RoomAdminController::class, 'store'])->name('admin.store_room');
    route::get('/view_room', [RoomAdminController::class, 'getAll'])->name('admin.view_room');
    route::get('/edit_room/{id}', [RoomAdminController::class, 'update'])->name('admin.edit_room');
    route::post('/update_room/{id}', [RoomAdminController::class, 'update_room'])->name('admin.update_room');
    route::get('/delete_room/{id}', [RoomAdminController::class, 'delete'])->name('admin.delete_room');
    
    // Booking 
    route::get('/bookings', [BookingAdminController::class, 'bookings'])->name('admin.bookings');
    route::get('/status_approve/{id}', [BookingAdminController::class, 'status_approve'])->name('admin.status_approve');
    route::get('/status_reject/{id}', [BookingAdminController::class, 'status_reject'])->name('admin.status_reject');
    route::get('/delete_booking/{id}', [BookingAdminController::class, 'delete_booking'])->name('admin.delete_booking');
    
    // Gallery
    route::get('/galleries', [GalleryAdminController::class, 'create'])->name('admin.gallery');
    route::post('/store_gallery', [GalleryAdminController::class, 'store_gallery'])->name('admin.store_gallery');
    route::get('/delete_gallery/{id}', [GalleryAdminController::class, 'delete'])->name('user.delete_gallery');
    
    // Contact
    route::get('/contacts', [ContactAdminController::class, 'contacts'])->name('admin.contacts');
    route::get('/send_mail/{id}', [ContactAdminController::class, 'send_mail'])->name('admin.send_mail');
    route::post('/mail/{id}', [ContactAdminController::class, 'mail'])->name('admin.mail');

    route::resources([
        'coupons' => CouponAdminController::class
    ]);
    route::get('coupons/delete/{id}', [CouponAdminController::class, 'delete'])->name('coupons.delete');

});

// User
Route::middleware([Language::class])->group(function () {
    Route::middleware([Authenticate::class])->group(function () {
        route::get('/coupon_view', [CouponController::class, 'index'])->name('user.coupon_view');
    
        route::get('linkCouponToUser/{id}', [CouponController::class, 'couponToUser'])->name('user.couponToUser');
        
        route::post('/book_room', [BookingAdminController::class, 'book_room'])->name('user.book_room');
    });

    route::get('/about', [HomeController::class, 'aboutUs'])->name('user.aboutUs');
    
    route::get('/our_rooms', [HomeController::class, 'our_rooms'])->name('user.our_rooms');
    route::get('/room_details/{id}', [HomeController::class, 'room_details'])->name('user.room_details');
    
    route::post('/contact', [HomeController::class, 'contact'])->name('user.contact');
    route::get('/our_galleries', [HomeController::class, 'our_galleries'])->name('user.our_galleries');
    route::get('/contact_view', [HomeController::class, 'contact_view'])->name('user.contact_view');
    route::post('/roomAvailableForTheDate', [HomeController::class, 'roomAvailableForTheDate'])->name('user.roomAvailableForTheDate');
    
    route::get('/changeLocale/{locale}', [LanguageController::class, 'switchLang'])->name('user.switchLang')->middleware(Language::class);
    route::get('/changSearchRoom/{start_date}/{end_date}/{room_type}', [HomeController::class, 'changSearchRoom'])->name('user.changSearchRoom')->middleware(Language::class);
});
