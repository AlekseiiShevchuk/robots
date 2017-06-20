<?php
use App\Services\MarkerToolsService;

Route::get('/', function () {
    return redirect('/admin/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('languages', 'Admin\LanguagesController');
    Route::resource('maps', 'Admin\MapsController');
    Route::post('maps_mass_destroy', ['uses' => 'Admin\MapsController@massDestroy', 'as' => 'maps.mass_destroy']);
    Route::resource('localized_maps', 'Admin\LocalizedMapsController');
    Route::post('localized_maps_mass_destroy',
        ['uses' => 'Admin\LocalizedMapsController@massDestroy', 'as' => 'localized_maps.mass_destroy']);
    Route::resource('actions', 'Admin\ActionsController');
    Route::post('actions_mass_destroy',
        ['uses' => 'Admin\ActionsController@massDestroy', 'as' => 'actions.mass_destroy']);
    Route::resource('localized_actions', 'Admin\LocalizedActionsController');
    Route::post('localized_actions_mass_destroy',
        ['uses' => 'Admin\LocalizedActionsController@massDestroy', 'as' => 'localized_actions.mass_destroy']);

    Route::resource('translation_items', 'Admin\TranslationItemsController');
    Route::post('translation_items_mass_destroy',
        ['uses' => 'Admin\TranslationItemsController@massDestroy', 'as' => 'translation_items.mass_destroy']);
    Route::put('translation_items_mass_update',
        ['uses' => 'Admin\TranslationItemsController@massUpdate'])->name('translation_items.mass_update');

    Route::post('/excel-import', 'Admin\TranslationItemsController@importExcel');

    Route::get('/excel-export/{type}', 'Admin\TranslationItemsController@exportExcel');

});

Route::get('/regenerate-markers', function () {
    foreach (\App\Map::all() as $map){
        MarkerToolsService::saveBarCodeForMap($map->id);
        MarkerToolsService::createMarker($map->id);
        MarkerToolsService::createMarkerSettings($map->id);
    }
});
