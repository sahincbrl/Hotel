<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    HomeController,
    MenuController,
    AdminController,
    CategoryController,
    RoomController,
    LoginController,
    SlideshowController,
    OrderController,
    ContactUsController,
    BlogController,
    RoomCommentController,
};

use App\Http\Controllers\Frontend\{
    HomeController as FrontHomeController,
    ContactUsController as FrontContactUsController,
    RoomController as FrontRoomController,
//   OrderController as FrontOrderController,
};

use App\Http\Controllers\Controller;

Route::get('locale/{lang}', [Controller::class, 'setLocale'])->name('setLocale');


Route::get('/', [FrontHomeController::class, 'index'])->name('front.home');
Route::get('/home', [FrontHomeController::class, 'index']);
Route::get('/contact-us', [FrontContactUsController::class, 'index'])->name('get.contact-us');
Route::post('/contact-us', [FrontContactUsController::class, 'store'])->name('post.contact-us');
Route::get('/rooms/{id}', [FrontRoomController::class, 'show'])->name('get.room.show');
Route::post('/room_comment', [FrontRoomController::class, 'postRoomComment'])->name('post.room_comment');
Route::post('/post_order', [FrontRoomController::class, 'postOrder'])->name('post.order');

Route::name('admin.')->prefix('admin')->middleware('Admin')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('index');
    Route::resource('/menus', MenuController::class);
    Route::resource('/admins', AdminController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/rooms', RoomController::class);
    Route::post('/rooms/deleteImage/{id}', [RoomController::class, 'deleteImage']);
    Route::resource('/slideshows', SlideshowController::class);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/apply', [OrderController::class, 'apply'])->name('orders.apply');
    Route::get('/contacts', [ContactUsController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}/reply', [ContactUsController::class, 'reply'])->name('contacts.reply');
    Route::post('/contacts/reply', [ContactUsController::class, 'replyPost'])->name('contacts.reply_post');
    Route::delete('/contacts/{id}', [ContactUsController::class, 'delete'])->name('contacts.delete');
    Route::resource('/blogs', BlogController ::class);
    Route::post('/blogs/deleteImage/{id}', [BlogController::class, 'deleteImage']);
    Route::get('/comments', [RoomCommentController::class, 'index'])->name('comments.index');
    Route::post('/comments/active_deactive', [RoomCommentController::class, 'activeDeactive'])->name('comments.active_deactive');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/administrator', [LoginController::class, 'index'])->name('admin.login');
Route::post('/administrator', [LoginController::class, 'loginAdmin'])->name('admin.loginAdmin');

