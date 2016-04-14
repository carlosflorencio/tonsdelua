<?php

/*
|--------------------------------------------------------------------------
| Images - Glide
|--------------------------------------------------------------------------
*/
Route::get('img/{path}', 'GlideImageController@serve')->where('path', '.+');


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
        Route::post('products/{id}/save-layout', ['as' => 'save_layout', 'uses' => 'Admin\ProductsController@saveLayout']);
        Route::resource('products', 'Admin\ProductsController');
        Route::resource('modules/image', 'Admin\ImageModuleController');
        Route::resource('modules/slideshow', 'Admin\SlideshowModuleController');
        Route::resource('modules/youtube', 'Admin\YoutubeModuleController');

        Route::post('pages/{id}/save-layout', 'Admin\PagesController@saveLayout');
        Route::get('pages/novidades', ['as' => 'novidades', 'uses' => 'Admin\PagesController@novidades']);
        Route::get('pages/tendencias', ['as' => 'tendencias', 'uses' => 'Admin\PagesController@tendencias']);
        Route::get('pages/mulher', ['as' => 'mulher', 'uses' => 'Admin\PagesController@mulher']);
        Route::get('pages/homem', ['as' => 'homem', 'uses' => 'Admin\PagesController@homem']);
        Route::get('pages/marcas', ['as' => 'marcas', 'uses' => 'Admin\PagesController@marcas']);

        Route::get('/', function() {
            return Redirect::route('admin::backend.products.index');
        });
    });

});


/*
|--------------------------------------------------------------------------
| Front End
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'web'], function() {
    Route::get('produto/{id}/{slug?}', 'PagesController@product');

    Route::get('tendencias', 'PagesController@tendencias');
    Route::get('mulher', 'PagesController@mulher');
    Route::get('homem', 'PagesController@homem');
    Route::get('marcas', 'PagesController@marcas');
    Route::get('contacto', 'PagesController@contacto');
    Route::post('contacto', 'PagesController@contacto_send');

    Route::get('/', 'PagesController@index');
});

/*
|--------------------------------------------------------------------------
| Test Route
|--------------------------------------------------------------------------
*/
//Route::get('test', function () {
//    $image = App\Image::find(1);
//    return $image->path;
//});

/*
|--------------------------------------------------------------------------
| Requirements
|--------------------------------------------------------------------------
*/
Route::get('requirements', function () {

    return App\Gata\Requirements::result();
});