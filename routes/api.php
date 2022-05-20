<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\FrontendController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:web','PreventBackHistory'])->group(function () {

        Route::view('/mobile/login', 'dashboard.user.login')->name('login');
        Route::view('/mobile/register', 'dashboard.user.register')->name('register');
        Route::post('/mobile/create', [UserController::class, 'create'])->name('create');
        Route::post('/mobile/check', [UserController::class, 'check'])->name('check');


    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function () {

        Route::post('/mobile/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/mobile/my-orders', [CustomerController::class, 'index']);
        Route::get('/mobile/view-order/{id}', [CustomerController::class, 'vieworder']);


    });
});

        Route::get('/user/mobile/home', [FrontendController::class, 'index']);
        Route::get('/user/mobile/view-tailor/{tailor_id}', [FrontendController::class, 'viewtailor']);Route::get('/user/mobile/gallery/{tailor_id}', [FrontendController::class, 'listgallery']);

        //  Route::get('/user/product/{tailor_id}', [FrontendController::class, 'listproduct']);
        // Route::get('user/mobile/products', [FrontendController::class, 'product']);
        // Route::get('/user/mobile/view-product/{cate_slug}/{prod_slug}', [FrontendController::class, 'viewproduct']);
        // Route::get('/user/mobile/view-product/{prod_slug}', [FrontendController::class, 'viewcartproduct']);
