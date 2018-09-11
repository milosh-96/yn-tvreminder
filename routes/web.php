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



// Route::get('/', function () {
//     if(!auth()->user()) {
//         return view('layouts.public');    
//     }
//     else {
//         return view('layouts.user');
//     }
// })->name('index');

Route::get('/','HomeController@index')->name('index');

Route::prefix('user')->group(function() {
    Route::get('library','UserController@library')->name('user.library');
});

Route::prefix('show')->group(function() {
    Route::get('add-new','ShowController@create')->name('show.add');
    Route::post('/','ShowController@store')->name('show.store');
    Route::get('edit/{hash}','ShowController@edit')->name('show.edit');
    Route::prefix('{hash}')->group(function() {
        Route::put('/','ShowController@update')->name('show.update');
        Route::get('/set-reminder','ReminderController@create')->name('reminder.create');
        Route::post('/set-reminder','ReminderController@store')->name('reminder.store');
        Route::get('list-reminders','ReminderController@list')->name('reminder.list');

    });
});
Auth::routes();
    
    
    
