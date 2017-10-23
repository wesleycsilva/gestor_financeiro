<?php

require 'model/Usuario.php';

/**
 * Description of HomeController
 *
 * @author Wesley
 */
class HomeController {

    public function Index() {
        include 'view/Index.php';
    }

    public function Login() {
        include 'view/Login.php';
    }

    public function Painel() {
//        $model = new UsuarioModel();
//        $usuario = $model->UsuarioLogado();
//        include 'view/Painel.php';

        $model = new Usuario();
        $usuario = $model->getObjetoUsuario(1);
        include 'view/Painel.php';
    }

    public function Usuario() {
        $model = new Usuario();
        $usuario = $model->getObjetoUsuario(1);
        include 'view/dashboard_usuario.php';
    }
    public function Cadastro() {
        include 'view/cadastro.php';
    }
    
    public function CadastroUsuario() {
        $model = new Usuario();
        $usuario = $model->getObjetoUsuario(1);
        include 'view/dashboard_usuario.php';
    }
    
}
