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
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered ">
                                <tbody>
                                <tr>
                                    <th>Nome</th>
                                    <th>Link</th>
                                    <th>Módulos associados</th>
                                    <th>Opções</th>
                                </tr>
                                @forelse($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <a href="{{ url('product/' . $product->slug) }}">
                                                {{ $product->slug }}
                                            </a>
                                        </td>
                                        <td>{{ $product->modules->count() }}</td>
                                        <td class="options text-center">
                                            <a href="{{ route('admin::backend.products.edit', $product->id) }}"
                                               title="Editar">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin::backend.products.destroy', $product->id) }}"
                                               data-alert="confirm"
                                               data-alert-text="Deseja apagar e desassociar os módulos?"
                                               data-method="delete" title="Apagar">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Sem produtos ainda..</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer clearfix text-center no-padding">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop