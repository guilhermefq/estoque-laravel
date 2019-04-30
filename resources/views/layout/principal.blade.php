<html>
    <head>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>Controle de estoque</title>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/produtos">
                            Estoque Laravel
                        </a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{action('ProdutoController@lista')}}">Listagem</a></li>
                        <li><a href="{{action('ProdutoController@novo')}}">Novo</a></li>
                    </ul>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('LoginController@login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ action('LoginController@login') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ action('LoginController@logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ action('LoginController@logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest

                </div>
            </nav>
            @yield('conteudo')

            <footer class="footer">
                <p>© Livro de Laravel da Casa do Código.</p>
            </footer>
        </div>
    </body>
</html>
