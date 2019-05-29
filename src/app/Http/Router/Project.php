<?php


namespace App\Http\Router;


class Project implements BaseRouter
{
    public static function routes()
    {
        Route::get('/project', 'ProjectController@index')->name('projectIndex');
        Route::get('/dashboard/project', 'ProjectController@manage')->name('projectManage');
    }
}