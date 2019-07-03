<?php

namespace App\Http\Router;

use \Route;

class Todo implements BaseRouter
{
    public static function routes()
    {
        Route::prefix('todo')->name('todo')->middleware('auth')->group(function () {
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
    }
}
