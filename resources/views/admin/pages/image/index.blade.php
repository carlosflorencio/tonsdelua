@extends('admin.master')

@section('title', 'Módulos Imagem')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Módulo Imagem
                <small>Este módulo apresenta uma única imagem responsiva. Pode associar depois a um produto/página.</small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-primary btn-block" href="{{ route('admin::backend.modules.image.create') }}">
                                <i class="fa fa-plus"></i> Adicionar módulo
                            </a>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered ">
                                <tbody>
                                <tr>
                                    <th style="width: 10%" class="text-center">Opções</th>
                                    <th>Imagem</th>
                                    <th style="width: 55%">Descrição</th>
                                    <th style="width: 15%" class="text-center">Página/Produto Associado</th>
                                </tr>
                                @forelse($modules as $module)
                                    <tr>
                                        <td class="options text-center">
                                            <a href="{{ route('admin::backend.modules.image.edit', $module->id) }}"
                                               title="Editar">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin::backend.modules.image.destroy', $module->id) }}"
                                               data-alert="confirm"
                                               data-alert-text="Deseja realmente apagar o módulo?"
                                               data-method="delete" title="Apagar">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @if($module->images->isEmpty())
                                                Sem imagem
                                            @else
                                                <img src="{{ $module->images[0]->link() }}?w=200" alt="" width="200">
                                            @endif
                                        </td>
                                        <td>{{ $module->description }}</td>
                                        <td class="text-center">
                                            @if($module->page_id)
                                                <a href="{{ route('admin::backend.products.edit', [$module->page_id, '#layout']) }}">
                                                    {{ $module->page->name }}
                                                </a>
                                            @else
                                                Nenhum
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Sem módulos ainda..</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer clearfix text-center no-padding">
                            {{ $modules->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop