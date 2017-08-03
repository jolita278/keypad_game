<?php

Route::get('/', function () {
    return view('main');
});

Route::group(['prefix' => 'results'], function () {
    Route::get('/', ['as' => 'app.results.index', 'uses' => 'PlayerGameDataController@index']);
    Route::post('/create', ['as' => 'app.results.store', 'uses' => 'PlayerGameDataController@store']);
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', ['uses' => 'PlayerGameDataController@show']);
        Route::delete('/', ['as' => 'app.results.delete', 'uses' => 'PlayerGameDataController@destroy']);
    });
});