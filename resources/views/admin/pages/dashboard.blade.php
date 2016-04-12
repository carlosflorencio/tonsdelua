@extends('admin.master')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper" id="module-layout">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-4">
                            <!-- Add line -->
                            <div class="text-center">
                                <a class="btn btn-app" @click.prevent="addLine">
                                    <i class="fa fa-plus"></i> Linha
                                </a>
                            </div>
                            <!-- /Add line -->
                        </div>
                        <div class="col-md-4">
                            <!-- Remove All Lines -->
                            <div class="text-center">
                                <a class="btn btn-app" @click.prevent="removeLines">
                                    <i class="fa fa-trash"></i> Remover Linhas
                                </a>
                            </div>
                            <!-- /Remove All Lines -->
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Lines -->
                            <div v-for="row in rows">
                                <my-row :row="row" :i="$index"></my-row>
                            </div>
                            <!-- /Lines -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@stop

@push('scripts')
<script src="{{ asset('js/backend/app.js') }}"></script>
@endpush