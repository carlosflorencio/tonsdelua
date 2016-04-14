@extends('admin.master')

@section('title', 'Adicionar Módulo Imagem')

@section('content')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-6">

            </div>
        </div>

        <section class="content-header">
            <h1>
                Adicionar Módulo de Imagem
                <small>Depois de criar pode associar a uma página/produto.</small>
            </h1>
        </section>

        <section class="content">
            <div class="box">
               <div class="box-body">
                   <div class="row">
                       <div class="col-md-12">
                           {!! Form::open(['route' => ['admin::backend.modules.image.store'], 'method' => 'post', 'files' => true]) !!}

                           {!! Form::textField("descricao", "Descrição:", old('descricao'), ['required']) !!}

                           {!! Form::fileField("imagem", "Imagem: (Largura recomendada: 1920px - auto adapta-se)", ['required', 'accept' => 'image/*']) !!}

                           {!! Form::textField("legenda", "Legenda: (Aparece com o rato em cima da imagem)", old('caption')) !!}

                           {!! Form::selectField("link", "Ao clicar ir para:", $to, old('to', null), ['class' => 'select2', 'style' => 'width: 100%']) !!}

                           {!! Form::submitFormLoading("Adicionar") !!}

                           {!! Form::close() !!}
                       </div>
                   </div>
               </div>
            </div>
        </section>
    </div>
@stop