<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::get('/{hotspot}', 'IndexController@index');
Route::get('/{hotspot}/category/{category}', 'CategoryController@getCateg');
Route::get('/{hotspot}/adverts/{advert}', 'AdvertsController@getAdvert');
Route::get('{hotspot}/adverts/{advert}/deals/{name}', 'DealsController@getDeal');
Route::get('{hotspot}/register', 'UsersController@getRegister');
Route::get('{hotspot}/logout', 'UsersController@getLogout');
Route::post('{hotspot}/register', array('uses'=> 'UsersController@create'));


Route::get('authors', 'AuthorsController@home');


Route::get('/', function(){
    return Redirect::to('/wivert');
});
Route::post('/{hotspot}', 'UsersController@doLogin');

Route::post('/{hotspot}/payment', array(
    'as' => '{hotspot}.payment',
    'uses' => 'PaypalController@postPayment',
));

// this is after make the payment, PayPal redirect back to your site
Route::post('{hotspot}/payment/status', array('uses'=> 'PaypalController@getPayment'));
Route::post('{hotspot}/payment/prepayment', array('uses'=> 'PaypalController@prePayment'));

