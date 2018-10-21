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
Route::group([
    "prefix" => "test.dev"
], function () {
    Route::get('/companies', 'CompanyController@index')->name('companies');
    Route::get('/companies/{id}', 'CompanyController@getCompany')->name('company');
    Route::post('/company/', 'CompanyController@store')->name('store');
    Route::post('/reference/', 'ReferenceController@storeReference')->name('store-reference');
    Route::get('/references/', 'ReferenceController@index')->name('references');
    Route::get('/references/{id}', 'ReferenceController@getReference')->name('reference');
});

