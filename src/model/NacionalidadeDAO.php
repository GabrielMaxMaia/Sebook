<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Nacionalidade e NacionalidadeDAO
class NacionalidadeDAO extends Nacionalidade
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from nacionalidade";

    private static $SELECT_ID = "select * from nacionalidade where id_nacionalidade = :idNacionalidade";

    private static $INSERT = "INSERT INTO nacionalidade (nome_nacionalidade) VALUES (:nomeNacionalidade)";

    private static $UPDATE = "UPDATE nacionalidade SET nome_nacionalidade = :nomeNacionalidade WHERE id_nacionalidade = :idNacionalidade";
                                     
    private static $DELETE = "UPDATE nacionalidade SET cod_status_nacionalidade = '0' WHERE id_nacionalidade = :idNacionalidade";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idNacionalidade = "", $nomeNacionalidade = "")
    {
        parent::__construct($idNacionalidade, $nomeNacionalidade);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos

    public function listarNacionalidades()
    {
        //executar a consulta no banco
        $result = $this->sql->query(NacionalidadeDAO::$SELECT_ALL);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idNacionalidade' => $linha->id_nacionalidade,
                    'nomeNacionalidade' => $linha->nome_nacionalidade
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
        
    }

    public function listarNacionalidadeId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            NacionalidadeDAO::$SELECT_ID,
            array(
                'idNacionalidade' => array(0 => $this->getIdNacionalidade(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idNacionalidade' => $linha->id_nacionalidade,
                'nomeNacionalidade' => $linha->nome_nacionalidade
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function alterarNacionalidade()
    {
        $result = $this->sql->execute(
            NacionalidadeDAO::$UPDATE,
            array(
                ':idNacionalidade' => array(0 => $this->getIdNacionalidade(), 1 => \PDO::PARAM_INT),
                ':nomeNacionalidade' => array(0 => $this->getNomeNacionalidade(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function adicionarNacionalidade()
    {
        $result = $this->sql->execute(
            NacionalidadeDAO::$INSERT,
            array(
                ':nomeNacionalidade' => array(0 => $this->getNomeNacionalidade(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function excluirNacionalidade()
    {
        $result = $this->sql->execute(
            NacionalidadeDAO::$DELETE,
            array(
                ':idNacionalidade' => array(0 => $this->getIdNacionalidade(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
