<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

//Rutas para el Administrador
Route::get('homeAdmin', 'AdminController@index');

Route::get('search', 'HomeController@search');

// Provide controller methods with object instead of ID
Route::model('images', 'Image');
Route::model('products', 'Product');
Route::model('brands', 'Brand');


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

//creacion de rutas resources más adaptadas al proyecto y sus dependencias
Route::resource('brands', 'BrandsController');
Route::resource('brands.products', 'ProductsController');
Route::resource('brands.products.images', 'ImagesController');

//get clase auth
Route::get('login',[
    'uses' => 'Auth\LoginController@showLoginForm',
    'as' => 'login'
]);
//Reser de Password para el usuario
Route::get('password/email','Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm');
Route::post('password/reset','Auth\ResetPasswordController@reset');

Route::get('register',[
    'uses' => 'Auth\RegisterController@showRegistrationForm',
    'as' => 'register'
]);


//post clase auth
Route::post('login',[
    'uses' => 'Auth\LoginController@login',
    'as' => 'login'
]);

Route::get('logout',[
    'uses' => 'Auth\LoginController@logout',
    'as' => 'logout'
]);

Route::post('register',[
    'uses' => 'Auth\RegisterController@register',
    'as' => 'register'
]);

//ruta de confirmacion de usuario por cuenta
Route::get('confirm/email/{email}/confirm_token/{confirm_token}', 'Auth\RegisterController@confirmRegister');

//Edicion de perfil de usuario
Route::get('profile',[
    'uses' => 'UserController@getProfile',
    'as' => 'profile'
]);
Route::post('profile',[
    'uses' => 'UserController@editProfile',
    'as' => 'profile'
]);

Route::post('deleteProfile',[
    'uses' => 'UserController@deleteProfile',
    'as' => 'delete'
]);

Route::post('deleteUser/{id}','UserController@deleteUser');
Route::post('actdesuser/{id}/active/{active}','UserController@actdesUser');
