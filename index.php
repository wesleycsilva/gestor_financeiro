<?php

session_start();

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : "index";

switch ($pagina) {
    case "index":
        $ctrl = retornaInstanciaController("home");
        $ctrl->Index();
        break;
    case "painel":
        $ctrl = retornaInstanciaController("home");
        $ctrl->Painel();
        break;
    case "dashboard_usuario":
        $ctrl = retornaInstanciaController("usuario");
        $ctrl->login();
        break;
    case "cadastro":
        $ctrl = retornaInstanciaController("home");
        $ctrl->Cadastro();
        break;
    case "cadastro_usuario":
        $ctrl = retornaInstanciaController("usuario");
        $ctrl->addUsuario();
        break;
    case "conta":
        $ctrl = retornaInstanciaController("conta");
        $ctrl->getContaUsuario();
        break;
    case "cadastrar_conta":
        include 'view/cadastro_conta.php';
        break;
    case "add_conta":
        $ctrl = retornaInstanciaController("conta");
        $ctrl->addConta();
        break;
    case "relatorio_conta":
        include 'view/relatorio_conta.php';
        break;
    case "cadastro_transacao":
        include 'view/cadastro_transacao.php';
        break;
    case "add_transacao":
        $ctrl = retornaInstanciaController("transacao");
        $ctrl->addTransacao();
        break;
    case "extrato_data":
        $ctrl = retornaInstanciaController("transacao");
        $ctrl->extratoPorPeriodo();
        break;
    case "inativar_conta":
        $ctrl = retornaInstanciaController("conta");
        $ctrl->inativarConta();
        break;
    case "editar_transacao":
        $ctrl = retornaInstanciaController("transacao");
        $ctrl->editarTransacao();
        break;
}

function retornaInstanciaController($controle) {
    if ($controle == "usuario") {
        require 'controller/UsuarioController.php';
        $ctrl = new UsuarioController();
    } else if ($controle == "home") {
        require 'controller/HomeController.php';
        $ctrl = new HomeController();
    } else if ($controle == "conta") {
        require 'controller/ContaController.php';
        $ctrl = new ContaController();
    } else if ($controle == "transacao") {
        require 'controller/TransacaoController.php';
        $ctrl = new TransacaoController();
    }
    return $ctrl;
}
