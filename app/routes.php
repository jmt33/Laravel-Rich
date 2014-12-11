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

// Route::get('/', function()
// {
//     return View::make('hello');
// });

// // Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
// // Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
// // Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));


// Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
// {
//     // Route::get(
//     //     '/',
//     //     array(
//     //         'as' => 'admin',
//     //         'uses' => 'AdminController@getIndex'
//     //     )
//     // );

//     // Route::get(
//     //     'index',
//     //     array(
//     //         'as' => 'admin.index',
//     //         'uses' => 'AdminController@getIndex'
//     //     )
//     // );

//     Route::any('/', 'App\Controllers\Admin\PagesController@index');
//     Route::any('index', 'App\Controllers\Admin\PagesController@index');
//     Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
//     Route::resource('pages', 'App\Controllers\Admin\PagesController');

    
//     //Route::resource('pages', 'App\Controllers\Admin\PagesController');
// });

Route::group(array('prefix' => 'login'), function()
{
    Route::get('/', 'AuthorityController@getSignin');

    Route::post(
        '/',
        'AuthorityController@postSignin'
    );

});


Route::get('/', function()
{
    return View::make('hello');
});

Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::any('/', 'App\Controllers\Admin\PagesController@index');
    Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
    Route::resource('pages', 'App\Controllers\Admin\PagesController');
});