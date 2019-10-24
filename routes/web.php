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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});



// Products Routes
Route::get('product', 'ProductsController@products');
Route::get('product/add', 'ProductsController@add');
Route::get('product/edit/{id}', 'ProductsController@edit');
Route::get('product/delete/{id}', 'ProductsController@delete');
Route::post('product/action', 'ProductsController@createUpdate');

// PurchaseOrders Routes
Route::get('purchaseOrder', 'PurchaseOrdersController@purchaseOrders');
Route::get('purchaseOrder/add', 'PurchaseOrdersController@add');
Route::get('purchaseOrder/edit/{id}', 'PurchaseOrdersController@edit');
Route::get('purchaseOrder/delete/{id}', 'PurchaseOrdersController@delete');
Route::post('purchaseOrder/action', 'PurchaseOrdersController@createUpdate');

// InventoryItem Routes
Route::get('inventory', 'InventoryController@inventory');
Route::get('inventory/bulkadd', 'InventoryController@bulkAdd');
Route::get('inventory/add', 'InventoryController@add');
Route::get('inventory/edit/{id}', 'InventoryController@edit');
Route::get('inventory/delete/{id}', 'InventoryController@delete');
Route::post('inventory/action', 'InventoryController@createUpdate');
Route::post('inventory/bulkaction', 'InventoryController@bulkCreate');

// Locations Routes
Route::get('location', 'LocationsController@locations');
Route::get('location/add', 'LocationsController@add');
Route::get('location/edit/{id}', 'LocationsController@edit');
Route::get('location/delete/{id}', 'LocationsController@delete');
Route::post('location/action', 'LocationsController@createUpdate');
