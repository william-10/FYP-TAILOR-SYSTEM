<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HomeController;
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

    Route::middleware(['guest:api','PreventBackHistory'])->group(function () {

        Route::view('/mobile/login', 'dashboard.user.login')->name('login');
        Route::view('/mobile/register', 'dashboard.user.register')->name('register');
        Route::post('/mobile/create', [UserController::class, 'create'])->name('create');
        Route::post('/mobile/check', [UserController::class, 'check'])->name('check');


    });

    Route::middleware(['auth:api'])->group(function () {


        Route::get('/users', [HomeController::class, 'index']);
        Route::get('/mobile/my-orders', [CustomerController::class, 'index']);
        Route::get('/mobile/view-order/{id}', [CustomerController::class, 'vieworder']);


    });
});
        Route::post('/register', [HomeController::class, 'register']);
        Route::post('login', [HomeController::class, 'login']);

        Route::get('/user/mobile/home', [FrontendController::class, 'index']);
        Route::get('/user/mobile/view-tailor/{tailor_id}', [FrontendController::class, 'viewtailor']);
        Route::get('/user/mobile/gallery/{tailor_id}', [FrontendController::class, 'listgallery']);

        Route::get('/user/mobile/tailor', [FrontendController::class, 'tailor']);
        Route::get('/user/mobile/users', [FrontendController::class, 'customers']);
        Route::get('/user/mobile/map', [FrontendController::class, 'map']);
        Route::get('/user/mobile/gallery', [FrontendController::class, 'gallery']);
        Route::get('/user/mobile/order', [FrontendController::class, 'order']);
        // Route::post('/user/mobile/post_city', [FrontendController::class, 'postcity']);
        Route::get('/user/mobile/city/{RegionCode}', [FrontendController::class, 'city']);
        Route::get('/user/mobile/region', [FrontendController::class, 'region']);


        //  Route::get('/user/product/{tailor_id}', [FrontendController::class, 'listproduct']);
        // Route::get('user/mobile/products', [FrontendController::class, 'product']);
        // Route::get('/user/mobile/view-product/{cate_slug}/{prod_slug}', [FrontendController::class, 'viewproduct']);
        // Route::get('/user/mobile/view-product/{prod_slug}', [FrontendController::class, 'viewcartproduct']);
