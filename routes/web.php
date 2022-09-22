<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Http\Controllers\LoginController;
use App\Routes\Routes;

Route::get('login', [LoginController::class, 'index']);
Route::post('login/checklogin', [LoginController::class, 'checkLogin']);

Route::group(['prefix' => 'admin', 'middleware' => 'authAdmin', 'namespace'=>'admin'], function() {
    Route::get('dashboard', [LoginController::class, 'successLogin']);
    Route::get('logout', [LoginController::class, 'logout']);

    foreach((new Routes)->admin as $key=>$route){
        Route::match(['get','post'], "{$key}/{opt?}/{func?}/{id?}","{$route}@operate");
    }
});
// Admin Panel Routes


Route::group(['namespace'=>'Home'], function(){
    Route::get('/presentation', 'ProductController@presentation');
    Route::get('/presentation/{slug?}', 'ProductController@presentationList');
    Route::get('/presentation/search', 'ProductController@presentationSearch');
    
    Route::get('/', 'HomeController@index');   
    Route::get('/search', 'HomeController@search');
    Route::get('/contact-us', 'HomeController@contactUs');
    Route::get('/about-us', 'HomeController@aboutUs');
    Route::get('/catalogue/download', 'HomeController@catalogue');
    Route::get('/media-center', 'HomeController@mediaCenter');
    
    Route::get('/unsubcribe-newsletter/{email?}', 'HomeController@unsubcribeNewsletter');
    
    Route::post('/newsletter-form-submit', 'HomeController@newsletter');
    Route::post('/contact-us-form-submit', 'HomeController@contactForm');
    Route::post('/quick-enquiry-form-submit', 'HomeController@quickEnquiryForm');
    Route::post('/request-form-submit', 'HomeController@requestFormSubmit');
    
    Route::get('/term-condition', 'HomeController@terms');
    Route::get('/privacy-policy', 'HomeController@privacy');
    Route::get('/service-support', 'HomeController@service');

    // Route::get('/{brand}', 'ProductController@brand');
    // Route::get('/{brand}/{category}', 'ProductController@category')->name('category');
    // Route::get('/{brand}/{category}/{slug}', 'ProductController@productDetail');

    Route::get('/{slug?}', 'ProductController@index');
});

Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    return 'All Cache Cleared Successfully!';
});