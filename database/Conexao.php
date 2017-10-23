<?php

/**
 * Description of Conexao - Classe de acesso ao banco do dados
 * 
 * @author Wesley
 * @version 1.0
 * @package database
 * @created: 20 de Outubro de 2017
 */
class Conexao extends mysqli {

    /**
     * conectado - propriedade privada para 'indicar'  o estado da conexao
     *
     * @var boolean
     * @static
     */
    private static $conectado = false;

    /**
     * Instancia Conexao - propriedade para a implementacao do design pattern singleton
     *
     * @var instancia
     * @static
     */
    private static $instancia = null;

    /**
     * destrutor - quando o objeto for destruido a conexao e fechada
     *
     * @param void
     * @return void
     */
    public function __destruct() {
        $this->close();
    }

    /**
     * Retorna Conexao - esse metodo verifica se ja existe na memoria uma instancia da classe de Conexao
     * Se existir apenas retorna, senão é criada uma nova instancia
     *
     * @param void
     * @return instancia
     */
    public static function getInstance() {
        if (null === self::$instancia) {
            self::$instancia = new self ();
        }
        return self::$instancia;
    }

    /**
     * Conecta no banco - utiliza o construtor da superclasse mysqli
     *
     * @param void
     * @return void
     */
    public function conectar() {
        //se nao estiver conectado
        if (!self::$conectado) {

            parent::__construct(
//                    $_SESSION['bdHost'], $_SESSION['bdUser'], $_SESSION['bdPassword'], $_SESSION['bdBanco']
                    'localhost', 'root', '', 'mydb'
            );
            //se der erro na conexao gera uma excessao
            if (mysqli_connect_errno()) {
                throw new Exception('A Conexao falhou: ' . mysqli_connect_error());
            }
            self::$conectado = true;
        }
    }

    /**
     * Fecha a conexao - Sobrescreve o metodo close da superclasse
     *
     * @param void
     * @return void
     */
    public function close() {

        if (self::$conectado) {
            parent::close();
            self::$conectado = false;
        }
    }

    /**
     * Consulta sobreescreve o metodo da superclasse
     *
     * @param string $sql
     * @return mysqli_result Object
     */
    public function select($sql) {
        //'tenta' conectar
        $this->conectar();
        $result = parent::query($sql);
        if ($result) {
            return $result;
        } 
    }

    /**
     * Função para inserir o registro no banco de dados
     *
     * @param string $sql
     * @return true
     */
    public function insert($sql) {
        //'tenta' conectar
        $this->conectar();
        $result = parent::query($sql);
        if ($result) {
            return $result;
        } else {
            //se der erro gera uma excessao
            throw new Exception('Query Exception: ' . mysqli_error($this) . ' numero:' . mysqli_errno($this));
        }
    }

    /**
     * Função para atualizar o registro no banco de dados
     *
     * @param string $sql
     * @return true
     */
    public function update($sql) {
        //'tenta' conectar
        $this->conectar();
        $result = parent::query($sql);
        if ($result) {
            return $result;
        } else {
            //se der erro gera uma excessao
            throw new Exception('Query Exception: ' . mysqli_error($this) . ' numero:' . mysqli_errno($this));
        }
    }

    /**
     * Função para atualizar o registro no banco de dados
     *
     * @param string $sql
     * @return true
     */
    public function delete($sql) {
        //'tenta' conectar
        $this->conectar();
        $result = parent::query($sql);
        if ($result) {
            return $result;
        } else {
            //se der erro gera uma excessao
            throw new Exception('Query Exception: ' . mysqli_error($this) . ' numero:' . mysqli_errno($this));
        }
    }

    /**
     * Ping servidor banco - sobreescreve o metodo da superclasse
     *
     * @return boolean
     */
    public function ping() {
        // se estiver conectado retorna verdadeiro
        if (mysqli_ping($this)) {
            return true;
        } else {
            return false;
        }
    }
}