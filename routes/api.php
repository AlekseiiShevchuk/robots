<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

    Route::resource('maps', 'MapsController');

    Route::get('languages', 'LanguagesController@index');
    Route::get('profile', 'UserController@getProfile');
    Route::post('profile', 'UserController@updateProfile');

    Route::get('get-minimum-required-build-for-ios-apps', 'DevNeedsController@get_minimum_required_build_for_ios_apps');
    Route::get('get-minimum-required-build-for-android-apps', 'DevNeedsController@get_minimum_required_build_for_android_apps');

});
