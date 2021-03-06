<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderingController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Tailor\MapController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GenderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Tailor\TailorController;
use App\Http\Controllers\User\FrontendController;
use App\Http\Controllers\Tailor\GalleryController;
use App\Http\Controllers\Tailor\ProductController;
use App\Http\Controllers\Tailor\ReportsController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Tailor\CategoryController;
use App\Http\Controllers\Admin\MeasurementController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Admin\AdminCategoryController;



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


Route::get('/', [UserController::class, 'index']);




Auth::routes();


Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:web','PreventBackHistory'])->group(function () {

        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');


    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function () {

        Route::get('/cart', [CartController::class, 'viewcart']);
        Route::get('/checkout', [CheckoutController::class, 'index']);

        Route::get('/profile', [UserController::class, 'userprofile']);
        Route::put('/update-userdetails',[UserController::class,'profileUpdate']);

        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/my-orders', [CustomerController::class, 'index']);
        Route::get('/order-history', [CustomerController::class, 'orderhistory']);
        Route::get('/view-order/{id}', [CustomerController::class, 'vieworder']);
        Route::get('/wishlist', [WishlistController::class, 'index']);
        Route::post('/add-rating', [RatingController::class, 'add']);
        Route::post('/put-request', [OrderingController::class, 'putrequest']);

    });
});

        Route::get('/user/home', [FrontendController::class, 'index']);
        Route::get('/user/home/city/{city}', [FrontendController::class, 'filtercity']);
        Route::get('/user/home/region/{region}', [FrontendController::class, 'filterregion']);
        Route::get('/user/view-tailor/{tailor_id}', [FrontendController::class, 'viewtailor']);
        //  Route::get('/user/product/{tailor_id}', [FrontendController::class, 'listproduct']);
        Route::get('user/home/products', [FrontendController::class, 'product']);
        Route::get('/user/gallery/{tailor_id}', [FrontendController::class, 'listgallery']);
        Route::get('/user/view-product/{cate_slug}/{prod_slug}', [FrontendController::class, 'viewproduct']);
        Route::post('/user/add-to-cart', [CartController::class, 'addProduct']);
        Route::post('/user/delete-cart-item', [CartController::class, 'deleteproduct']);
        Route::post('/user/update-cart', [CartController::class, 'updatecart']);
        Route::post('/user/place-order', [CheckoutController::class, 'placeorder']);

        Route::post('/user/add-to-wishlist', [WishlistController::class, 'add']);
        Route::post('/user/delete-wishlist-item', [WishlistController::class, 'deleteitem']);


        Route::get('/user/view-product/{prod_slug}', [FrontendController::class, 'viewcartproduct']);
        Route::post('/user/add-to-wishcart', [CartController::class, 'addwishlistProduct']);
        Route::get('/user/load-cart-data', [CartController::class, 'cartcount']);
        Route::get('/user/load-wishlist-data', [WishlistController::class, 'wishcount']);
        Route::get('/user/search-tailor', [FrontendController::class, 'searchtailor']);
        Route::post('user/searchtailor_details', [FrontendController::class, 'searchtailor_details']);



Route::prefix('admin')->name('admin.')->group(function () {

        Route::middleware(['guest:admin','PreventBackHistory'])->group(function () {
            Route::view('/login', 'admin.login')->name('login');
            Route::post('/check', [AdminController::class, 'check'])->name('check');
            });


        Route::middleware(['auth:admin','PreventBackHistory'])->group(function () {
            Route::view('/home', 'admin.home')->name('home');
            Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
            Route::get('categories',[AdminCategoryController::class,'index']);

            Route::get('add-ccategories',[AdminCategoryController::class,'add']);
            Route::post('insert-category',[AdminCategoryController::class,'insert']);
            Route::get('edit-cat/{category_id}', [AdminCategoryController::class ,'edit']);
            Route::put('update-cat/{category_id}', [AdminCategoryController::class ,'update']);
            Route::get('delete-cat/{category_id}', [AdminCategoryController::class ,'destroy']);
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

            Route::put('update-status', [AdminController::class ,'statusupdate']);

            Route::post('register-tailor',[AdminController::class,'tailorregister']);
            Route::get('reports',[ReportController::class,'index']);
            Route::get('pdfpage',[ReportController::class,'reportpdf']);
            Route::get('pdf',[ReportController::class,'pdf']);
    });



});



Route::get('region',[TailorController::class,'region']);

Route::prefix('tailor')->name('tailor.')->group(function () {
            Route::middleware(['guest:tailor','PreventBackHistory'])->group(function ()
             {
                Route::view('/login', 'tailor.login')->name('login');
                Route::view('/register', 'tailor.register')->name('register');
                Route::post('/create', [TailorController::class,'create'])->name('create');
                Route::post('/check', [TailorController::class, 'check'])->name('check');

            });


            Route::middleware(['auth:tailor','PreventBackHistory'])->group(function () {
                Route::view('/home', 'tailor.home')->name('home');
                Route::post('logout', [TailorController::class, 'logout'])->name('logout');
                Route::get('details',[TailorController::class,'index']);
                Route::get('',[TailorController::class,'region']);

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

                Route::get('add-map',[MapController::class,'create']);
                Route::get('list-map',[MapController::class,'index']);
                Route::post('insert-map',[MapController::class,'store']);
                 Route::get('view-map/{id}',[MapController::class,'view']);

                Route::put('update-map/{id}',[MapController::class,'update']);
                Route::get('delete-map/{id}',[MapController::class,'destroy']);


                Route::get('orders',[OrderingController::class,'index']);
                Route::get('view-order/{id}',[OrderingController::class,'vieworder']);
                Route::put('update-order/{id}',[OrderingController::class,'updateorder']);
                Route::get('order-history',[OrderingController::class,'orderhistory']);

                Route::get('delete-order/{id}',[OrderingController::class,'deleteorder']);
                Route::get('delete-measurement_detail/{id}',[OrderingController::class,'deletemeasurement']);
                
                Route::get('create-order',[OrderingController::class,'createorder']);
                Route::post('add-order',[OrderingController::class,'addorder']);
                Route::get('view-requests',[OrderingController::class,'viewrequests']);
                Route::get('delete-request/{id}',[OrderingController::class,'deleterequest']);
                Route::get('measurement',[OrderingController::class,'viewmeasurement']);

                Route::get('add-categories',[CategoryController::class,'add']);
                Route::post('post-categories',[CategoryController::class,'postcategory']);
                Route::get('view-categories',[CategoryController::class,'index']);

                Route::get('reports',[ReportsController::class,'index']);



            });

});














