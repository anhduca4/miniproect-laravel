<?php

Route::group([
        'as'        => 'auth.',
        'prefix'    => 'auth',
        'namespace' => 'Auth',
    ], function () {
        Route::post('/login', 'LoginController@login');
        Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::post('logout', 'UserController@logout');
        Route::get('me', 'UserController@user');
        Route::put('update', 'UserController@update');
    });
    });
