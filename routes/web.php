<?php

Route::group(['prefix' => 'game'], function () {
    Route::get('/', ['as' => 'app.game.index', 'uses' => 'PlayerGameDataController@index']);
    Route::get('/create', ['as' => 'app.game.create', 'uses' => 'PlayerGameDataController@create']);
    Route::post('/create', ['uses' => 'PlayerGameDataController@store']);

    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', ['uses' => 'PlayerGameDataController@show']);
        Route::delete('/', ['as' => 'app.game.delete', 'uses' => 'PlayerGameDataController@destroy']);
    });
});