<?php

use Illuminate\Support\Facades\Route;

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
    if (Auth::check()) {
        return redirect()->route('home');
    }

    return view('auth.login');
})->name('welcome');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['middleware'=>'admin'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    //Base Currency
    Route::get('/base/currency', 'AdminExchangeController@base_currency')->name('base.currency');
    Route::post('/base/currency/update', 'AdminExchangeController@base_currency_update')->name('base.currency.update');

    //Alerts
    Route::resource('/alerts', 'AdminAlertsController', ['names'=>[
        'index'=>'admin.alerts.index',
        'create'=>'admin.alerts.create',
        'store'=>'admin.alerts.store',
        'edit'=>'admin.alerts.edit',
        'destroy'=>'admin.alerts.destroy',
        'show'=>'admin.alerts.show',
        'update'=>'admin.alerts.update'
    ]]);
});
