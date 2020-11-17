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

Route::get('/trans', 'Localization\GetController');
Route::get('/languages', 'Languages\GetActiveController');

//Route::get('/search/{query?}', 'SearchController');
//Route::get('/search-autocomplete/{query?}', 'SearchAutocompleteController');

Route::group(['prefix' => 'batch'], function () {
    Route::get('get', 'BatchController@get');
});

Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.'], function () {
    Route::post('/login', 'LoginController')->name('login');
    Route::get('/logout', 'LogoutController')->name('logout');
    Route::post('/register', 'RegisterController')->name('registration');
    Route::post('/reset-password', 'ForgotPasswordController')->name('reset_password');
});

Route::get('/sef/{entity_path?}', 'SefController')
    ->name('entity_path')
    ->where('entity_path', '^(?!nova|admin.*$).*');
