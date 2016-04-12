@extends('admin.master')

@section('title', 'Editar Produto')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Editar produto
                <small>{{ $product->name }}</small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active" id="tab1_link">
                                <a href="#tab_1" data-toggle="tab">Conteúdo</a>
                            </li>
                            <li id="tab2_link">
                                <a href="#tab_2" data-toggle="tab">Layout da Página</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <!-- Content tab -->
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! Form::open(['route' => ['admin::backend.products.update', $product->id], 'method' => 'put']) !!}

                                        {!! Form::textField("nome", "Nome", old('nome', $product->name)) !!}

                                        {!! Form::submitForm("Guardar alterações") !!}

                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <!-- /Content tab -->
                            </div>
                            <div class="tab-pane " id="tab_2">
                                <!-- Layout tab -->
                                <div class="row" id="module-layout">
                                    <div class="col-md-12 text-center">
                                        <p><i class="fa fa-info"></i> Máximo 4 módulos por linha. Cada módulo apenas pode pertencer a uma página/produto.</p>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="row">
                                            <div class="col-md-5">
                                                <!-- Add line -->
                                                <div class="text-center">
                                                    <a class="btn btn-app btn-primary" @click.prevent="addLine">
                                                        <i class="fa fa-plus"></i> Adicionar Linha
                                                    </a>
                                                </div>
                                                <!-- /Add line -->
                                            </div>
                                            <div class="col-md-2">
                                                <div class="callout callout-success text-center">
                                                    <h4>@{{ modulesLeft }}</h4>

                                                    <p>Módulos livres</p>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <!-- Remove All Lines -->
                                                <div class="text-center">
                                                    <a class="btn btn-app" @click.prevent="removeLines">
                                                        <i class="fa fa-trash"></i> Limpar Layout
                                                    </a>
                                                </div>
                                                <!-- /Remove All Lines -->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Lines -->
                                                <div v-for="row in rows">
                                                    <my-row :row="row" :modules.sync="modules" :i="$index"></my-row>
                                                </div>
                                                <!-- /Lines -->
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12 text-center " id="append-result">
                                        <button class="btn btn-primary" @click="sendData">Guardar Layout</button>
                                    </div>
                                </div>
                                <!-- /Layout tab -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@push('styles')
<link rel="stylesheet" href="{{ asset('backend-assets/dist/css/plugins/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('backend-assets/dist/js/plugins/select2.full.min.js') }}"></script>
<script>
    var modules = {!! $modules !!};

    var layout = {!! $product->layout !!};
</script>
<script src="{{ asset('js/backend/app.js') }}"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var type = window.location.hash.substr(1);
        if(type == 'layout') {
            $('#tab_1').removeClass('active');
            $('#tab1_link').removeClass('active');
            $('#tab_2').addClass('active');
            $('#tab2_link').addClass('active');
        }
    });
</script>
@endpush