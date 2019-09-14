<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Categoria e CategoriaDAO
class CategoriaDAO extends Categoria
{
    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from categoria where cod_status_categoria = '1'";
    private static $SELECT_ID = "select * from categoria where id_categoria = :idCategoria";
    private static $INSERT = "INSERT INTO categoria
                                (nome_categoria)
                                VALUES (:nomeCategoria)";

    private static $UPDATE = "UPDATE categoria SET
                                 nome_categoria = :nomeCategoria, 
                              WHERE id_categoria =  :idCategoria";

    //DELETE lógico -> altera status
    private static $DELETE = "UPDATE categoria SET
                                    cod_status_categoria = '0'
                                WHERE id_categoria = :idCategoria ";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idCategoria = "", $nomeCategoria = "", $codStatusCategoria = "")
    {
        parent::__construct($idCategoria, $nomeCategoria, $codStatusCategoria);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos

    public function listarCategorias()
    {
        //executar a consulta no banco
        $result = $this->sql->query(CategoriaDAO::$SELECT_ALL);
        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idCategoria' => $linha->id_categoria,
                    'nomeCategoria' => $linha->nome_categoria,
                    'codStatusCategoria' => $linha->cod_status_categoria
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarCategoriaId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            CategoriaDAO::$SELECT_ID,
            array(
                ':idCategoria' => array(0 => $this->getIdCategoria(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idCategoria' => $linha->id_categoria,
                'nomeCategoria' => $linha->nome_categoria,
                'codStatusCategoria' => $linha->cod_status_categoria
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarCategoria()
    {
        $result = $this->sql->execute(
            CategoriaDAO::$INSERT,
            array(
                ':nomeCategoria' => array(0 => $this->getNomeCategoria(), 1 => \PDO::PARAM_STR),
            )
        );
        return $result;
    }

    public function alterarCategoria()
    {
        $result = $this->sql->execute(
            CategoriaDAO::$UPDATE,
            array(
                ':nomeCategoria' => array(0 => $this->getNomeCategoria(), 1 => \PDO::PARAM_STR),
                ':idCategoria' => array(0 => $this->getIdCategoria(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }

    public function excluirCategoria()
    {
        $result = $this->sql->execute(
            CategoriaDAO::$DELETE,
            array(
                'idCategoria' => array(0 => $this->getIdCategoria(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
