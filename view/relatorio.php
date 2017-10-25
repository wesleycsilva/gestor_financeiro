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
                <?php if (count($arrayTransacao) > 0) {
                    ?>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr class="info">
                                <td style='text-align: center; vertical-align: middle;'>TIPO TRANSAÇÃO</td>
                                <td style='text-align: center; vertical-align: middle;'>STATUS PAGAMENTO</td>
                                <td style='text-align: center; vertical-align: middle;'>VALOR</td>
                                <td style='text-align: center; vertical-align: middle;'>DATA PREVISTO</td>
                                <td style='text-align: center; vertical-align: middle;'>DATA DATA REALIZADA</td>
                                <td style='text-align: center; vertical-align: middle;'>DATA CADASTRO</td>
                                <td style='text-align: center; vertical-align: middle;'>AÇÕES</td>
                            </tr>
                        </thead>

                        <?php
                        foreach ($arrayTransacao as $row) {
                            ?>
                            <tr class="">
                                <td style='text-align: center; vertical-align: middle;'><?php echo $row->getTipoTransacao(); ?></td>
                                <td style='text-align: center; vertical-align: middle;'><?php echo $row->getStatusPagamento(); ?></td>
                                <td style='text-align: center; vertical-align: middle;'><?php echo $row->getValor(); ?></td>
                                <td style='text-align: center; vertical-align: middle;'><?php echo $row->getDataPrevista(); ?></td>
                                <td style='text-align: center; vertical-align: middle;'><?php echo $row->getDataRealizada(); ?></td>
                                <td style='text-align: center; vertical-align: middle;'><?php echo $row->getDataCadastro(); ?></td>
                                <?php if ($row->getStatusPagamento() == 'Aberto') { ?>
                                    <td style='text-align: center; vertical-align: middle;'>
                                        <a href="?pagina=editar_transacao&transacao=<?php echo $row->getIdTransacao(); ?>&acao=P&conta=<?php echo $row->getIdConta(); ?>" class="btn btn-success" title="PAGAR" role="button"><i class="glyphicon glyphicon-usd">  </i></a>
                                        <a href="?pagina=editar_transacao&transacao=<?php echo $row->getIdTransacao(); ?>&acao=C&conta=<?php echo $row->getIdConta(); ?>" class="btn btn-danger" title="CANCELAR" role="button"><i class="glyphicon glyphicon-off">  </i></a>
                                    </td>
                                <?php } else if ($row->getStatusPagamento() == 'Pago') { ?>
                                    <td style='text-align: center; vertical-align: middle;'>
                                        <a href="?pagina=editar_transacao&transacao=<?php echo $row->getIdTransacao(); ?>&acao=A&conta=<?php echo $row->getIdConta(); ?>" class="btn btn-info" title="ABRIR" role="button"><i class="glyphicon glyphicon-hand-right">  </i></a>
                                        <a href="?pagina=editar_transacao&transacao=<?php echo $row->getIdTransacao(); ?>&acao=C&conta=<?php echo $row->getIdConta(); ?>" class="btn btn-danger" title="CANCELAR" role="button"><i class="glyphicon glyphicon-off">  </i></a>
                                    </td>
                                <?php } else if ($row->getStatusPagamento() == 'Cancelado') { ?>
                                    <td style='text-align: center; vertical-align: middle;'>
                                        <a href="?pagina=editar_transacao&transacao=<?php echo $row->getIdTransacao(); ?>&acao=A&conta=<?php echo $row->getIdConta(); ?>" class="btn btn-info" title="REATIVAR" role="button"><i class="glyphicon glyphicon-hand-right">  </i></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
                <a href="?pagina=conta" class="btn btn-primary" role="button"><i class="glyphicon glyphicon-arrow-left"> </i> Voltar </a>
            </div>            
        </div>
    </body>
</html>
