<?php

/*
|--------------------------------------------------------------------------
| Back End
|--------------------------------------------------------------------------
*/
Route::group(['as' => 'admin::', 'prefix' => 'backend', 'middleware' => 'web'], function () {

    Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@showLoginForm']);
    Route::post('login', 'Auth\AuthController@login');


    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

        Route::get('/', ['as' => 'dashboard', 'uses' => 'Admin\DashboardController@index']);
    });

});


/*
|--------------------------------------------------------------------------
| Front End
|--------------------------------------------------------------------------
*/
Route::get('/', function () {

    return Redirect::route('admin::dashboard');
//    return view('pages.home');
});

/*
|--------------------------------------------------------------------------
| Test Route
|--------------------------------------------------------------------------
*/
Route::get('test', function () {
    return 2;

});


/*
|--------------------------------------------------------------------------
| Requirements
|--------------------------------------------------------------------------
*/
Route::get('requirements', function () {

    return App\Gata\Requirements::result();
});
