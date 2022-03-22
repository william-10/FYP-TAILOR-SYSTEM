<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Tailor\TailorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Tailor\GalleryController;

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

Route::get('/', function () {
    return view('dashboard.user.home');
});




Auth::routes();


Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:web','PreventBackHistory'])->group(function () {

        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
       
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function () {

        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});



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


                
                
            });

});













 
