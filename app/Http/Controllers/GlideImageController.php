<?php

namespace App\Http\Controllers;


use App;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use League\Glide\Filesystem\FileNotFoundException;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;

class GlideImageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |   Serve images with glide
    |--------------------------------------------------------------------------
    */
    public function serve($path) {
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(),
            'source' => Storage::disk('images')->getDriver(),
            'cache' => Storage::disk('images')->getDriver(),
            'source_path_prefix' => '/',
            'cache_path_prefix' => '.cache',
            'base_url' => '/img/',
            'max_image_size' => 1920*1080,
        ]);

        try {
            return $server->getImageResponse($path, $_GET);
        } catch (FileNotFoundException $e) {
            abort(404);
        }
    }
}
