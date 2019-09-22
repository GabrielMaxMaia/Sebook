<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Livro e LivroDAO
class LivroDAO extends Livro
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from livro where cod_status_livro = '1' order by id_editora";

    private static $INSERT = "INSERT INTO livro
    (isbn_livro, nome_livro, sinopse_livro)
    VALUES (:isbnLivro, :nomeLivro, :sinopseLivro)";

    private static $SELECT_ID = "select * from livro where isbn_livro = :isbnLivro";

    private static $UPDATE = "UPDATE livro SET
    nome_livro = :nomeLivro, sinopse_livro = :sinopseLivro WHERE isbn_livro =  :isbnLivro";

    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE livro SET cod_status_livro = '0' WHERE isbn_livro = :isbnLivro";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $isbnLivro = "", $anoLivro = "", $nomeLivro = "", $idEditora = "", $codStatusLivro = "", $sinopseLivro = "", $idCategoria = "")
    {
        parent::__construct($isbnLivro, $anoLivro, $nomeLivro, $idEditora, $codStatusLivro, $sinopseLivro, $idCategoria);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos
    public function listarLivros()
    {
        //executar a consulta no banco
        $result = $this->sql->query(LivroDAO::$SELECT_ALL);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'isbnLivro' => $linha->isbn_livro,
                    'anoLivro' => $linha->ano_livro,
                    'nomeLivro' => $linha->nome_livro,
                    'sinopseLivro' => $linha->sinopse_livro,
                    'codStatusLivro' => $linha->cod_status_livro,
                    'idEditora' => $linha->id_editora,
                    'idCategoria' => $linha->id_categoria
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarLivroIsbn()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            LivroDAO::$SELECT_ID,
            array(
                'isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_STR)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'isbnLivro' => $linha->isbn_livro,
                'nomeLivro' => $linha->nome_livro,
                'sinopseLivro' => $linha->sinopse_livro
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function alterarLivro()
    {
        $result = $this->sql->execute(
            LivroDAO::$UPDATE,
            array(
                ':nomeLivro' => array(0 => $this->getNomeLivro(), 1 => \PDO::PARAM_STR),
                ':sinopseLivro' => array(0 => $this->getDescrCategoria(), 1 => \PDO::PARAM_STR),
                ':isbnLivro' => array(0 => $this->getIdCategoria(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function adicionarLivro()
    {
        $result = $this->sql->execute(
            LivroDAO::$INSERT,
            array(
                ':isbnLivro' => array(0 => $this->getisbnLivro(), 1 => \PDO::PARAM_STR),
                ':nomeLivro' => array(0 => $this->getNomeLivro(), 1 => \PDO::PARAM_STR),
                ':sinopseLivro' => array(0 => $this->getSinopseLivro(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function excluirLivro()
    {
        $result = $this->sql->execute(
            LivroDAO::$DELETE,
            array(
                ':isbnLivro' => array(0 => $this->getisbnLivro(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
