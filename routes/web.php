<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('social-links/destroy', 'SocialLinksController@massDestroy')->name('social-links.massDestroy');

    Route::resource('social-links', 'SocialLinksController');

    Route::post('social-links/media', 'SocialLinksController@storeMedia')->name('social-links.storeMedia');

    Route::delete('banners/destroy', 'BannerController@massDestroy')->name('banners.massDestroy');

    Route::resource('banners', 'BannerController');

    Route::post('banners/media', 'BannerController@storeMedia')->name('banners.storeMedia');

    Route::delete('principals/destroy', 'PrincipalController@massDestroy')->name('principals.massDestroy');

    Route::resource('principals', 'PrincipalController');

    Route::post('principals/media', 'PrincipalController@storeMedia')->name('principals.storeMedia');
});
