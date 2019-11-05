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
    return redirect()->route('user.home');
});

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'Home'
], function () {
    Route::get('homepage','HomeController@home')->name('home');

    Route::get('detail-product/{id}','ProductController@detail')->name('detailProduct');
    Route::get('list-product/{idtype}','ProductController@listproduct')->name('listproduct');
    Route::get('filter-product/{idtype}~{idtrade}','ProductController@fiterproduct')->name('filterproduct');

    Route::get('userpage','UserpageController@userpage')->name('userpage');

    Route::get('error-page','HomeController@errorpage')->name('errorpage');
});
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin'
], function(){
    Route::get('login','UserController@login')->name('login');
    Route::post('admin-login', 'UserController@handleLogin')->name('handleLogin');
    Route::post('admin-logout', 'UserController@handleLogout')->name('handleLogout');
    Route::get('register','UserController@register')->name('register');
    Route::post('admin-register','UserController@handleRegister')->name('handleRegister');
    Route::get('admin-logout','UserController@handleLogout')->name('handleLogout');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['web', 'check.admin.login']
], function(){
    Route::get('dashboard','DashboardController@dashboard')->name('dashboard');

    Route::get('product-admin','ProductAdminController@product')->name('product');
    Route::get('laptop-admin','ProductAdminController@listLaptop')->name('listLaptop');
    Route::get('pc-admin','ProductAdminController@listpc')->name('listpc');

    Route::get('create-product', 'ProductAdminController@createProduct')->name('createProduct');
    Route::post('handle-create-product', 'ProductAdminController@handleCreateProduct')->name('handleCreateProduct');

    Route::post('delete-product','ProductAdminController@deleteProduct')->name('deleteProduct');

    Route::get('update-product/{id}','ProductAdminController@editProduct')->name('editProduct');
    Route::post('handle-update-product/{id}','ProductAdminController@handleEditProduct')->name('handleEditProduct');

    Route::get('create-specification','SpecificationController@createSpec')->name('createSpec');
    Route::post('handle-create-specification','SpecificationController@handleCreateSpec')->name('handleCreateSpec');

    Route::get('bill','BillController@index')->name('bill');

    Route::get('news','NewsController@index')->name('news');

    Route::get('account','AccountController@account')->name('account');

    Route::get('update-account/{id}','AccountController@updateAccount')->name('editAccount');
    Route::post('handle-update-account/{id}','AccountController@handleUpdateAccount')->name('handleEditAccount');

    Route::post('delete-account','AccountController@deleteAccount')->name('deleteAccount');
});

