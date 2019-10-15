<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre sebo e seboDAO
class LivroAutorDAO extends LivroAutor
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from livro_autor";

    private static $SELECT_ID = "select * from livro_autor where id_autor = :idAutor";

    private static $INSERT = "INSERT INTO livro_autor (id_autor, isbn_livro) VALUES (:idAutor, :isbnLivro)";

    // private static $UPDATE = "UPDATE livro_autor SET qtd_estoque =:qtdEstoque WHERE isbn_livro = :isbnLivro and id_autor = :idAutor";

    private static $DELETE = "DELETE FROM livro_autor WHERE id_autor = :idAutor and isbn_livro = :isbnLivro";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idAutor = "", $isbnLivro = "")
    {
        parent::__construct($idAutor, $isbnLivro);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos
    public function listarLivroAutor()
    {
        //executar a consulta no banco
        $result = $this->sql->query(LivroAutorDAO::$SELECT_ALL);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idAutor' => $linha->id_autor,
                    'isbnLivro' => $linha->isbn_livro
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarLivroAutorId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            LivroAutorDAO::$SELECT_ID,
            array(
                'idAutor' => array(0 => $this->getIdAutor(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idAutor' => $linha->id_autor,
                'isbnLivro' => $linha->isbn_livro
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarLivroAutor()
    {
        $result = $this->sql->execute(
            LivroAutorDAO::$INSERT,
            array(
                ':idAutor' => array(0 => $this->getIdAutor(), 1 => \PDO::PARAM_INT),
                ':isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    // public function alterarLivroAutor()
    // {
    //     $result = $this->sql->execute(
    //         LivroAutorDAO::$UPDATE,
    //         array(
    //             ':idAutor' => array(0 => $this->getIdAutor(), 1 => \PDO::PARAM_INT),
    //             ':isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_STR)
    //         )
    //     );
    //     return $result;
    // }

    public function excluirseboLivro()
    {
        $result = $this->sql->execute(
            LivroAutorDAO::$DELETE,
            array(
                ':idAutor' => array(0 => $this->getIdAutor(), 1 => \PDO::PARAM_INT),
                ':isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_STR),
            )
        );
        return $result;
    }
}
