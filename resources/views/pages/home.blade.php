@extends('master')

@section('title', 'Inicio')

@section('content')

    @include('modules.multiple-images')
    @include('modules.slideshow')

    @include('modules.full-image')

    @include('modules.video')


@stop