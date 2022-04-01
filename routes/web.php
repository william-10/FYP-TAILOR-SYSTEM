<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GenderController;
use App\Http\Controllers\Tailor\TailorController;
use App\Http\Controllers\User\FrontendController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Tailor\GalleryController;
use App\Http\Controllers\Tailor\ProductController;
use App\Http\Controllers\Admin\MeasurementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.user.index');
// });




Auth::routes();


Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:web','PreventBackHistory'])->group(function () {

        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');

        //  Route::get('/home', [FrontendController::class, 'index']);
        //  Route::get('view-tailor/{tailor_name}', [FrontendController::class, 'viewtailor']);


    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function () {

        //  Route::view('/home',[FrontendController::class, 'index']);    //it was 'dashboard.user.home' name('home')

        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        // Route::get('/', [FrontendController::class, 'index']);
        // Route::get('view-tailor/{tailor_name}', [FrontendController::class, 'viewtailor']);
    });
});

Route::get('/user/home', [FrontendController::class, 'index']);
Route::get('/user/view-tailor/{tailor_name}', [FrontendController::class, 'viewtailor']);

Route::prefix('admin')->name('admin.')->group(function () {

        Route::middleware(['guest:admin','PreventBackHistory'])->group(function () {
            Route::view('/login', 'admin.login')->name('login');
            Route::post('/check', [AdminController::class, 'check'])->name('check');
            });


        Route::middleware(['auth:admin','PreventBackHistory'])->group(function () {
            Route::view('/home', 'admin.home')->name('home');
            Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
            Route::get('categories',[CategoryController::class,'index']);

            Route::get('add-categories',[CategoryController::class,'add']);
            Route::post('insert-category',[CategoryController::class,'insert']);
            Route::get('edit-cat/{category_id}', [CategoryController::class ,'edit']);
            Route::put('update-cat/{category_id}', [CategoryController::class ,'update']);
            Route::get('delete-cat/{category_id}', [CategoryController::class ,'destroy']);
            Route::get('view_tailors',[AdminController::class,'index']);
            Route::get('delete-tailor/{tailor_id}', [AdminController::class ,'destroy']);

            Route::get('view_customers',[AdminController::class,'customerview']);

            Route::get('measurement',[MeasurementController::class,'index']);
            Route::get('add-measurement',[MeasurementController::class,'create']);
            Route::post('insert-measurement',[MeasurementController::class,'store']);
            Route::get('edit-measurement/{id}', [MeasurementController::class ,'edit']);
            Route::put('update-measurement/{id}', [MeasurementController::class ,'update']);
            Route::get('delete-measurement/{id}', [MeasurementController::class ,'destroy']);

            Route::get('gender',[GenderController::class,'index']);
            Route::get('add-gender',[GenderController::class,'create']);
            Route::post('insert-gender',[GenderController::class,'store']);
            Route::get('edit-gender/{id}', [GenderController::class ,'edit']);
            Route::put('update-gender/{id}', [GenderController::class ,'update']);
            Route::get('delete-gender/{id}', [GenderController::class ,'destroy']);













    });



});




Route::prefix('tailor')->name('tailor.')->group(function () {
            Route::middleware(['guest:tailor','PreventBackHistory'])->group(function () {
                Route::view('/login', 'tailor.login')->name('login');
                Route::view('/register', 'tailor.register')->name('register');
                Route::post('/create', [TailorController::class,'create'])->name('create');
                Route::post('/check', [TailorController::class, 'check'])->name('check');

            });


            Route::middleware(['auth:tailor','PreventBackHistory'])->group(function () {
                Route::view('/home', 'tailor.home')->name('home');
                Route::post('logout', [TailorController::class, 'logout'])->name('logout');
                Route::get('details',[TailorController::class,'index']);

                Route::get('edit-profile',[TailorController::class,'edit']);
                Route::put('update-details',[TailorController::class,'profileUpdate']);

                Route::get('view-gallery',[GalleryController::class,'view']);
                Route::get('add-picture',[GalleryController::class,'add']);
                Route::post('insert-picture',[GalleryController::class,'store']);
                Route::get('delete-picture/{id}', [GalleryController::class ,'destroy']);

                Route::get('avator',[TailorController::class,'view']);
                Route::put('update-avator',[TailorController::class,'updateavator']);

                Route::get('view-product',[ProductController::class,'index']);
                Route::get('add-product',[ProductController::class,'create']);
                Route::post('insert-product',[ProductController::class,'store']);
                Route::get('edit-product/{id}',[ProductController::class,'edit']);
                Route::put('update-product/{id}',[ProductController::class,'update']);
                Route::get('delete-product/{id}',[ProductController::class,'destroy']);








            });

});














