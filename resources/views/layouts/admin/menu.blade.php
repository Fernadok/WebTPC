<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/admin') }}">
                WebTPC 2.0 Admin
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if (!Auth::guest())
                <ul class="nav navbar-nav">
                    <li><a href="javascript:ajaxLoad('{{ route('CategoriaIndex') }}')">Categorias</a></li>
                    <li><a href="javascript:ajaxLoad('{{ route('SubCategoriaIndex') }}')">SucCategorias</a></li>
                    <li><a href="javascript:ajaxLoad('{{ route('ArticuloIndex') }}')">Articulos</a></li>
                    <li><a href="javascript:ajaxLoad('{{ route('CategoriaIndex') }}')">Destacados</a></li>
                    <li><a href="javascript:ajaxLoad('{{ route('CategoriaIndex') }}')">Noticias</a></li>
                    <li><a href="javascript:ajaxLoad('{{ route('CategoriaIndex') }}')">Ventas</a></li>
                    <li><a href="javascript:ajaxLoad('{{ route('CategoriaIndex') }}')">Tipos de Pago</a></li>
                    <li><a href="javascript:ajaxLoad('{{ route('RolIndex') }}')">Roles</a></li>
                    <li><a href="javascript:ajaxLoad('{{ route('UserIndex') }}')">Usuarios</a></li>
                </ul>
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('admin/login') }}">Login</a></li>
                    <!-- <li><a href="{{ url('/register') }}">Register</a></li>-->
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


