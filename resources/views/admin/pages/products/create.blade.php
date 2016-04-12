@extends('admin.master')

@section('title', 'Adicionar Produto')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Adicionar produto
                <small>Depois de criar o produto pode editar o seu layout</small>
            </h1>
        </section>

        <section class="content">
            <div class="box">
               <div class="box-body">
                   <div class="row">
                       <div class="col-md-12">
                           {!! Form::open(['route' => ['admin::backend.products.store'], 'method' => 'post']) !!}

                           {!! Form::textField("nome", "Nome", old('name'), ['required']) !!}

                           {!! Form::submitForm("Guardar alterações") !!}

                           {!! Form::close() !!}
                       </div>
                   </div>
               </div>
            </div>
        </section>
    </div>
@stop