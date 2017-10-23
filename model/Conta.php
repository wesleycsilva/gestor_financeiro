<?php

require 'database/Conexao.php';

/**
 * Description of ContaModel
 *
 * @author Wesley
 */
class ContaModel {
    private $idConta;
    private $oUsuario;
    private $numeroConta;
    private $dataCadastro;
    private $status;
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getInstance();
    }
    
    function getIdConta() {
        return $this->idConta;
    }

    function getOUsuario() {
        return $this->oUsuario;
    }

    function getNumeroConta() {
        return $this->numeroConta;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdConta($idConta) {
        $this->idConta = $idConta;
    }

    function setOUsuario($oUsuario) {
        $this->oUsuario = $oUsuario;
    }

    function setNumeroConta($numeroConta) {
        $this->numeroConta = $numeroConta;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function setStatus($status) {
        $this->status = $status;
    }


}
