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
    //redireccionar el welcome por auth.login
    return view('auth.login');
});

//Route::get('/invoices', function () {
    //return view('invoices.index');
//});

Route::resource('invoices','InvoicesController');

//para que me respete el login ->middleware('auth');
Route::resource('clients','ClientsController')->middleware('auth');

//para que no salga el register del administrador (que seria yo)
//asi para que no salga el registerAuth::routes(['register'=>false]);
//se hace asi Auth::routes(); para que salga el register
//este pedazo para que no se pueda resetear la contraseña 'reset'=>false
Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
