<?php

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : "index";



switch ($pagina) {
    case "index":
        require 'controller/HomeController.php';
        $ctrl = new HomeController();
        $ctrl->Index();
        break;
    case "login":
        require 'controller/HomeController.php';
        $ctrl = new HomeController();
        $ctrl->Login();
        break;
    case "painel":
        require 'controller/HomeController.php';
        $ctrl = new HomeController();
        $ctrl->Painel();
        break;
    case "dashboard_usuario":
        require 'controller/HomeController.php';
        $ctrl = new HomeController();
        $ctrl->Usuario();
        break;
    case "cadastro":
        require 'controller/HomeController.php';
        $ctrl = new HomeController();
        $ctrl->Cadastro();
        break;
    case "cadastro_usuario":
        require 'controller/UsuarioController.php';
        $ctrl = new UsuarioController();
        $ctrl->CadastroUsuario();
        break;
}
?>
