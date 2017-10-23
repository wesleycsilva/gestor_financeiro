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
                <form action="?pagina=cadastro_usuario" method="post">
                    <fieldset> 
                        <legend>Cadastro</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Cpf">CPF</label>
                                <input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF" maxlength="11">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="dataNascimento">Data Nascimento</label>
                                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="Data Nascimento">
                            </div>
                        </div>
                        <div class="form-row">                        
                            <div class="form-group col-md-6">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="PasswordConfirm">Confirmação Password</label>
                                <input type="password" class="form-control" id="passwordConfirm" placeholder="Confirmação Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </fieldset>
                </form>
            </div>            
        </div>
    </body>
</html>
