<?php

require 'model/Transacao.php';

/**
 * Description of TransacaoController
 * Controlador responsável por gerenciar todas as funcionalidades relacionadas a Transação
 * @author Wesley
 * @version 1.0
 * @package Controller
 * @created: 24 de Outubro de 2017
 */

class TransacaoController {

     /**
     * Função addTransacao 
     * Esse metodo verifica se os valores (campos) necessários foram preenchidos e grava um novo registro na tabela transacao
     */
    
    public function addTransacao() {
        
        #verifica se existe valores nas variaveis
        if (empty($_POST['idConta']) || empty($_POST['valor'])|| empty($_POST['dataPrevista'])|| empty($_POST['dataRealizada'])|| empty($_POST['statusPagamento'])|| empty($_POST['tipoTransacao'])) {
            echo 'Favor informar os dados da transação para continuar!!!';exit();
        }

        try {
            /*
             * Tipos de Transação
             * D = Deposito
             * P = Pagamento
             * T = Transferência
             */

            $valor = $_POST['valor'];

            #verifica o tipo da transação, caso seja diferente de D (deposito) o valor deve ser negativo
            if ($_POST['tipoTransacao'] != 'D') {
                $valor = $valor * (-1);
            }

            $modelTransacao = new Transacao();
            $modelTransacao->setIdConta($_POST['idConta']);
            $modelTransacao->setValor($valor);
            $modelTransacao->setDataCadastro(date('Y-m-d H:i:s'));
            $modelTransacao->setTipoTransacao($_POST['tipoTransacao']);
            $modelTransacao->setMotivo('NULL');
            $modelTransacao->setStatusPagamento($_POST['statusPagamento']);
            $modelTransacao->setDataPrevista($_POST['dataPrevista']);
            $modelTransacao->setDataRealizada($_POST['dataRealizada']);
            $modelTransacao->insert();

            header("Location:?pagina=conta");
            
        } catch (DbException $e) {
            echo $e->$e->getMessage();
        } catch (Exception $e) {
            echo $e->$e->getMessage();
        }
    }

    /**
     * Função extratoPorPeriodo 
     * Esse metodo verifica se os valores (campos) necessários foram preenchidos e realiza uma consulta na tabela transacao buscando
     * todos os registros de acordo com o período informado. Caso não seja informado o período final, é estabelecido por default a 
     * data atual.
     * @param períodoInicial, conta
     */
    public function extratoPorPeriodo() {
        
        if (empty($_POST['períodoInicial'])) {
            echo 'Favor informar o período inicial para gerar o relatório!!!';exit();
        }
        $modelTransacao = new Transacao();

        $dataFinal = $_POST['periodoFinal'];

        if ($dataFinal == '') {
            $dataFinal = date('Y-m-d');
        }

        $arrayTransacao = $modelTransacao->extratoPorPeriodo($_POST['idConta'], $_POST['períodoInicial'], $dataFinal);

        include 'view/relatorio.php';
    }

    /**
     * Função editarTransacao 
     * Esse metodo updata o campo statusPagamento da tabela transacao de acordo com os parametros recebidos
     * @param transacao, acao
     */
    
    public function editarTransacao() {
        try {
            $idConta = $_GET['conta'];
            $modelTransacao = new Transacao();
            $modelTransacao->setIdTransacao($_GET['transacao']);
            $modelTransacao->setStatusPagamento($_GET['acao']);

            $modelTransacao->editarTransacao();

            header("Location:?pagina=relatorio_conta&conta=".$idConta."");
        } catch (DbException $e) {
            echo $e->$e->getMessage();
        } catch (Exception $e) {
            echo $e->$e->getMessage();
        }
    }

    /**
     * Função consultaSaque 
     * Esse metodo realiza uma consulta na tabela transacao e faz um somatório de todos os valores (créditos e debitos) 
     * @param idConta
     */
    public function consultaSaque($idConta) {
        $modelTransacao = new Transacao();
        return $modelTransacao->verificaSaldo($idConta);
    }

}
