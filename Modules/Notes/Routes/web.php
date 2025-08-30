<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'notes', 'as' => 'notes.'], function () {
    Route::get('/', 'Modules\Notes\Http\Controllers\NoteController@index')->name('index');
    Route::get('create', 'Modules\Notes\Http\Controllers\NoteController@create')->name('create');
    Route::post('/', 'Modules\Notes\Http\Controllers\NoteController@store')->name('store');
    Route::get('{note}', 'Modules\Notes\Http\Controllers\NoteController@show')->name('show');
    Route::get('{note}/edit', 'Modules\Notes\Http\Controllers\NoteController@edit')->name('edit');
    Route::put('{note}', 'Modules\Notes\Http\Controllers\NoteController@update')->name('update');
    Route::delete('{note}', 'Modules\Notes\Http\Controllers\NoteController@destroy')->name('destroy');

    // Category-specific routes
    Route::group(['prefix' => 'expenses', 'as' => 'expenses.'], function () {
        Route::get('/', 'Modules\Notes\Http\Controllers\NoteController@expenses')->name('index');
    });

    Route::group(['prefix' => 'incomes', 'as' => 'incomes.'], function () {
        Route::get('/', 'Modules\Notes\Http\Controllers\NoteController@incomes')->name('index');
    });

    Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
        Route::get('/', 'Modules\Notes\Http\Controllers\NoteController@events')->name('index');
    });

    Route::group(['prefix' => 'incidents', 'as' => 'incidents.'], function () {
        Route::get('/', 'Modules\Notes\Http\Controllers\NoteController@incidents')->name('index');
    });

    // Export routes
    Route::get('export/excel', 'Modules\Notes\Http\Controllers\NoteController@exportExcel')->name('export.excel');
    Route::get('export/pdf', 'Modules\Notes\Http\Controllers\NoteController@exportPdf')->name('export.pdf');
});
