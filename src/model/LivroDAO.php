<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Livro e LivroDAO
class LivroDAO extends Livro
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from livro where cod_status_livro = '1'";


    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE livro SET cod_status_livro = '0' WHERE isbn_livro = :isbn_livro";

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
        var_dump($itens);
    }

    public function listarLivroId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            LivroDAO::$SELECT_ID,
            array(
                'id_usuario' => array(0 => $this->setIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                `id_usuario` => $linha->idUsuario,
                `cod_status_Livro` => $linha->codStatusLivro
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarLivro()
    {
        $result = $this->sql->execute(
            LivroDAO::$INSERT,
            array(
                `:sexo_Livro` => array(0 => $this->getSexoLivro(), 1 => \PDO::PARAM_STR),
                `:compl_end_Livro` => array(0 => $this->getComplEndLivro(), 1 => \PDO::PARAM_STR),
                `:logradouro_Livro` => array(0 => $this->getLogradouroLivro(), 1 => \PDO::PARAM_STR),
                `:url_foto_Livro` => array(0 => $this->getUrlFotoLivro(), 1 => \PDO::PARAM_STR),
                `:num_compl_Livro` => array(0 => $this->getNumComplLivro(), 1 => \PDO::PARAM_STR),
                `:cpf_Livro` => array(0 => $this->getCpfLivro(), 1 => \PDO::PARAM_STR),
                `:cep_Livro` => array(0 => $this->getCepLivro(), 1 => \PDO::PARAM_STR),
                `:dt_nasc_Livro` => array(0 => $this->getDtNascLivro(), 1 => \PDO::PARAM_STR),
                `:cod_status_Livro` => array(0 => $this->getCodStatusLivro(), 1 => \PDO::PARAM_STR),
            )
        );
        return $result;
    }

    public function excluirLivro()
    {
        $result = $this->sql->execute(
            LivroDAO::$DELETE,
            array(
                ':id' => array(0 => $this->getisbnLivro(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
