<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('hello');
});

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::get('/', 'AdminController@getIndex');

    Route::get('index', 'AdminController@getIndex');

    Route::get('user', function()
    {
        return 'users';
    });

});

Route::group(array('prefix' => 'login'), function()
{
    Route::get('/', 'AuthorityController@getSignin');

    Route::post(
        '/',
        'AuthorityController@postSignin'
    );

    // Route::get('user', function()
    // {
    //     return 'users';
    // });

});
