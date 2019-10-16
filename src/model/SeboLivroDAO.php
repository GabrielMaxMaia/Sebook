<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre sebo e seboDAO
class SeboLivroDAO extends SeboLivro
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from sebo_livro";

    private static $SELECT_ID = "SELECT * FROM sebo_livro WHERE id_usuario = :idUsuario";

    private static $SELECT_ID_ISBN = "SELECT * FROM sebo_livro WHERE id_usuario = :idUsuario and isbn_livro = :isbnLivro";

    private static $INSERT = "INSERT INTO sebo_livro (id_usuario, isbn_livro, qtd_estoque) VALUES (:idUsuario, :isbnLivro, :qtdEstoque)";

    private static $UPDATE = "UPDATE sebo_livro SET qtd_estoque =:qtdEstoque WHERE isbn_livro = :isbnLivro and id_usuario = :idUsuario";

    private static $DELETE = "DELETE FROM sebo_livro WHERE isbn_livro = :isbnLivro and id_usuario = :idUsuario";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idUsuario = "", $isbnLivro = "", $qtdEstoque = "")
    {
        parent::__construct($idUsuario, $isbnLivro, $qtdEstoque);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos
    public function listarSeboLivro()
    {
        //executar a consulta no banco
        $result = $this->sql->query(SeboLivroDAO::$SELECT_ALL);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idUsuario' => $linha->id_usuario,
                    'isbnLivro' => $linha->isbn_livro,
                    'qtdEstoque' => $linha->qtd_estoque
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarSeboLivroId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            SeboLivroDAO::$SELECT_ID,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() > 0) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idUsuario' => $linha->id_usuario,
                'isbnLivro' => $linha->isbn_livro,
                'qtdEstoque' => $linha->qtd_estoque
            );
            // var_dump($itens);
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function listarSeboLivroIdIsbn()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            SeboLivroDAO::$SELECT_ID_ISBN,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                'isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() > 0) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idUsuario' => $linha->id_usuario,
                'isbnLivro' => $linha->isbn_livro,
                'qtdEstoque' => $linha->qtd_estoque
            );
            // var_dump($itens);
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarSeboLivro()
    {
        $result = $this->sql->execute(
            SeboLivroDAO::$INSERT,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_STR),
                ':qtdEstoque' => array(0 => $this->getQtdEstoque(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function alterarSeboLivro()
    {
        $result = $this->sql->execute(
            SeboLivroDAO::$UPDATE,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_STR),
                ':qtdEstoque' => array(0 => $this->getQtdEstoque(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function excluirseboLivro()
    {
        $result = $this->sql->execute(
            SeboLivroDAO::$DELETE,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }
}
