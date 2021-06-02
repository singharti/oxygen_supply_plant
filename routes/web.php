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
//Home Route
Route::get('/', 'RegistrationController@index')->name('home');


Auth::routes();
//To Get city data
Route::get('/city/{id?}', 'RegistrationController@getCity')->name('city');
//for Supplier Registrtion 
Route::get('/register', 'RegistrationController@register')->name('register');
Route::post('/register', 'RegistrationController@createSupplier')->name('register.supplier');

//for Booking cylinder 
Route::get('/booking/cylinder/{id?}', 'RegistrationController@bookingCylinder')->name('booking.cylinder');
Route::post('/consumer/booking', 'RegistrationController@createConsumerBooking')->name('consumer.booking');


//Supplier Dashboard
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/booking/detail/view/{id?}', 'HomeController@viewBookingDetail')->name('booking.detail.view');
Route::get('/booking/detail/edit/{id?}', 'HomeController@editBookingDetail')->name('booking.detail.edit');
Route::post('/booking/detail/edit', 'HomeController@editConsumerDetail')->name('consumer.booking.edit');