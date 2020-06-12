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

Route::get('/', 'FrontController@index')->name('customer.index');
Route::get('/san-pham/{id}', 'FrontController@item')->name('customer.item');
Route::get('/danh-muc/{id}', 'FrontController@category')->name('customer.category');
Route::get('/tat-ca-san-pham', 'FrontController@all_category')->name('customer.all_category');
Route::get('giam-gia', 'FrontController@discount')->name('customer.discount');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['checkacl:admin'], ['auth'])->group(function () {

    // module discount
    Route::prefix('discount')->group(function () {

        Route::get('/', 'DiscountController@index')->name('discount.index');
        Route::get('/create', 'DiscountController@create')->name('discount.add');
        Route::post('/create', 'DiscountController@store')->name('discount.store');
        Route::get('/delete/{id}', 'DiscountController@delete')->name('discount.delete');
    });

    // module item
    Route::prefix('item')->group(function () {

        Route::get('/', 'ItemController@index')->name('item.index');
        Route::get('/create', 'ItemController@create')->name('item.add');
        Route::post('/create', 'ItemController@store')->name('item.store');
        Route::get('/edit/{id}', 'ItemController@edit')->name('item.edit');
        Route::post('/edit/{id}', 'ItemController@update')->name('item.edit');
        Route::get('/delete/{id}', 'ItemController@delete')->name('item.delete');
        Route::get('getItem', 'ItemController@getItem')->name('item.getItem');
    });

    // module gallery
    Route::prefix('gallery')->group(function () {

        Route::get('/', 'GalleryController@index')->name('gallery.index');
        Route::get('/create', 'GalleryController@create')->name('gallery.add');
        Route::post('/create', 'GalleryController@store')->name('gallery.store');
        Route::get('getLibrary', 'GalleryController@getLibrary')->name('discount.getLibrary');
    });

    // module supplier
    Route::prefix('supplier')->group(function () {

        Route::get('/', 'SupplierController@index')->name('supplier.index');
        Route::get('/create', 'SupplierController@create')->name('supplier.add');
        Route::post('/create', 'SupplierController@store')->name('supplier.store');
        Route::get('/edit/{id}', 'SupplierController@edit')->name('supplier.edit');
        Route::post('/edit/{id}', 'SupplierController@update')->name('supplier.edit');
        Route::get('/delete/{id}', 'SupplierController@delete')->name('supplier.delete');
    });

    // module system
    Route::prefix('system')->group(function () {

        Route::get('/', 'SystemController@index')->name('system.index');
        Route::get('/create', 'SystemController@create')->name('system.add');
        Route::post('/create', 'SystemController@store')->name('system.store');
        Route::get('/edit/{id}', 'SystemController@edit')->name('system.edit');
        Route::post('/edit/{id}', 'SystemController@update')->name('system.edit');
        Route::get('/delete/{id}', 'SystemController@delete')->name('system.delete');
    });

    // module user
    Route::middleware(['checkacl:users'])->prefix('users')->group(function () {

        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/create', 'UserController@create')->name('user.add');
        Route::post('/create', 'UserController@store')->name('user.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::post('/edit/{id}', 'UserController@update')->name('user.edit');
        Route::get('/delete/{id}', 'UserController@delete')->name('user.delete');
    });

    // module role
    Route::middleware(['checkacl:roles'])->prefix('roles')->group(function () {

        Route::get('/', 'RoleController@index')->name('role.index');
        Route::get('/create', 'RoleController@create')->name('role.add');
        Route::post('/create', 'RoleController@store')->name('role.store');
        Route::get('/edit/{id}', 'RoleController@edit')->name('role.edit');
        Route::post('/edit/{id}', 'RoleController@update')->name('role.edit');
        Route::get('/delete/{id}', 'RoleController@delete')->name('role.delete');
    });

});