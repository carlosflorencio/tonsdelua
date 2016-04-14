@extends('admin.master')

@section('title', 'Editar Módulo Slideshow')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-6">

            </div>
        </div>

        <section class="content-header">
            <h1>
                Editar Módulo Slideshow
                <small>{{ $module->description }}</small>
            </h1>
        </section>

        <section class="content">
            <div class="box">
               <div class="box-body">
                   <div class="row">
                       <div class="col-md-12">
                           {!! Form::open(['route' => ['admin::backend.modules.slideshow.update', $module->id], 'method' => 'put', 'files' => true]) !!}

                           {!! Form::textField("descricao", "Descrição:", old('descricao', $module->description), ['required']) !!}

                           {!! Form::fileField("imagem[]", "Imagem: (Largura recomendada: 1920px - auto adapta-se)", ['accept' => 'image/*', 'multiple']) !!}

                           {!! Form::selectField("link", "Ao clicar ir para:", $to, old('to', $module->url_to), ['class' => 'select2', 'style' => 'width: 100%']) !!}

                           {!! Form::submitFormLoading("Guardar alterações") !!}

                           {!! Form::close() !!}
                       </div>
                   </div>
               </div>
            </div>
        </section>
    </div>
@stop