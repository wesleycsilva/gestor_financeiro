<?php

//require_once (dirname(__FILE__) . '/database/Conexao.php');
require 'database/Conexao.php';

/**
 * Description of Model
 *
 * @author Wesley
 */
class Usuario {

    private $idUsuario;
    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $dataNascimento;
    private $dataCadastro;
    private $status;
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getInstance();
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNome() {
        return strtoupper($this->nome);
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function getStatus() {
        return $this->status;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNome($nome) {
        $this->nome = strtoupper($nome);
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    public function insert() {
        try {
            $sqlUsuario = "INSERT INTO usuario
                                (nome, 
                                cpf, 
                                email, 
                                senha,
                                dataNascimento, 
                                dataCadastro, 
                                status) 
                                VALUES 
                                ('" . $this->getNome() . "',
                                '" . $this->getCpf() . "',
                                '" . $this->getEmail() . "', 
                                MD5('" . $this->getEmail() . "'), 
                                '" . $this->getDataNascimento() . "', 
                                '" . $this->getDataCadastro() . "', 
                                '" . $this->getStatus() . "')";
            $this->conexao->insert($sqlUsuario);
        } catch (Exception $e) {
            throw new DbException($e, "Erro ao inserir usuário!");
        }
    }

    public function update() {
        try {
            $slqUsuario = "UPDATE usuario SET 
                                nome            = '" . $this->getNome() . "', 
                                cpf             = '" . $this->getCpf() . "', 
                                email           = '" . $this->getEmail() . "', 
                                dataNascimento  = '" . $this->getDataNascimento() . "', 
                                status          = '" . $this->getStatus() . "'
                            WHERE idUsuario     = " . $this->getIdUsuario() . "";
            $this->conexao->update($slqUsuario);
        } catch (Exception $e) {
            throw new DbException($e, "Erro ao atualizar dados do usuário!");
        }
    }

    public function delete() {
        try {
            $slqUsuario = "UPDATE usuario SET status = 'I' WHERE idUsuario = " . $this->getIdUsuario() . "";
            $this->conexao->delete($slqUsuario);
        } catch (Exception $e) {
            throw new DbException($e, "Erro ao excluir usuário!");
        }
    }

    public function getObjetoUsuario($idUsuario) {
        $slqUsuario = "SELECT * FROM usuario WHERE idUsuario = " . $idUsuario . "";
        $query = $this->conexao->select($slqUsuario);
        $result = mysqli_fetch_assoc($query);

        $oUsuario = new Usuario();

        $oUsuario->setIdUsuario($result['idUsuario']);
        $oUsuario->setNome($result['nome']);
        $oUsuario->setCpf($result['cpf']);
        $oUsuario->setEmail($result['email']);
        $oUsuario->setSenha($result['senha']);
        $oUsuario->setDataNascimento($result['dataNascimento']);
        $oUsuario->setDataCadastro($result['dataCadastro']);
        $oUsuario->setStatus($result['status']);

        return $oUsuario;
    }

    public function getAllUsuario() {
        $slqUsuario = "SELECT * FROM idUsuario";
        $result = $this->conexao->select($slqUsuario);
        $resultadoUsuario = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $oUsuario = new Usuario();
            $oUsuario->setIdUsuario($row['idUsuario']);
            $oUsuario->setNome($row['nome']);
            $oUsuario->setCpf($row['cpf']);
            $oUsuario->setEmail($row['email']);
            $oUsuario->setSenha($row['senha']);
            $oUsuario->setDataNascimento($row['dataNascimento']);
            $oUsuario->setDataCadastro($row['dataCadastro']);
            $oUsuario->setStatus($row['status']);
            $resultadoUsuario[] = $oUsuario;
            unset($oUsuario);
        }
        return $resultadoUsuario;
    }

}
