<?php

Route::group([
    'middleware' => 'guest',
], function () {

    Route::get('/', [
        'as'   => 'main',
        'uses' => 'AuthController@index',
    ]);
    Route::get('/login', [
        'as'   => 'login',
        'uses' => 'AuthController@getLogin',
    ]);

    Route::post('auth', [
        'as'   => 'auth',
        'uses' => 'AuthController@auth',
    ]);

    Route::get('logout', [
        'as'   => 'logout',
        'uses' => 'AuthController@logout',
    ]);

//    Route::post('login', [
//        'as'   => 'login.post',
//        'uses' => 'AuthController@postLogin',
//    ]);

});
