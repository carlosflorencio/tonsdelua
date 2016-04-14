<?php
use App\Module;
use App\Page;

$counters = Page::where('id', '<=', 5)->with('modules')->orderBy('id', 'asc')->get();
$products = Page::product()->count();
$images = Module::imagem()->count();
$slides = Module::slideshow()->count();
$youtubes = Module::youtube()->count();
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">PÁGINAS</li>
            <li class="{{ activePage('backend.products') }}">
                <a href="{{ route('admin::backend.products.index') }}" title="Gerir Produtos">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Produtos</span>
                    <small class="label pull-right bg-red">
                        {{ $products }}
                    </small>
                </a>
            </li>
            <li class="{{ activePage('backend.novidades') }}">
                <a href="{{ route('admin::novidades') }}" title="Desenhar página">
                    <i class="fa fa-object-group"></i>
                    <span>Novidades</span>
                    <small class="label pull-right bg-green">
                        {{ $counters[0]->modules->count() }}
                    </small>
                </a>
            </li>
            <li class="{{ activePage('backend.tendencias') }}">
                <a href="{{ route('admin::tendencias') }}" title="Desenhar página">
                    <i class="fa fa-object-group"></i>
                    <span>Tendencias</span>
                    <small class="label pull-right bg-green">
                        {{ $counters[1]->modules->count() }}
                    </small>
                </a>
            </li>
            <li class="{{ activePage('backend.mulher') }}">
                <a href="{{ route('admin::mulher') }}" title="Desenhar página">
                    <i class="fa fa-object-group"></i>
                    <span>Mulher</span>
                    <small class="label pull-right bg-green">
                        {{ $counters[2]->modules->count() }}
                    </small>
                </a>
            </li>
            <li class="{{ activePage('backend.homem') }}">
                <a href="{{ route('admin::homem') }}" title="Desenhar página">
                    <i class="fa fa-object-group"></i>
                    <span>Homem</span>
                    <small class="label pull-right bg-green">
                        {{ $counters[3]->modules->count() }}
                    </small>
                </a>
            </li>
            <li class="{{ activePage('backend.marcas') }}">
                <a href="{{ route('admin::marcas') }}" title="Desenhar página">
                    <i class="fa fa-object-group"></i>
                    <span>Marcas</span>
                    <small class="label pull-right bg-green">
                        {{ $counters[4]->modules->count() }}
                    </small>
                </a>
            </li>
            <li class="header">MÓDULOS</li>
            <li class="{{ activePage('backend.modules.image') }}">
                <a href="{{ route('admin::backend.modules.image.index') }}" title="Gerir Módulos de Imagem">
                    <i class="fa fa-image"></i>
                    <span>Imagem</span>
                    <small class="label pull-right bg-yellow">
                        {{ $images }}
                    </small>
                </a>
            </li>
            <li class="{{ activePage('backend.modules.slideshow') }}">
                <a href="{{ route('admin::backend.modules.slideshow.index') }}" title="Gerir Módulos de Slideshow">
                    <i class="fa fa-film"></i>
                    <span>Slideshow</span>
                    <small class="label pull-right bg-yellow">
                        {{ $slides }}
                    </small>
                </a>
            </li>
            <li class="{{ activePage('backend.modules.youtube') }}">
                <a href="{{ route('admin::backend.modules.youtube.index') }}" title="Gerir Módulos Youtube">
                    <i class="fa fa-youtube"></i>
                    <span>Youtube</span>
                    <small class="label pull-right bg-yellow">
                        {{ $youtubes }}
                    </small>
                </a>
            </li>
        </ul>
    </section>
</aside>