@extends('admin.master')

@section('title', 'Produtos')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Produtos
                <small>Lista de produtos. 20 por página.</small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-primary btn-block" href="{{ route('admin::backend.products.create') }}">
                                <i class="fa fa-plus"></i> Adicionar produto
                            </a>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered ">
                                <tbody>
                                <tr>
                                    <th style="width: 10%" class="text-center">Opções</th>
                                    <th style="width: 65%">Nome</th>
                                    <th style="width: 15%" class="text-center">
                                        <div data-toggle="tooltip" data-placement="left" title="Módulos que existem no seu layout">
                                            <i class="fa fa-info"></i>
                                            Módulos associados
                                        </div>
                                    </th>
                                    <th class="text-center">
                                        <div data-toggle="tooltip" data-placement="left" title="Quantos módulos apontam para este produto">
                                            <i class="fa fa-info" ></i>
                                            Ligações
                                        </div>
                                    </th>
                                </tr>
                                @forelse($products as $product)
                                    <tr>
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
                                            <a href="{{ url('produto/' . $product->id.'/' . str_slug($product->name)) }}">
                                                <i class="fa fa-external-link"></i>
                                            </a>
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td class="text-center">{{ $product->modules->count() }}</td>
                                        <td class="text-center">{{ $product->pointingCount }}</td>
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