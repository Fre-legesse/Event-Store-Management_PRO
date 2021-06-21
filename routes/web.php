<?php

use App\Http\Controllers\EventController as EventControllerAlias;
use App\Http\Controllers\RestockController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App\Http\Controllers;

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home2', [App\Http\Controllers\HomeController::class, 'test'])->name('home2');
Route::get('/Event/{id}/itemadd', [App\Http\Controllers\EventController::class, 'additem'])->name('itemadd');

Route::resource('Item',App\Http\Controllers\StockitemController::class);
Route::resource('Category',App\Http\Controllers\StockcategoryController::class);
Route::resource('Color',App\Http\Controllers\StockcolorController::class);
Route::resource('Fabric',App\Http\Controllers\StockfabricController::class);
Route::resource('Brand',App\Http\Controllers\StockbrandController::class);
Route::resource('Manufacture',App\Http\Controllers\StockmanufacturerController::class);
Route::resource('StockRoom',App\Http\Controllers\StockroomController::class);

Route::resource('Event',App\Http\Controllers\EventController::class);
Route::resource('Eventtype',App\Http\Controllers\EventtypeController::class);
Route::resource('Stock',App\Http\Controllers\stockController::class);

Route::resource('ItemRequest',App\Http\Controllers\ItemRequestController::class);
Route::resource('Transaction',App\Http\Controllers\TransactionController::class);

Route::resource('Retrunable',App\Http\Controllers\returnabledatecontroller::class);

Route::resource('Received',App\Http\Controllers\ReceivedController::class);
Route::resource('Received/{id}/test',App\Http\Controllers\ReceivedController::class);
$router->get('Received/{id}/test',[
    'uses' => 'App\Http\Controllers\ReceivedController@test',
    'as'   => 'ReceivedStock'
]);


Route::resource('Withdrawal',App\Http\Controllers\withdrawal::class);
Route::resource('Withdrawal/{id}/test',App\Http\Controllers\withdrawal::class);
$router->get('withdrawl/{id}/test',[
    'uses' => 'App\Http\Controllers\withdrawal@test',
    'as'   => 'WithdrawalIssue'
]);
//Route::resource('Stock',App\Http\Controllers\stockController::class);
//Route::get('Stock/search', [App\Http\Controllers\stockController::class, 'search']);
$router->get('Stock/show/{id}',[
    'uses' => 'App\Http\Controllers\stockController@show',
    'as'   => 'show'
]);
$router->get('Stock/create/{id}',[
    'uses' => 'App\Http\Controllers\stockController@create',
    'as'   => 'create'
]);
/*
$router->get('Withdrawal',[
    'uses' => 'App\Http\Controllers\WithdrawlController@index',
    'as'   => 'Withdrawal'
]);
*/
/*
$router->get('WithdrawalAdd',[
    'uses' => 'App\Http\Controllers\WithdrawlController@withdrawaladd',
    'as'   => 'Withdrawaladd'
]);
*/
Route::group(['middleware' => ['auth']], function() {
    // your routes
});
//Route::post('Item/Fabric', 'dependencycontroller@Fabric')->name('admin.cities.get_by_country');
Route::post('ajaxRequest', [App\Http\Controllers\Admin\dependencycontroller::class, 'Fabric'])->name('ajaxRequest.post');
Route::post('ajaxRequest2', [App\Http\Controllers\Admin\dependencycontroller::class, 'Fabric2'])->name('ajaxRequest2.Fabric2');
Route::post('ajaxRequest3', [App\Http\Controllers\Admin\dependencycontroller::class, 'Fabric3'])->name('ajaxRequest3.Fabric3');
Route::post('ajaxRequest4', [App\Http\Controllers\Admin\dependencycontroller::class, 'Fabric4'])->name('ajaxRequest4.Fabric4');
Route::post('ajaxRequest5', [App\Http\Controllers\Admin\dependencycontroller::class, 'additemstore'])->name('ajaxRequest5.Fabric5');


//GET

//Event
Route::get('/event/approve',[EventControllerAlias::class,'display_approval'])->middleware('auth')->name('approve_event');

//Restock
Route::get('/restock',[RestockController::class,'index'])->middleware('auth')->name('restock');
Route::get('/restock/{id}',[RestockController::class,'show'])->middleware('auth')->name('detail_restock_item');



//POST

//Event
Route::post('/event/approve/{id}',[EventControllerAlias::class,'approve'])->middleware('auth')->name('approve_event_post');

//Restock
Route::post('/restock/{id}',[RestockController::class,'update'])->middleware('auth')->name('restock_post');
