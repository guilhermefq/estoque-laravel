<html>
    <head>
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
                </div>
            </nav>
            @yield('conteudo')

            <footer class="footer">
                <p>© Livro de Laravel da Casa do Código.</p>
            </footer>
        </div>
    </body>
</html>
