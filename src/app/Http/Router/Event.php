<?php


namespace App\Http\Router;

use \Route;

class Event implements BaseRouter
{
    public static function routes()
    {
        Route::prefix('event')->name('event')->middleware('auth')->group(function () {
            Route::get('', 'EventController@index')->name('.index');
            Route::match(['GET', 'POST'], 'create', 'EventController@create')->name('.create');
            Route::post('search', 'EventController@search')->name('.search');
            Route::group(['prefix' => '{event}'], function() {
                Route::get('', 'EventController@detail')->name('.detail');
                Route::get('delete', 'EventController@delete')->name('.delete');
                Route::get('subscribe', 'EventController@subscribe')->name('.subscribe');
                Route::get('manage', 'EventController@manage')->middleware('author')->name('.manage');
                Route::match(['GET', 'POST'], 'change', 'EventController@change')->middleware('author')->name('.change');
                Route::match(['GET', 'POST'], 'invite', 'EventController@invite')->middleware('author')->name('.invite');
            });
        });
    }
}
