<html>
    <head>
        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>Controle de estoque</title>
    </head>
    <body>
        <div class="container">
            <h1>Listagem de produtos</h1>
            <table class="table table-striped table-bordered table-hover">
                <?php foreach ($produtos as $p): ?>
                <tr>
                    <td><?= $p->nome ?></td>
                    <td><?= $p->valor ?></td>
                    <td><?= $p->descricao ?></td>
                    <td><?= $p->quantidade ?></td>
                    <td>
                        <a href="/produtos/mostra/<?= $p->id ?>">
                            <span class="fas fa-search"></span>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </body>
</html>
