<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Gestor Financiero | Painel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h3>Gestor Financeiro</h3>
                <h4>Bem vindo(a): <?php echo $modelUsuario->getNome(); ?></h4>
                <a href="?pagina=conta" class="btn btn-primary btn-lg" role="button">GERENCIAMENTO DE CONTAS </a>
            </div>            
        </div>
    </body>
</html>
