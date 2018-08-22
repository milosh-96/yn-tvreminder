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

if(auth()->user()) {
    Route::get('/', function () {
        return view('layouts.user');    
    });
    Route::prefix('user')->group(function() {

    });
    Route::prefix('shows')->group(function() {
        Route::get('add-new','ShowController@create')->name('show.add');
    });
}
else {
    Route::get('/', function () {
        return view('layouts.public');    
    });
}

Auth::routes();
