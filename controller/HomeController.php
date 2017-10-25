<?php

require 'model/Usuario.php';

/**
 * Description of HomeController
 * Controlador responsável por gerenciar as funções ou redirecionamentos do sistema
 * @author Wesley
 * @version 1.0
 * @package Controller
 * @created: 20 de Outubro de 2017
 */
class HomeController {

    public function Index() {
        include 'view/Index.php';
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
