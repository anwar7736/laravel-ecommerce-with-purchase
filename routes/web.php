<?php
use Illuminate\Support\Facades\Route;
//frontend
use App\Http\Controllers\Frontend\AuthController as UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductController as FrontProduct;

//backend
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\HomeSectionImageController;
use App\Http\Controllers\Backend\ProductDiscountController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\CareerController;


//frontend
Route::group(['as'=>'front.'], function() {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/','home')->name('home');
    });

    Route::controller(FrontProduct::class)->group(function(){
        Route::get('/products','index')->name('products.index');
        Route::get('/product-show/{id}','show')->name('products.show');
    });


    Route::controller(UserController::class)->group(function(){
        Route::post('/user-login','login')->name('login');
        Route::post('/user-register','Register')->name('register');
    });


    Route::resource('/carts',CartController::class);

    Route::group(['middleware' => 'auth'], function() {
        Route::resource('/checkouts',CheckoutController::class);
    });

});

Route::view('about-us', 'frontend.about-us.about-us');
Route::view('career', 'frontend.career.career');
Route::view('protecting-our-brands', 'frontend.protecting_our_brands.protecting_our_brands');
Route::view('privacy-notice', 'frontend.privacy-notice.privacy-notice');

Auth::routes();


//backend
Route::controller(AuthController::class)->group(function(){
    Route::get('/admin-login','login')->name('admin.login');
    Route::post('/admin-login','postLogin')->name('admin.postLogin');
});

Route::group(['prefix' => 'admin','middleware' => 'auth','as'=>'admin.'], function() {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/file-upload',[ProductController::class,'fileUpload'])->name('ckeditor.upload');


    Route::resource('/products',ProductController::class);
    Route::resource('/categories',CategoryController::class);
    Route::resource('/sliders',SliderController::class);
    Route::resource('/orders',OrderController::class);
    Route::resource('/users',UsersController::class);
    Route::resource('/roles',RoleController::class);
    Route::resource('/permissions',PermissionController::class);
    Route::resource('/types',TypeController::class);
    Route::resource('/sizes',SizeController::class);
    Route::resource('/purchase',PurchaseController::class);
    Route::resource('/about_us',AboutUsController::class);
    Route::resource('/career',CareerController::class);

    Route::resource('/home-section-images',HomeSectionImageController::class,['names'=>'home_section_images']);
    Route::resource('/product-discounts',ProductDiscountController::class,['names'=>'product_discounts']);

    Route::get('/get-discount-product',[ProductDiscountController::class,'getDiscountProduct'])->name('getDiscountProduct');
    Route::get('/product-entry',[ProductDiscountController::class,'productEntry'])->name('productEntry');


    Route::get('/get-purchase-product',[PurchaseController::class,'getPurchaseProduct'])->name('getPurchaseProduct');
    Route::get('/purchase-product-entry',[PurchaseController::class,'purchaseProductEntry'])->name('purchaseProductEntry');


});


