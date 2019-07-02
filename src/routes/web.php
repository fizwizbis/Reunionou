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

Route::get('/chat', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetch');
Route::post('messages', 'ChatsController@send');
