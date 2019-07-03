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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

App\Http\Router\Event::routes();
App\Http\Router\Profil::routes();
App\Http\Router\Auth::routes();

Route::get('messages/{eventId}', 'ChatController@fetch');
Route::post('messages/{eventId}', 'ChatController@send');

Route::prefix('todo')->name('todo')->group(function () {
    Route::get('', 'TodoController@index')->name('.index');
    Route::match(['GET', 'POST'], 'create', 'TodoController@create')->name('.create');

    Route::prefix('{todo}')->group(function () {
        Route::get('', 'TodoController@show')->name('.show');
        Route::get('delete', 'TodoController@destroy')->name('.destroy');
        Route::match(['GET', 'POST'], 'edit', 'TodoController@update')->name('.update');

        Route::prefix('elements')->name('.elements')->group(function () {
            Route::post('add', 'TodoElementController@create')->name('.add');

            Route::prefix('{element}')->group(function () {
                Route::post('toggle', 'TodoElementController@toggle')->name('.toggle');
                Route::get('delete', 'TodoElementController@destroy')->name('.destroy');
            });
        });
    });
});

Auth::routes();
