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
                <h1>Gestor Financeiro</h1>
                <h2>Bem vindo(a): <?php // echo $modelUsuario->getNome(); ?></h2>
                <a href="?pagina=contas" class="btn btn-primary btn-lg" role="button">CONTAS </a>
                <a href="#" class="btn btn-primary btn-lg" role="button">TRANSFERÊNCIAS </a>
                <a href="#" class="btn btn-primary btn-lg" role="button">RELATÓRIOS </a>
                <a href="#" class="btn btn-primary btn-lg" role="button">DADOS PESSOAIS </a>
            </div>            
        </div>
    </body>
</html>
