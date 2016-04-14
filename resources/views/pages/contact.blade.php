@extends('master')

@section('title', 'Contacto')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h4>Formulário de contacto</h4>
            <smal>Estamos ao seu dispor!</smal>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            @include('flash::message')

            {!! Form::open(['url' => ['contacto'], 'method' => 'post']) !!}

            {!! Form::textField("nome", "Nome:", null, ['required']) !!}

            {!! Form::emailField("email", "Email:", null, ['required']) !!}

            {!! Form::textField("assunto", "Assunto:", null, ['required']) !!}

            {!! Form::textareaField("mensagem", "Mensagem:", null, ['required']) !!}

            {!! Form::submitFormLoading("Enviar") !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@push('styles')
<style>
    .alert {
        padding: 4px !important;
        margin-top: 20px !important;
    }
</style>
@endpush

@push('scripts')
<script>
    //alert auto close
    $(".alert").delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });
    //alert close on click
    $(".alert").on('click', function () {
        $(this).remove();
    });
</script>
@endpush