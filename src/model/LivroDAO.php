<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Livro e LivroDAO
class LivroDAO extends Livro
{
    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_LAST_ID = "SELECT last_insert_id() as last_id FROM db_sebook.livro limit 0,1";

    private static $SELECT_ALL = "select * from livro where cod_status_livro = '1' order by id_editora";

    private static $SELECT_ALL_LIVRO = "SELECT * FROM livro where nome_livro like %:parametro% ORDER BY nome_livro ASC";

    private static $INSERT = "INSERT INTO livro (isbn_livro, id_categoria, ano_livro, nome_livro, sinopse_livro, id_editora, url_foto_livro) VALUES (:isbnLivro, :idCategoria, :anoLivro, :nomeLivro, :sinopseLivro, :idEditora, :urlFotoLivro)";

    private static $SELECT_ID = "SELECT * FROM livro WHERE isbn_livro = :isbnLivro";
    
    private static $SELECT_LIVRO_SEBO = "SELECT * FROM livro WHERE isbn_livro = :isbnLivro";

    private static $UPDATE = "UPDATE livro SET ano_livro = :anoLivro, url_foto_livro = :urlFotoLivro, nome_livro = :nomeLivro, sinopse_livro = :sinopseLivro, id_editora = :idEditora, id_categoria = :idCategoria WHERE isbn_livro = :isbnLivro";

    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE livro SET cod_status_livro = '0' WHERE isbn_livro = :isbnLivro";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $isbnLivro = "", $anoLivro = "", $urlFotoLivro = "", $nomeLivro = "", $idEditora = "", $codStatusLivro = "", $sinopseLivro = "", $idCategoria = "")
    {
        parent::__construct($isbnLivro, $anoLivro, $urlFotoLivro, $nomeLivro, $idEditora, $codStatusLivro, $sinopseLivro, $idCategoria);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos
    public function listarLivroSebo()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            LivroDAO::$SELECT_LIVRO_SEBO,
            array(
                ':isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() > 0) {
            while($linha = $result->fetch(\PDO::FETCH_OBJ)){
            $itens[] = array(
                'isbnLivro' => $linha->isbn_livro,
                'anoLivro' => $linha->ano_livro,
                'urlFotoLivro' => $linha->url_foto_livro,
                'nomeLivro' => $linha->nome_livro,
                'sinopseLivro' => $linha->sinopse_livro,
                'codStatusLivro' => $linha->cod_status_livro,
                'idEditora' => $linha->id_editora,
                'idCategoria' => $linha->id_categoria
            );
        }

            // var_dump($itens);
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }
    
    public function buscaLivro()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            LivroDAO::$SELECT_ALL_LIVRO,
            array(
                ':parametro' => array(0 => $this->getNomeLivro(), 1 => \PDO::PARAM_STR)
            )
        );
        if ($result->rowCount() > 0) {
            while($linha = $result->fetch(\PDO::FETCH_OBJ)){
            $itens[] = array(
                'isbnLivro' => $linha->isbn_livro,
                'anoLivro' => $linha->ano_livro,
                'urlFotoLivro' => $linha->url_foto_livro,
                'nomeLivro' => $linha->nome_livro,
                'sinopseLivro' => $linha->sinopse_livro,
                'codStatusLivro' => $linha->cod_status_livro,
                'idEditora' => $linha->id_editora,
                'idCategoria' => $linha->id_categoria
            );
        }
        // var_dump($itens);
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

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
                    'urlFotoLivro' => $linha->url_foto_livro,
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
                'anoLivro' => $linha->ano_livro,
                'urlFotoLivro' => $linha->url_foto_livro,
                'nomeLivro' => $linha->nome_livro,
                'sinopseLivro' => $linha->sinopse_livro,
                'codStatusLivro' => $linha->cod_status_livro,
                'idEditora' => $linha->id_editora,
                'idCategoria' => $linha->id_categoria
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
                'isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_STR),
                'anoLivro' => array(0 => $this->getAnoLivro(), 1 => \PDO::PARAM_INT),
                'urlFotoLivro' => array(0 => $this->getUrlFotoLivro(), 1 => \PDO::PARAM_STR),
                ':nomeLivro' => array(0 => $this->getNomeLivro(), 1 => \PDO::PARAM_STR),
                ':sinopseLivro' => array(0 => $this->getSinopseLivro(), 1 => \PDO::PARAM_STR),
                ':idEditora' => array(0 => $this->getIdEditora(), 1 => \PDO::PARAM_INT),
                ':idCategoria' => array(0 => $this->getIdCategoria(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }

    public function adicionarLivro()
    {
        $result = $this->sql->execute(
            LivroDAO::$INSERT,
            array(
                'isbnLivro' => array(0 => $this->getIsbnLivro(), 1 => \PDO::PARAM_STR),
                'anoLivro' => array(0 => $this->getAnoLivro(), 1 => \PDO::PARAM_INT),
                'urlFotoLivro' => array(0 => $this->getUrlFotoLivro(), 1 => \PDO::PARAM_STR),
                ':nomeLivro' => array(0 => $this->getNomeLivro(), 1 => \PDO::PARAM_STR),
                ':sinopseLivro' => array(0 => $this->getSinopseLivro(), 1 => \PDO::PARAM_STR),
                ':idEditora' => array(0 => $this->getIdEditora(), 1 => \PDO::PARAM_INT),
                ':idCategoria' => array(0 => $this->getIdCategoria(), 1 => \PDO::PARAM_INT)
            )
        );
        //Executar last id 
        //Usar a livroAutorDAO para inserir um registro só com id do autor e isbn
        $result_last_id = $this->sql->query(LivroDAO::$SELECT_LAST_ID);
        $livro = $result_last_id->fetch(\PDO::FETCH_OBJ);
        $livroAutorDAO = new LivroAutorDAO($this->sql, $livro->last_id, $this->getIsbnLivro());

        $livroAutorDAO->adicionarLivroAutor();

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
