<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

    Route::resource('maps', 'MapsController');

    Route::get('languages', 'LanguagesController@index');
    Route::get('profile', 'UserController@getProfile');
    Route::post('profile', 'UserController@updateProfile');

    Route::get('testmap', function (){
        return '{"x_length":3,"y_length":3,"x_1y_1":{"type":"start"},"x_2y_1":{"type":"free"},"x_3y_1":{"type":"free"},"x_1y_2":{"type":"free"},"x_2y_2":{"type":"free"},"x_3y_2":{"type":"free"},"x_1y_3":{"type":"free"},"x_2y_3":{"type":"free"},"x_3y_3":{"type":"free"}}';
    });

});
