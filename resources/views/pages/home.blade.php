@extends('master')

@section('title', 'Inicio')

@section('content')
    <!-- Video -->
    <div class="alt-grid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="#">
                        <video preload="" autoplay="" loop="" muted="" autobuffer="" width="100%" controls>
                            <source src="http://anyilu.s3.amazonaws.com/product_videos/resort16-lookbook-640.mp4" type="video/mp4" >
                            <source src="http://anyilu.s3.amazonaws.com/product_videos/resort16-lookbook-640.webm" type="video/webm">
                            <source src="http://anyilu.s3.amazonaws.com/product_videos/resort16-lookbook-640.ogv" type="video/ogg">


                        </video>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Video -->

    <!-- Full size image -->
    <div class="alt-grid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="#">
                        <div data-min-width-0='<img src={{ url('upload/images_mobile/1.jpg') }} alt="image @ 320+ viewports" class="img-responsive">'
                             data-min-width-768='<img src={{ url('upload/images_full/1.jpg') }} alt="image @ 961+ viewports" class="img-responsive">'>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Full size image -->

    <!-- Multiple columns images -->
    <div class="alt-grid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <a href="#">
                        <img src="{{ url('upload/images_medium/1.jpeg') }}" class="img-responsive">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <img src="{{ url('upload/images_medium/2.jpg') }}" class="img-responsive">
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <img src="{{ url('upload/images_medium/3.jpeg') }}" class="img-responsive">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Multiple columns images -->
@stop