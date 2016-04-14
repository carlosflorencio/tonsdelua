@extends('admin.master')

@section('title', 'Módulos Slideshow')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Módulo Slideshow
                <small>Este módulo apresenta um slideshow responsive. Pode associar depois a um produto/página.</small>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-primary btn-block" href="{{ route('admin::backend.modules.slideshow.create') }}">
                                <i class="fa fa-plus"></i> Adicionar módulo
                            </a>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered ">
                                <tbody>
                                <tr>
                                    <th style="width: 10%" class="text-center">Opções</th>
                                    <th>Imagens</th>
                                    <th style="width: 45%">Descrição</th>
                                    <th style="width: 15%" class="text-center">
                                        <div data-toggle="tooltip" data-placement="left" title="Layout a que este módulo está associado">
                                            <i class="fa fa-info" ></i>
                                            Página/Produto Associado
                                        </div>
                                    </th>
                                </tr>
                                @forelse($modules as $module)
                                    <tr>
                                        <td class="options text-center">
                                            <a href="{{ route('admin::backend.modules.slideshow.edit', $module->id) }}"
                                               title="Editar">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin::backend.modules.slideshow.destroy', $module->id) }}"
                                               data-alert="confirm"
                                               data-alert-text="Deseja realmente apagar o módulo?"
                                               data-method="delete" title="Apagar">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        <td>
                                            @forelse ($module->images as $image)
                                                    <img src="{{ $image->link() }}?w=100&h=100" alt="" width="100" height="100">
                                            @empty
                                                Sem imagens
                                            @endforelse
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