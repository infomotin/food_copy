<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Client\RestaurantController;




require __DIR__.'/auth.php';


// all route for client menu here
Route::middleware('client')->group(function () {
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

});

