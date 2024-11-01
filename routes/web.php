<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\ManageOrderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ReviewsController;
use App\Http\Controllers\Frontend\FilterController;




//Frontend with out auth route
Route::controller(FilterController::class)->group(function () {
    Route::get('/list/restaurants', 'ListRestaurant')->name('list.restaurants');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [UserController::class, 'Index'])->name('index');
Route::get('/dashboard', function () {
    return view('frontend.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/user/logout', [ProfileController::class, 'UserLogout'])->name('user.logout');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/password/change', [ProfileController::class, 'PasswordChange'])->name('change.password');
    Route::get('/user/favourites', [HomeController::class, 'UserFavourites'])->name('user.favourites');
    Route::get('/user/favourites/delete/{id}', [HomeController::class, 'UserFavouritesDelete'])->name('user.favourites.delete');
    Route::get('/user/checkout', [ManageOrderController::class, 'UserCheckout'])->name('user.orders.checkout');
    Route::get('/user/orders/cancel/{id}', [ManageOrderController::class, 'UserOrderCancel'])->name('user.order.cancel');
    Route::get('/user/orders/download/{id}', [ManageOrderController::class, 'UserOrderInfo'])->name('user.order.download');
});

require __DIR__.'/auth.php';
require __DIR__.'/client.php';
// admin login
Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/profile', [AdminController::class, 'Profile'])->name('admin.profile');
    Route::post('admin/profile_update', [AdminController::class, 'ProfileUpdate'])->name('admin.profile.update');
    Route::get('admin/password_change', [AdminController::class, 'PasswordChange'])->name('admin.change.password');
    Route::post('admin/password_change_submit', [AdminController::class, 'PasswordChangeSubmit'])->name('admin.change_password_submit');
});
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login_submit', [AdminController::class, 'AdminLoginSubmit'])->name('admin.login_submit');
Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('admin/forgot_password', [AdminController::class, 'ForgotPassword'])->name('admin.forgot_password');
Route::post('admin/reset_password', [AdminController::class, 'ResetPassword'])->name('admin.reset_password');
Route::get('admin/reset-password/{token}/{email}', [AdminController::class, 'ResetPasswordForm'])->name('admin.reset-password');
Route::post('admin/reset_password_submit', [AdminController::class, 'ResetPasswordSubmit'])->name('admin.reset_password_submit');
//ALL ROUTER FOR CLIENT
Route::middleware('client')->group(function () {
    Route::get('client/dashboard', [ClientController::class, 'ClientDashboard'])->name('client.dashboard');
    Route::get('client/profile', [ClientController::class, 'ClientProfile'])->name('client.profile');
    Route::post('client/profile_update', [ClientController::class, 'ClientProfileUpdate'])->name('client.profile.update');
    Route::get('client/password_change', [ClientController::class, 'ClientPasswordChange'])->name('client.change.password');
    Route::post('client/password_change_submit', [ClientController::class, 'ClientPasswordChangeSubmit'])->name('client.change_password_submit');
});
Route::get('client/register', [ClientController::class, 'ClientRegister'])->name('client.register');
Route::post('client/register_submit', [ClientController::class, 'ClientRegisterSubmit'])->name('client.register_submit');
Route::get('client/login', [ClientController::class, 'ClientLogin'])->name('client.login');
Route::post('client/login_submit', [ClientController::class, 'ClientLoginSubmit'])->name('client.login_submit');
Route::get('client/logout', [ClientController::class, 'ClientLogout'])->name('client.logout');
Route::get('client/forgot_password', [ClientController::class, 'ClientForgotPassword'])->name('client.forgot_password');
Route::post('client/reset_password', [ClientController::class, 'ClientResetPassword'])->name('client.reset_password');
Route::get('client/reset-password/{token}/{email}', [ClientController::class, 'ClientResetPasswordForm'])->name('client.reset-password');
Route::post('client/reset_password_submit', [ClientController::class, 'ClientResetPasswordSubmit'])->name('client.reset_password_submit');
//all router for category
Route::middleware('admin')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('all/category', 'AllCategory')->name('all.category');
        Route::get('store/category', 'AddCategory')->name('admin.category.add');
        Route::post('store/category/submit', 'AddCategoryStore')->name('admin.category.store');
        Route::get('edit/category/{id}', 'EditCategory')->name('admin.category.edit');
        Route::post('update/category/{id}', 'UpdateCategory')->name('admin.category.update');
        Route::get('delete/category/{id}', 'DeleteCategory')->name('admin.category.delete');

    });
});
//end all router for category
//all router for city
Route::middleware('admin')->group(function () {
    Route::controller(CityController::class)->group(function () {
        Route::get('all/city', 'AllCity')->name('all.city');
        Route::get('store/city', 'AddCity')->name('admin.city.add');
        Route::post('store/city/submit', 'AddCityStore')->name('admin.city.store');
        Route::get('edit/city/{id}', 'EditCity')->name('admin.city.edit');
        Route::post('update/city/{id}', 'UpdateCity')->name('admin.city.update');
        Route::get('delete/city/{id}', 'DeleteCity')->name('admin.city.delete');

    });
});
//end all router for city

