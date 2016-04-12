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
        Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'Admin\DashboardController@index']);
        Route::post('products/{id}/save-layout', ['as' => 'save_layout', 'uses' => 'Admin\ProductsController@saveLayout']);
        Route::resource('products', 'Admin\ProductsController');

        Route::get('/', function() {
            return Redirect::route('admin::dashboard');
        });
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
| Requirements
|--------------------------------------------------------------------------
*/
Route::get('requirements', function () {

    return App\Gata\Requirements::result();
});