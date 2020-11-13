<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::group(['prefix' => 'tabs', 'as' => 'tabs.'], function () {
    Route::get('get', 'TabsController@get')->name('get');
    Route::post('modify', 'TabsController@modify')->name('modify');
});

Route::group(['prefix' => 'actions', 'as' => 'actions.'], function () {
    Route::get('get', 'ActionsController@get')->name('get');
    Route::post('modify', 'ActionsController@modify')->name('modify');
});
