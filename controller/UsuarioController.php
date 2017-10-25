<?php

require 'model/Usuario.php';

/**
 * Description of UsuarioController
  * Controlador responsável por gerenciar todas as funcionalidades relacionadas a usuário
 * @author Wesley
 * @version 1.0
 * @package Controller
 * @created: 22 de Outubro de 2017
 */
class UsuarioController {

    /**
     * Função addUsuario 
     * Esse metodo verifica se os valores (campos) necessários foram preenchidos e grava um novo registro na tabela usuario
     */
    public function addUsuario() {
        
        if (empty($_POST['nome']) || empty($_POST['cpf'])|| empty($_POST['email'])|| empty($_POST['password'])|| empty($_POST['dataNascimento'])) {
            echo 'Por gentileza, é necessário informar todos dados para cadastro!!!';exit();
        }

        try {
            $modelUsuario = new Usuario();
            $modelUsuario->setNome($_POST['nome']);
            $modelUsuario->setCpf($_POST['cpf']);
            $modelUsuario->setEmail($_POST['email']);
            $modelUsuario->setSenha($_POST['password']);
            $modelUsuario->setDataNascimento($_POST['dataNascimento']);
            $modelUsuario->setDataCadastro(date('Y-m-d H:i:s'));
            $modelUsuario->setStatus('A');
            $modelUsuario->insert();

            header("Location:?pagina=dashboard_usuario");
            
        } catch (DbException $e) {
           echo $e->$e->getMessage();
        } catch (Exception $e) {
            echo $e->$e->getMessage();
        }
    }

     /**
     * Função login 
     * Esse metodo verifica se os valores (campos) necessários foram preenchidos 
     * e verifica se os dados informados para login estão corretos
     */
    public function login() {

        if (empty($_POST['login']) || empty($_POST['password'])) {
            echo 'Favor informar os dados para acesso!!!';exit();
        }

        $modelUsuario = new Usuario();
        $modelUsuario->setCpf($_POST['login']);
        $modelUsuario->setSenha($_POST['password']);

        if ($modelUsuario->consultaLoginUsuario()) {
            $_SESSION['idUsuario'] = $modelUsuario->getIdUsuario();
            
            include 'view/dashboard_usuario.php';
            
        } else {
            echo 'Erro, login e/ou senha inválido(s)! Tente novamente!';
        }
    }

}
