@extends('admin.master')

@section('title', 'Adicionar Módulo Youtube')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-6">

            </div>
        </div>

        <section class="content-header">
            <h1>
                Adicionar Módulo Youtube
                <small>Depois de criar pode associar a uma página/produto.</small>
            </h1>
        </section>

        <section class="content">
            <div class="box">
               <div class="box-body">
                   <div class="row">
                       <div class="col-md-12">
                           {!! Form::open(['route' => ['admin::backend.modules.youtube.store'], 'method' => 'post']) !!}

                           {!! Form::textField("descricao", "Descrição:", old('descricao'), ['required']) !!}

                           {!! Form::urlField("video", "Youtube Link:", old('video'), ['required']) !!}

                           {!! Form::submitFormLoading("Adicionar") !!}

                           {!! Form::close() !!}
                       </div>
                   </div>
               </div>
            </div>
        </section>
    </div>
@stop