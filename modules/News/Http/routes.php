<?php

Route::group([
    'middleware' => 'guest',
], function () {

    Route::get('/news', [
        'as'   => 'news',
        'uses' => 'NewsController@index',
    ]);


    Route::get('/get_news/filters', [
        'as' => 'filters',
        'uses' => 'NewsController@filter',
    ]);

    Route::get('/get_news/{id}', [
        'as' => 'getOneNews',
        'uses' => 'NewsController@getNews',
    ]);

});

Route::group([
    'middleware' => 'web',
], function () {

    Route::get('/news/create_news', [
        'as' => 'news.createNews',
        'uses' => 'NewsController@createNews',
    ]);

    Route::post('/news/create', [
        'as' => 'news.create',
        'uses' => 'NewsController@create',
    ]);

});
