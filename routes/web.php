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

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);


//Authentication Routers
Auth::routes();


//Menu Router
Route ::get('/menu', [
    'as' => 'menu',
    'uses' => 'MenuController@showMenu']);

//Order Routers
Route ::get('/order',[
    'as' => 'order',
    'uses' => 'OrderController@showMenu'])->middleware('auth');
    ;

Route ::post('/order',[
    'as' => 'order',
    'uses' => 'OrderController@order'])->middleware('auth');

Route ::get('/confirmOrder', [
        'as' => 'confirmOrder',
        'uses' => 'confirmOrderController@showCart'
        ])->middleware('auth');

Route ::post('/confirmOrder', [
    'as' => 'confirmOrder',
    'uses' => 'confirmOrderController@confirmOrder'
    ])->middleware('auth');

Route ::get('viewOrders', [
    'as' => 'viewOrders',
    'uses' => 'ViewOrdersController@viewOrders'
    ])->middleware('auth');

Route::post('viewOrders',
[
        'as' => 'vieworders',
        'uses' => 'ViewOrdersController@updateFeedback'
])->middleware('auth');
                

Route::get('rate',
[
        'as' => 'rate',
        'uses' => 'RateController@showMenu'
])->middleware('auth');    


Route::post('rate',
[
        'as' => 'rate',
        'uses' => 'RateController@addRating'
])->middleware('auth');  


#Admin routes
Route::get('/admin/menu',[
    'as' => 'adminMenu',
    'uses' => 'AdminController@showMenu'])->middleware('admin');


Route ::get('/admin/editMenu', [
    'as' => 'editMenu',
    'uses' => 'AdminController@editMenu'
    ])->middleware('admin');

Route ::post('/admin/editMenu', [
    'as' => 'editMenu',
    'uses' => 'AdminController@editMenu'
    ])->middleware('admin');
 
Route ::get('admin/addMenuItem', [
    'as' => 'addMenuItem',
    'uses' => 'AdminController@addMenuItem'
    ])->middleware('admin');

Route ::post('admin/addMenuItem', [
    'as' => 'addMenuItem',
    'uses' => 'AdminController@addItem'
    ])->middleware('admin');
    

Route ::get('admin/orders', [
    'as' => 'orders',
    'uses' => 'AdminController@viewOrders'
    ])->middleware('admin');

Route ::post('admin/orders', [
    'as' => 'orders',
    'uses' => 'AdminController@releaseOrder'
    ])->middleware('admin');

    
    
Route ::get('admin/viewUsers', [
    'as' => 'viewUsers',
    'uses' => 'AdminController@viewUsers'
    ])->middleware('admin');


Route ::post('admin/viewUsers', [
    'as' => 'viewUsers',
    'uses' => 'AdminController@removeUser'
    ])->middleware('admin');

        



        