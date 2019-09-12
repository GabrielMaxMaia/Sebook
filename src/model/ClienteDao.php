<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Cliente e ClienteDAO
class ClienteDAO extends Cliente{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from cliente where cod_status_cliente = '1'";
    private static $SELECT_ID = "select * from cliente where id_usuario = :id";

    private static $INSERT = "INSERT INTO `cliente` (`id_usuario`,`sexo_cliente`,`compl_end_cliente`,`logradouro_cliente`,`url_foto_cliente`,`num_compl_cliente`,`cpf_cliente`,`cep_cliente`,`dt_nasc_cliente`,`cod_status_cliente`) VALUES (:id_usuario,:sexo_cliente,:compl_end_cliente,:logradouro_cliente,:url_foto_cliente,:num_compl_cliente,:cpf_cliente,:cep_cliente,:dt_nasc_cliente,:cod_status_cliente)"; 

    private static $UPDATE = "UPDATE `cliente` SET
    `id_usuario` = :id_usuario,
    `sexo_cliente` = :sexo_cliente,
    `compl_end_cliente` = :compl_end_cliente,
    `logradouro_cliente` = :logradouro_cliente,
    `url_foto_cliente` = :url_foto_cliente,
    `num_compl_cliente` = :num_compl_cliente,
    `cpf_cliente` = :cpf_cliente,
    `cep_cliente` = :cep_cliente,
    `dt_nasc_cliente` = :dt_nasc_cliente,
    `cod_status_cliente` = :cod_status_cliente
    WHERE `id_usuario` = :id_usuario";    


    //DELETE lógico -> altera status                                            
    private static $DELETE = "UPDATE cliente SET cod_status_cliente = 0 WHERE id_usuario = :id_usuario";                                

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idUsuario = "", $sexoCliente = "", $complEndCliente = "", $logradouroCliente = "", $urlFotoCliente = "", $numComplCliente = "", $cpfCliente = "", $cepCliente = "", $dtNascCliente = "", $codStatusCliente = "")
    {
        parent::__construct($idUsuario, $sexoCliente, $complEndCliente, $logradouroCliente, $urlFotoCliente, $numComplCliente, $cpfCliente, $cepCliente, $dtNascCliente, $codStatusCliente);
        $this->sql = $objSql;        
    }

    //Métodos especialistas - irão executar os SQL dos Atributos

    public function listarClientes(){
        //executar a consulta no banco
        $result = $this->sql->query(ClienteDAO::$SELECT_ALL);
        //devolver o resultado
       
        if($result->rowCount() > 0){
            while($linha = $result->fetch(\PDO::FETCH_OBJ)){
                $itens[] = array(
                    'idUsuario' => $linha->id_usuario, 
                    'sexoCliente'=> $linha->sexo_cliente, 
                    'complEndCliente' => $linha->compl_end_cliente, 
                    'logradouroCliente' => $linha->logradouro_cliente, 
                    'urlFotoCliente' => $linha->url_foto_cliente, 
                    'numComplCliente' => $linha->num_compl_cliente,
                    'cpfCliente' => $linha->cpf_cliente, 
                    'cepCliente' => $linha->cep_cliente, 
                    'dtNascCliente' => $linha->dt_nasc_cliente,
                    'codStatusCliente' => $linha->cod_status_cliente 
                );
            }
        }else{
            $itens = null;
        }
        return $itens;
        var_dump($itens);
    }

    public function listarClienteId(){
        //executar a consulta no banco
        $result = $this->sql->query(ClienteDAO::$SELECT_ID,
                      array(
                          'id_usuario' => array( 0=> $this->setIdUsuario(),1 => \PDO::PARAM_INT )
                      )  
                    );
        if($result->rowCount() == 1){
            $linha = $result->fetch(\PDO::FETCH_OBJ);
                $itens = array(
                    `id_usuario`=> $linha->idUsuario,
                    `cod_status_cliente`=> $linha->codStatusCliente 
                );
        }else{
            $itens = null;
        }
         //devolver o resultado     
         return $itens;  
    }

    public function adicionarCliente(){
        $result = $this->sql->execute(ClienteDAO::$INSERT,
                    array(
                        `:sexo_cliente`=> array(0 => $this->getSexoCliente(), 1=>\PDO::PARAM_STR),  
                        `:compl_end_cliente`=> array(0 => $this->getComplEndCliente(), 1=>\PDO::PARAM_STR),  
                        `:logradouro_cliente`=> array(0 => $this->getLogradouroCliente(), 1=>\PDO::PARAM_STR),  
                        `:url_foto_cliente`=> array(0 => $this->getUrlFotoCliente(), 1=>\PDO::PARAM_STR),
                        `:num_compl_cliente`=> array(0 => $this->getNumComplCliente(), 1=>\PDO::PARAM_STR),
                        `:cpf_cliente`=> array(0 => $this->getCpfCliente(), 1=>\PDO::PARAM_STR),
                        `:cep_cliente`=> array(0 => $this->getCepCliente(), 1=>\PDO::PARAM_STR),
                        `:dt_nasc_cliente`=> array(0 => $this->getDtNascCliente(), 1=>\PDO::PARAM_STR),
                        `:cod_status_cliente`=> array(0 => $this->getCodStatusCliente(), 1=>\PDO::PARAM_STR),
                    )
                );
        return $result;
    }

    public function excluirCliente(){
        $result = $this->sql->execute(ClienteDAO::$DELETE,
                array(
                    ':id'=>array(0 => $this->getIdCliente(), 1=>\PDO::PARAM_INT)
                )
            );
        return $result;
    }


}