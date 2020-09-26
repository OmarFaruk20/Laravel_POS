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

Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login.confirm', 'Auth\LoginController@Confirm')->name('login.confirm');

Route::group(['middleware' => 'auth'],function(){

    Route::get('dashboard', function () {
        return view('welcome');
    });

    Route::get('home', function(){
        return view('layout.main');
    });


    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    /*=======Start Groups Routes======*/
    Route::get('group', 'UserGroupController@index')->name('group');
    Route::get('group/create', 'UserGroupController@Create')->name('group/create');
    Route::post('group/store', 'UserGroupController@Store')->name('group/store');
    Route::get('group/edit/{id}', 'UserGroupController@Edit')->name('group/edit');
    Route::post('group/update', 'UserGroupController@Update')->name('group/update');
    Route::get('group/delete/{id}', 'UserGroupController@Delete')->name('group/delete');
    /*=======Ends Groups Routes======*/

    /*=======Start Users Routes======*/
    Route::resource('users', 'UserController');

    Route::get('users/{id}/sales','UserSalesController@index')->name('users.sales');

    Route::get('users/{id}/purchases','UserPurchasesController@index')->name('users.purchases');

    Route::get('users/{id}/payments','UserPaymentsController@index')->name('users.payments');

    Route::post('users/{id}/payments','UserPaymentsController@store')->name('users.payments.store');

    Route::delete('users/{id}/payments/{payment_id}','UserPaymentsController@destroy')->name('users.payments.destroy');



    Route::get('users/{id}/receipts','UserReceiptsController@index')->name('users.receipts');

    Route::post('users/{id}/receipts','UserReceiptsController@store')->name('users.receipts.store');

    Route::delete('users/{id}/receipts/{receipts_id}','UserReceiptsController@destroy')->name('users.receipts.destroy');

    /*=======End Users Routes======*/

    Route::resource('categories', 'CategoryController', ['except'=> ['show']]);

    Route::resource('products', 'ProductController');
});



