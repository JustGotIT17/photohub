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

Route::get('/','WebController@index');
//old homepage
//Route::get('/','WebController@index');

Route::get('/login', 'AdminController@showLogin');
Route::post('/login', 'AdminController@Login');
Route::get('/logout', 'AdminController@logout');

Route::group(['before'=>'role:1'], function(){
    Route::get('/dashboard/home', 'DashboardController@home');

    Route::get('/items', 'ItemController@index');
    Route::post('/items/add', 'ItemController@add');
    Route::get('/items/edit/{id}', 'ItemController@edit');
    Route::post('/items/save/{id}', ['name'=>'items.save', 'uses'=>'ItemController@save']);
    Route::get('/items/remove/{id}', 'ItemController@remove');
    Route::get('/items/category/', 'ItemCategoryController@index');
    Route::post('/items/category/add/', 'ItemCategoryController@add');
    Route::get('/items/category/edit/{id}', 'ItemCategoryController@edit');
    Route::post('/items/category/edit/{id}', 'ItemCategoryController@update');
    Route::get('/items/category/remove/{id}', 'ItemCategoryController@remove');

    Route::get('/users', 'UserController@index');
    Route::post('/users/add', 'UserController@add');
    Route::get('/users/remove/{id}', 'UserController@remove');
    Route::get('/users/online', 'UserController@online');
    Route::get('/users/set/offline/{id}/{status}', 'UserController@setStatus');

    Route::get('/branches', 'BranchController@index');
    Route::post('/branches/add', 'BranchController@add');
    Route::get('/branches/remove/{id}', 'BranchController@remove');

    Route::post('/credits/add/',['name'=>'credit.add', 'uses'=>'CreditController@add']);
    Route::get('/credits/', ['name'=>'credit.index', 'uses'=>'CreditController@index']);

    Route::get('/gallery', ['name'=>'gallery.index', 'uses'=>'GalleryController@index']);
    Route::get('/gallery/view/{id}', ['name'=>'gallery.index', 'uses'=>'GalleryController@view']);
    Route::get('/gallery/delete/{id}', ['name'=>'gallery.delete', 'uses'=>'GalleryController@delete']);
    Route::post('/gallery/upload', ['name'=>'gallery.upload', 'uses'=>'GalleryController@upload']);
    Route::post('/gallery/album/create', ['name'=>'album.create', 'uses'=>'AlbumController@create']);

    Route::get('/advertisement', ['name'=>'advertisement.index', 'uses'=>'AdvertisementController@index']);
    Route::post('/advertisement/create', ['name'=>'advertisement.create', 'uses'=>'AdvertisementController@create']);

    Route::get('/products', ['name'=>'product.index', 'uses'=>'ProductController@index']);
    Route::post('/products/create', ['name'=>'product.index', 'uses'=>'ProductController@create']);
    Route::post('/products/category/create', ['name'=>'product.index', 'uses'=>'ProductCategoryController@create']);

    Route::get('/events', ['name'=>'event.index', 'uses'=>'EventController@index']);
    Route::post('/events/create', ['name'=>'event.create', 'uses'=>'EventController@create']);
    Route::get('/events/edit/{id}', ['name'=>'event.create', 'uses'=>'EventController@edit']);
    Route::get('/events/delete/{id}', ['name'=>'event.create', 'uses'=>'EventController@delete']);


});

Route::group(['before'=>'role:12'], function(){
    Route::get('/branches/edit/{id}', 'BranchController@edit');
    Route::post('/branches/save/{id}', 'BranchController@save');

    Route::get('/users', 'UserController@index');
    Route::get('/users/edit/{id}', 'UserController@edit');
    Route::post('/users/save/{id}', 'UserController@save');

    Route::get('/sales', 'SalesController@index');
    Route::get('/sales/view/{id}', 'SalesController@view');
    Route::get('/sales/branch/{id}', 'SalesController@branch');
    Route::get('/sales/branch/{id}/all', 'SalesController@all');

    Route::get('/reports/sales/', ['name'=>'reports.sales', 'uses'=>'ReportController@index']);
    Route::post('/reports/sales/{option}', ['name'=>'reports.sales.option', 'uses'=>'ReportController@option']);
    Route::post('/reports/view/', ['name'=>'reports.view', 'uses'=>'ReportController@view']);


});


Route::group(['before'=>'role:123'], function(){
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/sales/add', 'SalesController@add');
    Route::post('/search', 'SalesController@search');
    Route::get('/search/all', 'SalesController@searchAll');

    Route::get('/cart/add/{id}', 'CartController@add');
    Route::get('/cart/destroy', 'CartController@destroy');
    Route::get('/cart/remove/{id}', 'CartController@remove');
    Route::post('/cart/edit/{id}', 'CartController@edit');
    Route::post('/cart/checkout', 'CartController@checkout');
});

Route::get('/web/services', 'WebController@services');
Route::get('/web/branches', 'WebController@branches');
Route::get('/web/products', 'WebController@products');
Route::get('/web/contact', 'WebController@contact');
Route::get('/web/gallery', 'WebController@gallery');
Route::get('/web/events', 'WebController@events');

Route::get('/web/gallery/view/{id}', 'WebGalleryController@view');
Route::get('/web/products/view/{id}', 'WebProductController@view');




