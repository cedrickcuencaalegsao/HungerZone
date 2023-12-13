<?php

use App\Http\Controllers\ImageContorller;
use App\Http\Controllers\uploaderControl;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest'], function () {
    // Admin pages.
    Route::get('admin', [WebController::class, 'view_adminhome'])->name('view.admin');
    Route::get('users', [WebController::class, 'view_users'])->name('view.user');
    Route::get('menuuploader', [WebController::class, 'uploader_menu'])->name('uploader.menu');
    Route::get('loginimages', [WebController::class, 'uploaderloginimages'])->name('uploader.login.images');
    Route::get('restuarant', [WebController::class, 'uploader_restaurant'])->name('uploader.restaurant');
    //delete
    Route::get('deletemenu/{id}/{image}', [WebController::class, 'delMenu'])->name('del.menu');
    Route::get('deleterestaurant/{id}/{image}', [WebController::class, 'delRestaurant'])->name('del.restaurant');
    Route::get('deleteloginimg/{id}/{image}', [WebController::class, 'delLoginImg'])->name('del.login.img');
    //edit
    Route::get('editmenu/{id}', [WebController::class, 'editMenu'])->name('edit.menu');
    Route::get('editrestaurant/{id}', [WebController::class, 'editRestaurant'])->name('edit.restuarant');
    Route::get('editloginimages/{id}', [WebController::class, 'editLoginImg'])->name('edit.login.img');
    // update routes
    Route::put('updatemenu/{id}/{image}', [WebController::class, 'updateMenu'])->name('update.menu');
    Route::put('updaterestaurant/{id}/{image}', [WebController::class, 'updateRestuarant'])->name('updated.restaurant');
    Route::put('updateloginimg/{id}/{image}', [WebController::class, 'updateLoginImg'])->name('update.login.img');
    // upload routes.
    Route::post('uploadimagelogin', [WebController::class, 'uploadimage_login'])->name('up.login.img');
    Route::post('uploadimgrestaurant', [WebController::class, 'upldImgRest'])->name('up.img.rest');
    Route::post('uploadjollibeemenu', [WebController::class, 'uploadimage_menu'])->name('upload.menu');

    // Client pages.
    Route::get('/', [WebController::class, 'f_login'])->name('login');
    Route::get('login', [WebController::class, 'f_login'])->name('login');
    Route::get('register', [WebController::class, 'f_reg'])->name('register');
    Route::get('cancelregister', [WebController::class, 'cancel_reg'])->name('cencelregister');
    Route::get('viewsearchemail', [WebController::class, 'viewSearchEmail'])->name('view.search.email');
    Route::get('viewchangepassword/{email}', [WebController::class, 'viewChangePassword'])->name('view.change.password');
    Route::post('searchemail', [WebController::class, 'searchEmail'])->name('search.email');
    Route::post('changepassword/{id}', [WebController::class, 'changePassword'])->name('change.password');
    Route::post('check-login', [WebController::class, 'validateLogin'])->name('logincheck');
    Route::post('check-register', [WebController::class, 'validateRegister'])->name('registercheck');
});

Route::group(['middleware' => 'auth'], function () {
    // Client Pages.
    Route::get('home', [WebController::class, 'show_home'])->name('view.home');
    Route::get('cart/{user_id}', [WebController::class, 'view_cart'])->name('view.cart');
    Route::get('history', [WebController::class, 'view_history'])->name('view.history');
    Route::get('delivery/{user_id}', [WebController::class, 'view_delivery'])->name('view.delivery');
    Route::get('canceldelivery/{id}', [WebController::class, 'cancel_delivery'])->name('cancel.delivery');
    Route::get('profile', [WebController::class, 'view_profile'])->name('view.profile');
    Route::get('logout', [WebController::class, 'logout'])->name('logout');
    Route::get('Cart/{user_id}/{image}/{menu_name}/{restaurant}/{price}', [WebController::class, 'AddToCart'])->name('Add.ToCart');
    Route::get('removeFromCat/{user_id}/{cart_id}', [WebController::class, 'removeFromCart'])->name('remove.from.cart');
    //order rotues
    Route::get('ordernow/{menu_name}/{restaurant}/{image}/{price}', [WebController::class, 'orderNow'])->name('order.now');
    Route::post('order/{user_id}/{image}', [WebController::class, 'order'])->name('ordered');
    // Menu pages.
    Route::get('Menu/{category}/{restaurant}/{bestseller}', [WebController::class, 'view_jMenu'])->name('view.menu');

    Route::get('editprofile/{id}', [WebController::class, 'editProfile'])->name('edit.profile');

    //update profile.
    Route::put('updateprofile/{id}/{image}', [WebController::class, 'updateProfile'])->name('update.profile');
    Route::get('cancelupdateprofile', [WebController::class, 'cancelUpdateProfile'])->name('cancel.update.profile');

    // update password.
    
});