//all router for manage
Route::middleware('admin')->group(function () {
    Route::controller(ManageController::class)->group(function () {
        Route::get('all/admin/product', 'AllProduct')->name('admin.all.product');
        Route::get('store/admin/product', 'AddProduct')->name('admin.add.product');
        Route::post('store/admin/product/submit', 'AddProductStore')->name('admin.product.store');
        Route::get('edit/admin/product/{id}', 'EditProduct')->name('admin.edit.product');
        Route::post('update/admin/product/{id}', 'UpdateProduct')->name('admin.update.product');
        Route::get('delete/admin/product/{id}', 'DeleteProduct')->name('admin.delete.product');

        Route::get('/AdminchangeStatus','AdminchangeStatus');

    });
});
//end all router for manage

// end all route for Manage Rastaurant

Route::middleware('admin')->group(function () {
    Route::controller(ManageController::class)->group(function () {
        Route::get('all/admin/restaurant', 'AllRestaurant')->name('admin.all.restaurant');
        Route::get('store/admin/restaurant', 'AddRestaurant')->name('admin.add.restaurant');
        // Route::post('store/admin/restaurant/submit', 'AddRestaurantStore')->name('admin.restaurant.store');
        Route::get('edit/admin/restaurant/{id}', 'EditRestaurant')->name('admin.edit.restaurant');
        // Route::post('update/admin/restaurant/{id}', 'UpdateRestaurant')->name('admin.update.restaurant');
        Route::get('delete/admin/restaurant/{id}', 'DeleteRestaurant')->name('admin.delete.restaurant');
        Route::get('ClientchangeStatus','ClientchangeStatus');
    });
});


// end all route for Manage Rastaurant

//Manage Banner Route
Route::middleware('admin')->group(function () {
    Route::controller(ManageController::class)->group(function () {
        Route::get('all/admin/banner', 'AllBanner')->name('admin.all.banner');
        Route::get('store/admin/banner', 'AddBanner')->name('admin.add.banner');
        Route::post('store/admin/banner/submit', 'AddBannerStore')->name('admin.banner.store');
        Route::get('edit/admin/banner/{id}', 'EditBanner')->name('admin.banner.edit');
        Route::post('update/admin/banner/', 'UpdateBanner')->name('admin.update.banner');
        Route::get('delete/admin/banner/{id}', 'DeleteBanner')->name('admin.banner.delete');
    });
});
//Manage Order Route Admin 
Route::middleware('admin')->group(function () {
    Route::controller(ManageOrderController::class)->group(function () {
        Route::get('all/admin/order', 'AdminAllOrder')->name('admin.all.order');
        Route::get('view/admin/order/{id}', 'AdminViewOrder')->name('admin.order.details');
        Route::get('print/admin/order/confirm/{id}', 'AdminOrderConfirm')->name('admin.order.confirm');
        Route::get('print/admin/order/processing/{id}', 'AdminOrderProcess')->name('admin.order.processing');
        Route::get('print/admin/order/delivered/{id}', 'AdminOrderDelivered')->name('admin.order.deliverd');
        
    });
    Route::controller(ReviewsController::class)->group(function () {
        Route::get('admin/pending/review', 'AdminPendingReview')->name('admin.pending.review');
        Route::get('admin/approved/review', 'AdminApprovedReview')->name('admin.approved.review');
        Route::get('admin/delete/review/{id}', 'AdminDeleteReview')->name('admin.review.delete');
        Route::get('AdminchangeReviewStatus','AdminchangeReviewStatus');
    });
});
//Manage Report Route Admin 
Route::middleware('admin')->group(function () {
    Route::controller(ReportController::class)->group(function () {
        Route::get('all/admin/report', 'AdminAllReport')->name('admin.all.report');
       
        
    });
});


// Route::get('edit/admin/banner/{id}', [ManageController::class, 'EditBanner'])->middleware('admin');
Route::controller(CartController::class)->group(function () {
    Route::post('update-from-cart', 'UpdateFromCart')->name('update.from.cart');
    Route::get('addtocart/{id}', 'AddToCart')->name('addtocart');
    Route::post('remove-from-cart', 'RemoveFromCart')->name('remove.from.cart');
    Route::post('apply-coupon', 'ApplyCoupon')->name('apply.coupon');
    Route::post('remove-coupon', 'RemoveCoupon')->name('remove.coupon');
    Route::get('/checkout', 'ShopCheckout')->name('checkout');
    
});

// Oder Route group OrderController
Route::middleware('auth')->group(function () {
    Route::controller(OrderController::class)->group(function () {
        Route::post('cash-order', 'CashOrder')->name('cash.order');
        // Route::get('checkout-success', 'CashOrderSubmit')->name('frontend.checkout.success');
        

    });
});

Route::middleware('auth')->group(function () {
    Route::controller(ReviewsController::class)->group(function () {
        Route::post('store/review', 'CommentStore')->name('comment.store');
        Route::post('store/review/submit', 'UpdateLike')->name('update.like');
    });
});


