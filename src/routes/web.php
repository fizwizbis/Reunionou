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

use App\Http\Router;


Router\Event::routes();
Router\Profil::routes();
Router\Auth::routes();
Router\Todo::routes();
Router\Poll::routes();

Route::get('messages/{eventId}', 'ChatController@fetch');
Route::post('messages/{eventId}', 'ChatController@send');

Auth::routes();

Route::get('', function (){
   return redirect()->route('profil');
});
