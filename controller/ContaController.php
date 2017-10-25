<?php

require 'model/Conta.php';

/**
 * Description of ContaController
 * Controlador responsável por gerenciar todas as funcionalidades relacionadas a Conta
 * @author Wesley
 * @version 1.0
 * @package Controller
 * @created: 24 de Outubro de 2017s
 */

class ContaController {
    
    /**
     * Função getContaUsuario 
     * Esse metodo retorna um array de objetos com todas as contas existentes de acordo com o IdUsuario
     * @param IdUsuario
     * @return array de objetos 
     */
    public function getContaUsuario() {
        #instancia o objeto
        $modelConta = new Conta();
        
        #chama o metodo na model
        $arrayContas = $modelConta->getContaUsuario($_SESSION['idUsuario']);
        
        #include da view
        include 'view/conta.php';
    }
    
    /**
     * Função addConta 
     * Esse metodo verifica se os valores (campos) necessários foram preenchidos e grava um novo registro na tabela conta
     * @param nome, conta
     */
    public function addConta() {
        
        #verifica se existe valores nas variaveis
        if (empty($_POST['nome']) || empty($_POST['conta'])) {
            echo 'Favor informar os dados da conta!!!';exit();
        }

        try {
            $modelConta = new Conta();
            $modelConta->setIdUsuario($_SESSION['idUsuario']);
            $modelConta->setNomeConta($_POST['nome']);
            $modelConta->setNumeroConta($_POST['conta']);
            $modelConta->setDataCadastro(date('Y-m-d H:i:s'));
            $modelConta->setStatus('A');
            $modelConta->insert();
            
            #redirecionamento da página
            header("Location:?pagina=conta");
            
        } catch (DbException $e) {
            echo $e->$e->getMessage();
        } catch (Exception $e) {
            echo $e->$e->getMessage();
        }
    }
    
    /**
     * Função ativaDesativaConta 
     * Esse metodo ativa ou desativa a conta
     * @param conta, acao
     * @return array de objetos 
     */
    public function ativaDesativaConta() {

        try {            
            $modelConta = new Conta();
            $modelConta->setIdConta($_GET['conta']);
            
            $modelConta->ativaDesativaConta($_GET['acao']);
            
            #redirecionamento da página
            header("Location:?pagina=conta");
            
        } catch (DbException $e) {
            echo $e->$e->getMessage();
        } catch (Exception $e) {
            echo $e->$e->getMessage();
        }
    }
}
