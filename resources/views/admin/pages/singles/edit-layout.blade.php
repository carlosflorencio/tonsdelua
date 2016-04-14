@extends('admin.master')

@section('title', $title)

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Editar página {{ $title }}
                <small>Aqui define o layout da página.</small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
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
                                        <button class="btn btn-primary ladda-button" id="save-button" data-style="expand-left" @click="sendData">
                                        <span class="ladda-label">Guardar Layout</span>
                                        </button>
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

@push('scripts')
<script>
    var modules = {!! $modules !!};

    var layout = {!! $page->layout !!};

    var url = "{{ url('backend/pages/' . $page->id . '/save-layout') }}";
</script>
<script src="{{ asset('js/backend/app.js') }}"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
@endpush