<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('maps', 'MapsController');

        Route::resource('localized_maps', 'LocalizedMapsController');

        Route::resource('actions', 'ActionsController');

        Route::resource('localized_actions', 'LocalizedActionsController');

});
