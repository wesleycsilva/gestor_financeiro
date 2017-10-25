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
                <form action="?pagina=add_transacao" method="post">
                    <fieldset> 
                        <legend>Gestor Financiero - Cadastro Transação</legend>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="transacao">Tipo de Transação</label>
                                <select class="form-control" id="tipoTransacao" name="tipoTransacao">
                                    <option value="">Selecione</option>
                                    <option value="D">Deposito</option>
                                    <option value="T">Transferência</option>
                                    <option value="P">Pagamento</option>
                                </select>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="valor">Valor</label>
                                <input type="number" class="form-control" id="valor" name="valor" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="data">Data Prevista</label>
                                <input type="date" class="form-control" id="dataPrevista" name="dataPrevista" placeholder="data Prevista">
                            </div>  
                            <div class="form-group col-md-6">
                                <label for="dataRealizada">Data Realizada</label>
                                <input type="date" class="form-control" id="dataRealizada" name="dataRealizada" >
                                <input type="hidden" class="form-control" id="idConta" name="idConta" value="<?php echo $_GET['conta']; ?>" >
                            </div>   
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Pagamento">Status Pagamento</label>
                                <select class="form-control" id="statusPagamento" name="statusPagamento">
                                    <option value="">Selecione</option>
                                    <option value="A">Aberto</option>
                                    <option value="P">Pago</option>
                                </select>
                            </div>                            
                            <div class="form-group col-md-6">
                                <label for="">&nbsp;</label>
                                <input type="hidden" class="form-control" id="idConta" name="idConta" value="<?php echo $_GET['conta']; ?>" >
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="?pagina=conta" class="btn btn-warning" role="button">Cancelar</a>
                    </fieldset>
                </form>
            </div>            
        </div>
    </body>
</html>
