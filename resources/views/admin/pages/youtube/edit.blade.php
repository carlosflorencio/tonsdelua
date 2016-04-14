@extends('admin.master')

@section('title', 'Editar Módulo Youtube')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-6">

            </div>
        </div>

        <section class="content-header">
            <h1>
                Editar Módulo Youtube
                <small>Depois de criar pode associar a uma página/produto.</small>
            </h1>
        </section>

        <section class="content">
            <div class="box">
               <div class="box-body">
                   <div class="row">
                       <div class="col-md-12">
                           {!! Form::open(['route' => ['admin::backend.modules.youtube.update', $module->id], 'method' => 'put']) !!}

                           {!! Form::textField("descricao", "Descrição:", old('descricao', $module->description), ['required']) !!}

                           {!! Form::urlField("video", "Youtube Link:", old('video', "https://www.youtube.com/watch?v=".$module->youtube), ['required']) !!}

                           {!! Form::submitFormLoading("Guardar Alterações!") !!}

                           {!! Form::close() !!}
                       </div>
                   </div>
               </div>
            </div>
        </section>
    </div>
@stop