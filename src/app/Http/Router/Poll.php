<?php

namespace App\Http\Router;

use \Route;

class Poll implements BaseRouter
{
    public static function routes()
    {
        Route::prefix('event/{event}')->group(function () {
            Route::prefix('poll')->name('poll')->middleware('auth')->group(function () {
                Route::match(['GET', 'POST'], 'create', 'PollController@create')->name('.create');
                Route::prefix('{slug}')->group(function () {
                    Route::get('', 'PollController@show')->name('.show');
                    Route::post('vote', 'PollController@vote')->name('.vote');
                });
            });
        });
    }
}
