<?php

require 'model/Usuario.php';

/**
 * Description of UsuarioController
 *
 * @author Wesley
 */
class UsuarioController {

    public function CadastroUsuario() {

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

//        $usuario = $model->getObjetoUsuario(1);
//        var_dump($usuario);exit;
        include 'view/Painel.php';
        } catch (DbException $e) {
            throw new DbException($e, "Erro ao inserir usuário!");
//            return $objResponse->getXML();
        } catch (Exception $e) {
            throw new Exception($e, "Erro ao inserir usuário!");
        }
    }

}
