@extends('master')

@section('title', 'Inicio')

@section('content')

    <div class="alt-grid">
        <div class="container-fluid">
            @forelse ($rows as $row)
            <div class="row">
                <?php $size = 12 / count($row->cols); ?>
                @foreach($row->cols as $col)
                    <div class="col-md-{{ $size }}">
                        <?php
                            $module = $page->modules->filter(function($value, $key) use($col) {
                                return $value->id == $col->module;
                            })->first();
                        ?>

                        @if($module->type == 'imagem')
                                @include('modules.full-image', $module)
                        @elseif($module->type == 'youtube')
                                @include('modules.youtube', $module)
                        @elseif($module->type == 'slideshow')
                                @include('modules.slideshow', $module)
                        @endif
                    </div>
                @endforeach
            </div>
            @empty
            <div class="row">
                <div class="col-md-12 text-center" style="font-size: 20px; padding: 20px">
                    Crie o layout da página no painel!
                </div>
            </div>
            @endforelse
        </div>
    </div>

@stop