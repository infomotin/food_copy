<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Client\RestaurantController;
use App\Http\Controllers\Client\CouponController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Admin\ManageOrderController;
use App\Http\Controllers\Frontend\ReviewsController;




require __DIR__ . '/auth.php';


// all route for client menu here
Route::middleware(['clientstatus', 'client'],)->group(function () {
    //for menu
    Route::controller(RestaurantController::class)->group(function () {
        Route::get('all/menu', 'AllMenu')->name('all.menu');
        Route::get('client/menu/add', 'ClientMenuAdd')->name('client.menu.add');
        Route::post('client/menu/store', 'ClientMenuStore')->name('client.menu.store');
        Route::get('client/menu/edit/{id}', 'ClientMenuEdit')->name('client.menu.edit');
        Route::post('client/menu/update/{id}', 'ClientMenuUpdate')->name('client.menu.update');
        Route::get('client/menu/delete/{id}', 'ClientMenuDelete')->name('client.menu.delete');
    });

    //for Product
    Route::controller(RestaurantController::class)->group(function () {
        Route::get('client/product/', 'ClientProductAll')->name('client.product.all');
        Route::get('client/product/add', 'ClientProductAdd')->name('client.product.add');
        Route::post('client/product/store', 'ClientProductStore')->name('client.product.store');
        Route::get('client/product/edit/{id}', 'ClientProductEdit')->name('client.product.edit');
        Route::post('client/product/update/{id}', 'ClientProductUpdate')->name('client.product.update');
        Route::get('client/product/delete/{id}', 'ClientProductDelete')->name('client.product.delete');
        Route::get('/changeStatus', 'ChangeStatus');
    });
    //end all route for client menu

    //all route for Photo Gallery
    Route::controller(RestaurantController::class)->group(function () {
        Route::get('client/gallery/all', 'ClientGalleryAll')->name('client.gallery.all');
        Route::get('client/gallery/add', 'ClientGalleryAdd')->name('client.gallery.add');
        Route::post('client/gallery/store', 'ClientGalleryStore')->name('client.gallery.store');
        Route::get('client/gallery/edit/{id}', 'ClientGalleryEdit')->name('client.gallery.edit');
        Route::post('client/gallery/update/{id}', 'ClientGalleryUpdate')->name('client.gallery.update');
        Route::get('client/gallery/delete/{id}', 'ClientGalleryDelete')->name('client.gallery.delete');
    });
    //end all route for Photo Gallery

    //all route for Coupon
    Route::controller(CouponController::class)->group(function () {
        Route::get('client/coupon/all', 'ClientCouponAll')->name('client.coupon.all');
        Route::get('client/coupon/add', 'ClientCouponAdd')->name('client.coupon.add');
        Route::post('client/coupon/store', 'ClientCouponStore')->name('client.coupon.store');
        Route::get('client/coupon/edit/{id}', 'ClientCouponEdit')->name('client.coupon.edit');
        Route::post('client/coupon/update/{id}', 'ClientCouponUpdate')->name('client.coupon.update');
        Route::get('client/coupon/delete/{id}', 'ClientCouponDelete')->name('client.coupon.delete');
    });
    //end all route for Coupon

    Route::controller(ManageOrderController::class)->group(function () {
        Route::get('client/order/all', 'ClientOrderAll')->name('client.order.all');
        Route::get('client/order/view/{id}', 'ClientOrderView')->name('client.order.view');
        Route::get('client/order/confirm/{id}', 'ClientOrderConfirm')->name('client.order.confirm');
        Route::get('client/order/processing/{id}', 'ClientOrderProcess')->name('client.order.processing');
        Route::get('client/order/delivered/{id}', 'ClientOrderDelivered')->name('client.order.deliverd');
        Route::get('client/order/reject/{id}', 'ClientOrderReject')->name('client.order.reject');
    });
    Route::controller(ReviewsController::class)->group(function () {
        Route::get('client/review/all', 'ClientReviewAll')->name('client.review.all');
        Route::get('ClientchangeReviewStatus', 'ClientchangeReviewStatus');
    });
});

Route::get('restaurant/detail/{id}', [HomeController::class, 'RestaurantDetail'])->name('restaurant.detail');
//add-wish-list
Route::post('/add-wish-list/{id}', [HomeController::class, 'AddToWishlist']);
