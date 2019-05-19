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



Route::get('/addPayment', function(){return view('addPayment');}

)->middleware('auth')->name('addPayment');


Route::get('/addPatient', function(){return view('addPatient');}

)->middleware('auth')->name('addPatient');

Route::get('/addDoc', function(){return view('addDoc');}

)->middleware('auth')->name('addDoc');

Route::get('/home', 'HomeController@index')->name('home');


//resource controller 'patient Session'
Route::resource('patientSession', 'patientSession');

Route::get('/sessionView', 'PostViewController@view_session');
Route::get('/patientListView', 'PostViewController@view_patientList');
Route::get('/docListView', 'PostViewController@view_docList');

