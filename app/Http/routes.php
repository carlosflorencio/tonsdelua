<?php

/*
|--------------------------------------------------------------------------
| Back End
|--------------------------------------------------------------------------
*/
Route::group(['as' => 'admin::', 'prefix' => 'backend', 'middleware' => 'web'], function () {
    # Auth routes
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@showLoginForm']);
    Route::post('login', 'Auth\AuthController@login');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

        # Pages
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
    $image = App\Image::find(1);
    return $image->path;
});


/*
|--------------------------------------------------------------------------
| asdads
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Requirements
|--------------------------------------------------------------------------
*/
Route::get('requirements', function () {

    return App\Gata\Requirements::result();
});
