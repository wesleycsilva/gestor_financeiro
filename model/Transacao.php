<?php

require 'database/Conexao.php';

/**
 * Description of TransacaoModel
 *
 * @author Wesley
 */
class TransacaoModel {
    private $idTransacao;
    private $oConta;
    private $valor;
    private $dataCadastro;
    private $motivo;
    private $situacao;
    private $statusPagamento;
    private $dataPrevista;
    private $dataRealizada;
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getInstance();
    }
    
    function getIdTransacao() {
        return $this->idTransacao;
    }

    function getOConta() {
        return $this->oConta;
    }

    function getValor() {
        return $this->valor;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function getMotivo() {
        return $this->motivo;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getStatusPagamento() {
        return $this->statusPagamento;
    }

    function getDataPrevista() {
        return $this->dataPrevista;
    }

    function getDataRealizada() {
        return $this->dataRealizada;
    }

    function setIdTransacao($idTransacao) {
        $this->idTransacao = $idTransacao;
    }

    function setOConta($oConta) {
        $this->oConta = $oConta;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function setMotivo($motivo) {
        $this->motivo = $motivo;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setStatusPagamento($statusPagamento) {
        $this->statusPagamento = $statusPagamento;
    }

    function setDataPrevista($dataPrevista) {
        $this->dataPrevista = $dataPrevista;
    }

    function setDataRealizada($dataRealizada) {
        $this->dataRealizada = $dataRealizada;
    }


}
