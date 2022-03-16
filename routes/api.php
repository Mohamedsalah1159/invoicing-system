<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace'=>'App\Http\Controllers\Api'], function() {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
});
Route::group(['namespace'=>'App\Http\Controllers\Api', 'middleware' => 'auth:api'], function() {
    Route::get('profile', 'AuthController@userProfile');
    Route::post('logout', 'AuthController@logout');
    Route::post('create-section', 'SectionControllerApi@create');
    Route::post('update-section/{id}', 'SectionControllerApi@update');
    Route::post('create-product', 'productControllerApi@create');
    Route::get('allSections', 'SectionControllerApi@all');
    Route::post('delete-section/{id}', 'SectionControllerApi@destroy');
});
