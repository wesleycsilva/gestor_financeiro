<?php

require 'database/Conexao.php';

/**
 * Description of TransacaoModel
 *
 * @author Wesley
 */
class Transacao {

    private $idTransacao;
    private $idConta;
    private $valor;
    private $dataCadastro;
    private $motivo;
    private $tipoTransacao;
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

    function getIdConta() {
        return $this->idConta;
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

    function getTipoTransacao() {
        return $this->tipoTransacao;
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

    function setIdConta($idConta) {
        $this->idConta = $idConta;
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

    function setTipoTransacao($tipoTransacao) {
        $this->tipoTransacao = $tipoTransacao;
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

    public function insert() {
        try {
            $sqlTransacao = "INSERT INTO transacao
                                (idConta,
                                valor, 
                                dataCadastro, 
                                tipoTransacao, 
                                motivo,
                                statusPagamento, 
                                dataPrevista, 
                                dataRealizada) 
                                VALUES 
                                (" . $this->getIdConta() . ",
                                " . $this->getValor() . ",
                                '" . $this->getDataCadastro() . "',
                                '" . $this->getTipoTransacao() . "',
                                " . $this->getMotivo() . ", 
                                '" . $this->getStatusPagamento() . "', 
                                '" . $this->getDataPrevista() . "', 
                                '" . $this->getDataRealizada() . "')";

            $this->conexao->insert($sqlTransacao);
        } catch (Exception $e) {
            throw new DbException($e, "Erro ao inserir Transação!");
        }
    }

    public function extratoPorPeriodo($idConta, $dataInicial, $dataFinal) {

        $sqlTransacao = "SELECT idTransacao, valor, dataCadastro, 
                            dataPrevista, dataRealizada, idConta,
                        CASE tipoTransacao
                            WHEN 'D' THEN 'Deposito'
                            WHEN 'T' THEN 'Transferência'
                            WHEN 'P' THEN 'Pagamento'
                        END tipoTransacao,
                        CASE statusPagamento
                            WHEN 'A' THEN 'Aberto'
                            WHEN 'C' THEN 'Cancelado'
                            WHEN 'P' THEN 'Pago'
                        END statusPagamento
                        FROM transacao WHERE idConta = $idConta
                            AND (dataRealizada >= '" . $dataInicial . "' AND dataRealizada <= '" . $dataFinal . "')
                        ORDER BY dataRealizada ASC";
        
        $result = $this->conexao->select($sqlTransacao);
        $resultadoTransacao = array();
        
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $oTransacao = new Transacao();
            $oTransacao->setIdTransacao($row['idTransacao']);
            $oTransacao->setIdConta($row['idConta']);
            $oTransacao->setValor($row['valor']);
            $oTransacao->setDataCadastro($row['dataCadastro']);
            $oTransacao->setDataPrevista($row['dataPrevista']);
            $oTransacao->setDataRealizada($row['dataRealizada']);
            $oTransacao->setStatusPagamento($row['statusPagamento']);
            $oTransacao->setTipoTransacao($row['tipoTransacao']);

            $resultadoTransacao[] = $oTransacao;
            unset($oTransacao);
        }
        return $resultadoTransacao;
    }
    
    public function editarTransacao() {
        try {
            $sqlTransacao = "UPDATE transacao SET statusPagamento = '" . $this->getStatusPagamento() . "' WHERE idTransacao = " . $this->getIdTransacao() . "";
            $this->conexao->delete($sqlTransacao);
        } catch (Exception $e) {
            throw new DbException($e, "Erro ao editar transação!");
        }
    }

    public function verificaSaldo($idConta, $valor) {
        try {
            $sqlTransacao = "SELECT SUM(valor) AS saldo FROM transacao WHERE idConta = $idConta";
            $query = $this->conexao->select($sqlTransacao);
            $result = mysqli_fetch_assoc($query);

            if (count($result) == 0) {
                return FALSE;
            } elseif ($valor > $result['saldo']) {
                return FALSE;
            } else {
                return TRUE;
            }
        } catch (Exception $e) {
            throw new DbException($e, "Erro ao consultar saldo!");
        }
    }

}
