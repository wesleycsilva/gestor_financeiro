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
                <h3>Gestor Financeiro - Minhas Contas</h3>
                <?php if (count($arrayContas) > 0) {
                    ?>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="success">
                                <td style='text-align: center; vertical-align: middle;'>NOME</td>
                                <td style='text-align: center; vertical-align: middle;'>CONTA</td>
                                <td style='text-align: center; vertical-align: middle;'>DATA CADASTRO</td>
                                <td style='text-align: center; vertical-align: middle;'>STATUS</td>
                                <td style='text-align: center; vertical-align: middle;'>AÇÕES</td>
                            </tr>
                        </thead>

                        <?php
                        foreach ($arrayContas as $row) {
                            ?>
                            <tr class="">
                                <td style='text-align: center; vertical-align: middle;'><?php echo $row->getNomeConta(); ?></td>
                                <td style='text-align: center; vertical-align: middle;'><?php echo $row->getNumeroConta(); ?></td>
                                <td style='text-align: center; vertical-align: middle;'><?php echo $row->getDataCadastro() ?></td>
                                <?php
                                    if ($row->getStatus() == 'A') { ?>
                                        <td style='text-align: center; vertical-align: middle;'>ATIVO</td>
                                        <td style='text-align: center; vertical-align: middle;'>
                                            <a href="?pagina=cadastro_transacao&conta=<?php echo $row->getIdConta(); ?>" class="btn btn-success" title="TRANSAÇÃO" role="button"><i class="glyphicon glyphicon-usd">  </i></a>
                                            <a href="?pagina=relatorio_conta&conta=<?php echo $row->getIdConta(); ?>" class="btn btn-info" title="RELATÓRIO" role="button"><i class="glyphicon glyphicon-tasks">  </i></a>
                                            <a href="?pagina=inativar_conta&conta=<?php echo $row->getIdConta(); ?>&acao=I" class="btn btn-danger" title="INATIVAR" role="button"><i class="glyphicon glyphicon-off">  </i></a>
                                        </td>
                                
                                 <?php } else { ?>
                                        <td style='text-align: center; vertical-align: middle;'>INATIVO</td>
                                        
                                        <td style='text-align: center; vertical-align: middle;'> 
                                            <a href="?pagina=inativar_conta&conta=<?php echo $row->getIdConta(); ?>&acao=A" class="btn btn-default" title="ATIVAR" role="button"><i class="glyphicon glyphicon-hand-right">  </i></a>
                                        </td>
                                  <?php } ?>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
                <a href="?pagina=cadastrar_conta" class="btn btn-primary" role="button"><i class="glyphicon glyphicon-plus"> </i> ADD CONTAS  </a>
            </div>            
        </div>
    </body>
</html>
