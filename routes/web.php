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
define('PAGINATION_COUNT',10);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
Route::group(['prefix'=> 'bill', 'namespace'=>'App\Http\Controllers'], function(){
    Route::resource('bill', 'BillController');
    Route::resource('sections', 'SectionController');

});


