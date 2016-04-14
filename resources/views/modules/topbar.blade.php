<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('img/tonsdelua_l_novo.png') }}" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse fix-height" id="menu-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ activePage('/') }}">
                    <a href="{{ url('/') }}">Novidades</a>
                </li>
                <li class="{{ activePage('tendencias') }}">
                    <a href="{{ url('tendencias') }}">Tendencias</a>
                </li>
                <li class="{{ activePage('mulher') }}">
                    <a href="{{ url('mulher') }}">Mulher</a>
                </li>
                <li class="{{ activePage('homem') }}">
                    <a href="{{ url('homem') }}">Homem</a>
                </li>
                <li class="{{ activePage('marcas') }}">
                    <a href="{{ url('marcas') }}">Marcas</a>
                </li>
                <li class="{{ activePage('contacto') }}">
                    <a href="{{ url('contacto') }}">Contacto</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right social">
                <li>
                    <a href="https://www.facebook.com/tonslua/" target="_blank" class="social">
                        <img src="{{ url('img/facebook.png') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="#" class="social">
                        <img src="{{ url('img/pinterest.png') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="#" class="social">
                        <img src="{{ url('img/instagram.png') }}" alt="">
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>