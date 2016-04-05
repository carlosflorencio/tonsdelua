@extends('admin.master')

@section('title', 'Produtos')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Produtos
                <small>Gerir produtos</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin::dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Produtos</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab">Conteúdo</a>
                                </li>
                                <li>
                                    <a href="#tab_2" data-toggle="tab">Layout da Página</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <!-- Content tab -->
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="box-body table-responsive no-padding">
                                                <table class="table table-hover">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>User</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Reason</th>
                                                    </tr>
                                                    <tr>
                                                        <td>183</td>
                                                        <td>John Doe</td>
                                                        <td>11-7-2014</td>
                                                        <td><span class="label label-success">Approved</span></td>
                                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Content tab -->
                                </div>
                                <div class="tab-pane" id="tab_2">
                                    <!-- Layout tab -->
                                        layout
                                    <!-- /Layout tab -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@stop