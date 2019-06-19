<?php


namespace App\Http\Router;

use \Route;

class Event implements BaseRouter
{
    public static function routes()
    {
        Route::get('/event', 'EventController@index')->name('eventIndex');
        Route::get('/event/{id}', 'EventController@detail')->name('eventDetail');
    }
}
