<?php


namespace App\Http\Router;

use \Route;

class Event implements BaseRouter
{
    public static function routes()
    {
        Route::group(['middleware' => 'auth', 'prefix' => 'event'], function() {
            Route::get('/', 'EventController@index')->name('eventIndex');
            Route::post('/create', 'EventController@create')->name('eventCreate');
            Route::get('/create', 'EventController@createForm')->name('eventCreateForm');
            Route::get('/{id}', 'EventController@detail')->name('eventDetail');
            Route::get('/{id}/delete', 'EventController@delete')->name('eventDelete');
            Route::post('/search', 'EventController@search')->name('eventSearch');
            Route::get('/{id}/subscribe', 'EventController@subscribe')->name('eventSubscribe');
            Route::get('/{id}/manage', 'EventController@manage')->middleware('author')->name('eventManage');
        });
    }
}
