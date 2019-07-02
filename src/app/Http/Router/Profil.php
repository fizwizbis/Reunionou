<?php


namespace App\Http\Router;

use Route;

class Profil implements BaseRouter
{
    public static function routes()
    {
        Route::group(['middleware' => 'auth', 'prefix' => 'profil'], function() {
            Route::get('/', 'ProfilController@index')->name('profil');
        });
    }
}
