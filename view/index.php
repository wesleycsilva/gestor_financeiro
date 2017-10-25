<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Gestor Financiero | Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h3>Gestor Financeiro - HotMilhas</h3>
            </div>
            <div class="jumbotron">
                <!--<h3>Acessar</h3>-->
                <form class="form-inline" action="?pagina=dashboard_usuario" method="post">
                    <div class="form-group">
                        <label for="login">Login:</label>
                        <input type="text" class="form-control" id="login" name="login" placeholder="CPF">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <!--<button type="submit" class="btn btn-default">Enviar</button>-->
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>
            </div>
            <div class="jumbotron">
                <h3>Ainda não é cadastrado(a)?</h3>
                <a href="?pagina=cadastro" class="btn btn-info btn-lg active" role="button">Cadastrar</a>
                <!--<a href="?pagina=painel">Cadastrar</a>-->
            </div>
        </div>
    </body>
</html>
