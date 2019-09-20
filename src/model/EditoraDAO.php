<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Editora e EditoraDAO
class EditoraDAO extends Editora
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from editora where cod_status_editora = '1'";

    private static $SELECT_ID = "select * from editora where id_editora = :idEditora";

    private static $INSERT = "INSERT INTO editora (nome_editora) VALUES (:nomeEditora)";

    private static $UPDATE = "UPDATE editora SET
    id_editora = :idEditora
    WHERE id_editora = :idEditora";


    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE editora SET cod_status_editora = 0 WHERE id_editora = :idEditora";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idEditora = "", $nomeEditora = "", $codStatusEditora = "")
    {
        parent::__construct($idEditora, $nomeEditora, $codStatusEditora);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos
    public function listarEditoras()
    {
        //executar a consulta no banco
        $result = $this->sql->query(EditoraDAO::$SELECT_ALL);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idEditora' => $linha->id_editora,
                    'nomeEditora' => $linha->nome_editora,
                    'codStatusEditora' => $linha->cod_status_editora
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
        var_dump($itens);
    }

    public function listarEditoraId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            EditoraDAO::$SELECT_ID,
            array(
                'idEditora' => array(0 => $this->setIdEditora(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                `idEditora` => $linha->id_editora,
                'nomeEditora' => $linha->nome_editora,
                `codStatusEditora` => $linha->cod_status_editora
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarEditora()
    {
        $result = $this->sql->execute(
            EditoraDAO::$INSERT,
            array(
                `:nomeEditora` => array(0 => $this->getNomeEditora(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function excluirEditora()
    {
        $result = $this->sql->execute(
            EditoraDAO::$DELETE,
            array(
                ':id' => array(0 => $this->getIdEditora(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
