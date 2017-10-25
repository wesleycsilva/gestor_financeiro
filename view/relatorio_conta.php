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
                <form action="?pagina=extrato_data" method="post">
                    <fieldset> 
                        <legend>Gestor Financiero - Extrato Financeiro</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inicio">Data Inicial</label>
                                <input type="date" class="form-control" id="períodoInicial" name="períodoInicial" placeholder="Data Inicial">
                                <input type="hidden" class="form-control" id="idConta" name="idConta" value="<?php echo $_GET['conta']; ?>" >
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="final">Data Final</label>
                                <input type="date" class="form-control" id="periodoFinal" name="periodoFinal" placeholder="Data Final">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Gerar</button>
                        <a href="?pagina=conta" class="btn btn-warning" role="button">Cancelar</a>
                    </fieldset>
                </form>
            </div>            
        </div>
    </body>
</html>
