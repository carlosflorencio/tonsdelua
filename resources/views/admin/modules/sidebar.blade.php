<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">PÁGINAS</li>
            <li class="{{ activePage('backend.dashboard') }}">
                <a href="{{ route('admin::dashboard') }}" title="Inicio">
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ activePage('backend.products') }}">
                <a href="{{ route('admin::backend.products.index') }}" title="Gerir Produtos">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Produtos</span>
                </a>
            </li>
            <li class="header">MÓDULOS</li>
            <li class="{{ activePage('backend.modules.image') }}">
                <a href="{{ route('admin::backend.modules.image.index') }}" title="Gerir Módulos de Imagem">
                    <i class="fa fa-image"></i>
                    <span>Imagem</span>
                </a>
            </li>
        </ul>
    </section>
</aside>