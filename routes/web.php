<?php

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
//     return view('welcome');
// });
Route::get('/', 'RegistrationController@index')->name('home');


Auth::routes();
Route::get('/city/{id?}', 'RegistrationController@getCity')->name('city');

Route::get('/register', 'RegistrationController@register')->name('register');
Route::post('/register', 'RegistrationController@createSupplier')->name('register.supplier');
Route::get('/booking/cylinder/{id?}', 'RegistrationController@bookingCylinder')->name('booking.cylinder');
Route::post('/consumer/booking', 'RegistrationController@createConsumerBooking')->name('consumer.booking');


Route::get('/home', 'HomeController@index')->name('home');
