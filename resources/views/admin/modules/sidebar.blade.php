<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">PÁGINAS</li>
            <li class="{{ activePage('backend.dashboard') }}">
                <a href="{{ route('admin::dashboard') }}">
                    <i class="fa fa-tachometer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ activePage('backend.products') }}">
                <a href="{{ route('admin::backend.products.index') }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Produtos</span>
                </a>
            </li>
        </ul>
    </section>
</aside>