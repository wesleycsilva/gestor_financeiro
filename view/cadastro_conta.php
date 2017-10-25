<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Gestor Financiero | Cadastro</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <form action="?pagina=add_conta" method="post">
                    <fieldset> 
                        <legend>Cadastrar Nova Conta</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="Cpf">Número da Conta</label>
                                <input type="number" class="form-control" id="conta" name="conta" placeholder="N° da Conta" maxlength="11">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="?pagina=conta" class="btn btn-warning" role="button">Cancelar</a>
                    </fieldset>
                </form>
            </div>            
        </div>
    </body>
</html>
