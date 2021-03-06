<?php

namespace App\Http\Router;

use \Route;

class Todo implements BaseRouter
{
    public static function routes()
    {
        Route::prefix('event/{event}')->group(function () {
            Route::prefix('todo')->name('todo')->middleware('auth')->group(function () {
                Route::get('', 'TodoController@index')->name('.index');
                Route::match(['GET', 'POST'], 'create', 'TodoController@create')->middleware('author')->name('.create');

                Route::prefix('{todo}')->group(function () {
                    Route::get('', 'TodoController@show')->name('.show');
                    Route::get('delete', 'TodoController@destroy')->middleware('author')->name('.destroy');
                    Route::match(['GET', 'POST'], 'edit', 'TodoController@update')->middleware('author')->name('.update');

                    Route::prefix('elements')->name('.elements')->group(function () {
                        Route::post('add', 'TodoElementController@create')->middleware('author')->name('.add');

                        Route::prefix('{element}')->group(function () {
                            Route::post('toggle', 'TodoElementController@toggle')->name('.toggle');
                            Route::get('delete', 'TodoElementController@destroy')->middleware('author')->name('.destroy');
                        });
                    });
                });
            });
        });
    }
}
