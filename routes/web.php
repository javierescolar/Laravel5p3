<?php

//Route::post('removeproductcart', 'CartsController@removeProductCart');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/map', 'MapController@map');
Route::get('search', 'HomeController@search');
Route::get('searchAdvance', 'HomeController@searchAdvance');
//Google + Auth
// Provide controller methods with object instead of ID
Route::model('images', 'Image');
Route::model('products', 'Product');
Route::model('brands', 'Brand');

Route::model('adminimages', 'Image');
Route::model('adminproducts', 'Product');
Route::model('adminbrands', 'Brand');

//Forma de enmascarar las Url por el slug y no por el Id
Route::bind('image', function($value, $route) {
    return App\Image::whereSlug($value)->first();
});
Route::bind('product', function($value, $route) {
    return App\Product::whereSlug($value)->first();
});
Route::bind('brand', function($value, $route) {
    return App\Brand::whereSlug($value)->first();
});

//Forma de enmascarar las Url por el slug y no por el Id
Route::bind('adminimage', function($value, $route) {
    return App\Image::whereSlug($value)->first();
});
Route::bind('adminproduct', function($value, $route) {
    return App\Product::whereSlug($value)->first();
});
Route::bind('adminbrand', function($value, $route) {
    return App\Brand::whereSlug($value)->first();
});

//creacion de rutas resources más adaptadas al proyecto y sus dependencias
Route::resource('brands', 'BrandsController', ['only' => ['show']]);
Route::resource('brands.products', 'ProductsController', ['only' => ['show']]);
Route::resource('brands.products.images', 'ImagesController', ['only' => ['index']]);

Route::group(['middleware' => ['admin']], function () {
    //Rutas para el Administrador
    Route::get('homeAdmin', 'AdminController@index');
    Route::resource('adminbrands', 'BrandsAdminController');
    Route::resource('adminbrands.adminproducts', 'ProductsAdminController');
    Route::resource('adminbrands.adminproducts.adminimages', 'ImagesAdminController');
    //Rutas de admin controller
    Route::post('deleteUser/{id}', 'AdminController@deleteUser');
    Route::post('actdesuser/{id}/active/{active}', 'AdminController@actdesUser');
    Route::post('uploadXML', 'AdminController@uploadXML');
    Route::get('adminusers', [
        'uses' => 'AdminController@getUsers',
        'as' => 'adminusers'
    ]);
    Route::get('amdinUploadXML', [
        'uses' => 'AdminController@getFormUploadXML',
        'as' => 'amdinUploadXML'
    ]);
});

//Agrego una ruta necesaria para seguir con el patron de rutas
Route::get('adminproducts', [
    'uses' => 'ProductsAdminController@index',
    'as' => 'products'
]);

//get clase auth
Route::get('login', [
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'login'
]);
//Reser de Password para el usuario
Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('register', [
    'uses' => 'Auth\RegisterController@showRegistrationForm',
    'as' => 'register'
]);


//post clase auth
Route::post('login', [
    'uses' => 'Auth\LoginController@login',
    'as' => 'login'
]);

Route::get('logout', [
    'uses' => 'Auth\LoginController@logout',
    'as' => 'logout'
]);

Route::post('register', [
    'uses' => 'Auth\RegisterController@register',
    'as' => 'register'
]);

//ruta de confirmacion de usuario por cuenta
Route::get('confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\RegisterController@confirmRegister');

//Edicion de perfil de usuario
Route::group(['middleware' => ['auth']], function () {
    Route::get('emptyCart', 'CartsController@emptyCart');
    Route::get('/addproductcart/{id}', 'CartsController@addProductCart');
    Route::get('cart', 'CartsController@show');
    Route::get('profile', [
        'uses' => 'UserController@getProfile',
        'as' => 'profile'
    ]);
    Route::post('profile', [
        'uses' => 'UserController@editProfile',
        'as' => 'profile'
    ]);
    Route::post('deleteProfile', [
        'uses' => 'UserController@deleteProfile',
        'as' => 'delete'
    ]);
    Route::get('profile/google/{provider?}', 'SocialController@getSocialAuth');
    Route::get('profile/callback/{provider?}', 'SocialController@getSocialAuthCallback');
});



