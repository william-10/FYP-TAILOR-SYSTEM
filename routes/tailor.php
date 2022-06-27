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

    // Route::middleware(['guest:web'])->group(function () {
    //     Route::view('/mobile/register', 'dashboard.user.register')->name('register');
    //     Route::post('/mobile/userregister', [UserController::class, 'createuser']);
    //     Route::post('/mobile/check', [UserController::class, 'check'])->name('check');



    // });

    // Route::middleware(['auth:web'])->group(function () {
    //     Route::get('/users', [HomeController::class, 'index']);
    //     Route::get('/mobile/my-orders', [CustomerController::class, 'index']);
    //     Route::get('/mobile/view-order/{id}', [CustomerController::class, 'vieworder']);


    // });



    Route::middleware(['guest:tailor-api'])->group(function () {

        Route::post('tailor/mobile/create', [UserController::class, 'create']);
        Route::post('mobile/register',[UserController::class,'registertailor']);
        Route::post('/mobile/login', [UserController::class, 'check']);



    });

    Route::middleware(['auth:tailor-api'])->group(function () {

        Route::get('tailor/mobile/my-orders', [CustomerController::class, 'index']);
        // Route::get('edit-profile',[TailorController::class,'edit']);
        // Route::put('update-details',[TailorController::class,'profileUpdate']);
        // Route::get('details',[TailorController::class,'index']);
        // Route::get('view-gallery',[GalleryController::class,'view']);     //In pause,will be used later
        // Route::get('add-picture',[GalleryController::class,'add']);
        // Route::post('insert-picture',[GalleryController::class,'store']);
        // Route::get('delete-picture/{id}', [GalleryController::class ,'destroy']);
        // Route::get('avator',[TailorController::class,'view']);
        // Route::put('update-avator',[TailorController::class,'updateavator']);
    });





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

