<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'notes', 'as' => 'notes.'], function () {
    Route::get('/', 'Modules\Notes\Http\Controllers\NoteController@index')->name('index')->middleware('userRolePermission:notes_view');
    Route::get('create', 'Modules\Notes\Http\Controllers\NoteController@create')->name('create')->middleware('userRolePermission:notes_add');
    Route::post('/', 'Modules\Notes\Http\Controllers\NoteController@store')->name('store')->middleware('userRolePermission:notes_add');
    Route::get('{note}', 'Modules\Notes\Http\Controllers\NoteController@show')->name('show')->middleware('userRolePermission:notes_view');
    Route::get('{note}/edit', 'Modules\Notes\Http\Controllers\NoteController@edit')->name('edit')->middleware('userRolePermission:notes_edit');
    Route::put('{note}', 'Modules\Notes\Http\Controllers\NoteController@update')->name('update')->middleware('userRolePermission:notes_edit');
    Route::delete('{note}', 'Modules\Notes\Http\Controllers\NoteController@destroy')->name('destroy')->middleware('userRolePermission:notes_delete');
    // Export routes
    Route::get('export/excel', 'Modules\Notes\Http\Controllers\NoteController@exportExcel')->name('export.excel')->middleware('userRolePermission:notes_export');
    Route::get('export/pdf', 'Modules\Notes\Http\Controllers\NoteController@exportPdf')->name('export.pdf')->middleware('userRolePermission:notes_export');
});
