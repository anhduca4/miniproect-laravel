<?php

//Router api users
Route::group([
    'middleware' => 'auth:api',
    'as'         => 'users.',
], function () {
    Route::resource('/users', 'UserController');
});
// Route::get('/test', function () {
//     return ['v' => '1.0'];
// });
