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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/detail', 'detailController@index')->name('detail_patient');
Route::get('/detail/{id}', 'detailController@fullDetail')->name('fullDetail');
Route::get('/detail_p', 'detailController@detail_p')->name('detail_p');



//resource controller 'patient Session'
Route::resource('patientSession', 'patientSession');
Route::resource('doctor', 'doctorController');
Route::resource('patient', 'patientController');
Route::resource('payment', 'paymentController');


});
