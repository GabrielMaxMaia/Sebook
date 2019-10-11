<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Cliente e ClienteDAO
class ClienteDAO extends Cliente
{
    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from cliente where cod_status_cliente = '1'";

    private static $SELECT_ID = "select * from cliente where id_usuario = :idUsuario";

    private static $INSERT = "INSERT INTO cliente (id_usuario,sexo_cliente,compl_end_cliente,logradouro_cliente,url_foto_cliente,num_compl_cliente,cpf_cliente,cep_cliente,dt_nasc_cliente) VALUES (:idUsuario,:sexoCliente,:complEndCliente,:logradouroCliente,:urlFotoCliente,:numComplCliente,:cpfCliente,:cepCliente,:nascCliente)";

    private static $UPDATE = "UPDATE cliente SET sexo_cliente = :sexoCliente, compl_end_cliente = :complEndCliente, logradouro_cliente = :logradouroCliente, url_foto_cliente = :urlFotoCliente, num_compl_cliente = :numComplCliente, cpf_cliente = :cpfCliente,cep_cliente =:cepCliente, dt_nasc_cliente = :nascCliente
    WHERE id_usuario = :idUsuario";


    //DELETE lógico -> altera status                                            
    private static $DELETE = "UPDATE cliente SET cod_status_cliente = '0' WHERE id_usuario = :idUsuario";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idUsuario = "", $sexoCliente = "", $complEndCliente = "", $logradouroCliente = "", $urlFotoCliente = "", $numComplCliente = "", $cpfCliente = "", $cepCliente = "", $dtNascCliente = "", $codStatusCliente = "")
    {
        parent::__construct($idUsuario, $sexoCliente, $complEndCliente, $logradouroCliente, $urlFotoCliente, $numComplCliente, $cpfCliente, $cepCliente, $dtNascCliente, $codStatusCliente);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos

    public function listarClientes()
    {
        //executar a consulta no banco
        $result = $this->sql->query(ClienteDAO::$SELECT_ALL);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idUsuario' => $linha->id_usuario,
                    'sexoCliente' => $linha->sexo_cliente,
                    'complEndCliente' => $linha->compl_end_cliente,
                    'logradouroCliente' => $linha->logradouro_cliente,
                    'urlFotoCliente' => $linha->url_foto_cliente,
                    'numComplCliente' => $linha->num_compl_cliente,
                    'cpfCliente' => $linha->cpf_cliente,
                    'cepCliente' => $linha->cep_cliente,
                    'nascCliente' => $linha->dt_nasc_cliente,
                    'codStatusCliente' => $linha->cod_status_cliente
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarClienteId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            ClienteDAO::$SELECT_ID,
            array(
                'idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );

        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idUsuario' => $linha->id_usuario,
                'codStatusCliente' => $linha->cod_status_cliente,
                'sexoCliente' => $linha->sexo_cliente,
                'cpfCliente' => $linha->cpf_cliente,
                'nascCliente' => $linha->dt_nasc_cliente,
                'cepCliente' => $linha->cep_cliente,
                'logradouroCliente' => $linha->logradouro_cliente,
                'urlFotoCliente' => $linha->url_foto_cliente,
                'complEndCliente' => $linha->compl_end_cliente,
                'numComplCliente' => $linha->num_compl_cliente
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function alterarCliente()
    {
        $result = $this->sql->execute(
            ClienteDAO::$UPDATE,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':sexoCliente' => array(0 => $this->getSexoCliente(), 1 => \PDO::PARAM_STR),
                ':complEndCliente' => array(0 => $this->getComplementoCliente(), 1 => \PDO::PARAM_STR),
                ':logradouroCliente' => array(0 => $this->getLogradouroCliente(), 1 => \PDO::PARAM_STR),
                ':urlFotoCliente' => array(0 => $this->getUrlFotoCliente(), 1 => \PDO::PARAM_STR),
                ':numComplCliente' => array(0 => $this->getNumComplCliente(), 1 => \PDO::PARAM_STR),
                ':cpfCliente' => array(0 => $this->getCpfCliente(), 1 => \PDO::PARAM_STR),
                ':cepCliente' => array(0 => $this->getCepCliente(), 1 => \PDO::PARAM_STR),
                ':nascCliente' => array(0 => date_format(date_create($this->getNascimentoCliente()),"Y-m-d"), 1 => \PDO::PARAM_STR)    
            )
        );
        var_dump($result);
        return $result;
        // ':url_foto_cliente' => array(0 => $this->getUrlFotoCliente(), 1 => \PDO::PARAM_STR),
    }

    public function adicionarCliente()
    {
        $result = $this->sql->execute(
            ClienteDAO::$INSERT,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':sexoCliente' => array(0 => $this->getSexoCliente(), 1 => \PDO::PARAM_STR),
                ':complEndCliente' => array(0 => $this->getComplementoCliente(), 1 => \PDO::PARAM_STR),
                ':logradouroCliente' => array(0 => $this->getLogradouroCliente(), 1 => \PDO::PARAM_STR),
                ':urlFotoCliente' => array(0 => $this->getUrlFotoCliente(), 1 => \PDO::PARAM_STR),
                ':numComplCliente' => array(0 => $this->getNumComplCliente(), 1 => \PDO::PARAM_STR),
                ':cpfCliente' => array(0 => $this->getCpfCliente(), 1 => \PDO::PARAM_STR),
                ':cepCliente' => array(0 => $this->getCepCliente(), 1 => \PDO::PARAM_STR),
                ':nascCliente' => array(0 => $this->getNascimentoCliente(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function excluirCliente()
    {
        $result = $this->sql->execute(
            ClienteDAO::$DELETE,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
