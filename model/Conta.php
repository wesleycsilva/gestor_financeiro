<?php

require 'database/Conexao.php';
//require 'model/Usuario.php';

/**
 * Description of ContaModel
 *
 * @author Wesley
 */
class Conta {

    private $idConta;
    private $idUsuario;
    private $nomeConta;
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

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNomeConta() {
        return strtoupper($this->nomeConta);
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

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNomeConta($nomeConta) {
        $this->nomeConta = $nomeConta;
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
    
    public function insert() {
        try {
            $sqlConta = "INSERT INTO conta
                                (idUsuario,
                                nomeConta, 
                                numeroConta,
                                dataCadastro, 
                                status) 
                                VALUES 
                                (" . $this->getIdUsuario() . ",
                                '" . $this->getNomeConta() . "',
                                '" . $this->getNumeroConta() . "',
                                '" . $this->getDataCadastro() . "', 
                                '" . $this->getStatus() . "')";
            $this->conexao->insert($sqlConta);
        } catch (Exception $e) {
            throw new DbException($e, "Erro ao inserir Conta!");
        }
    }
    
    public function ativaDesativaConta($acao) {
        try {
            $slqConta = "UPDATE conta SET status = '" . $acao . "' WHERE idConta = " . $this->getIdConta() . "";
            $this->conexao->delete($slqConta);
        } catch (Exception $e) {
            throw new DbException($e, "Erro ao inativar Conta!");
        }
    }

    public function getContaUsuario($idUsuario) {
        $slqConta = "SELECT * FROM conta WHERE idUsuario = $idUsuario";
        $result = $this->conexao->select($slqConta);
        $resultadoConta = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $oConta = new Conta();
            $oConta->setIdConta($row['idConta']);
            $oConta->setIdUsuario($row['idUsuario']);
            $oConta->setNomeConta($row['nomeConta']);
            $oConta->setNumeroConta($row['numeroConta']);
            $oConta->setDataCadastro($row['dataCadastro']);
            $oConta->setStatus($row['status']);

            $resultadoConta[] = $oConta;
            unset($oConta);
        }
        return $resultadoConta;
    }

}
