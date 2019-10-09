<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Autor e AutorDAO
class AutorDAO extends Autor
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from autor where cod_status_autor = '1'";

    private static $SELECT_ID = "select * from Autor where id_autor = :idAutor";

    private static $INSERT = "INSERT INTO autor (nome_autor, id_nacionalidade) VALUES (:nomeAutor, :idNacionalidade)";

    private static $UPDATE = "UPDATE autor SET
    nome_autor = :nomeAutor,
    id_nacionalidade = :idNacionalidade
    WHERE id_autor = :idAutor";


    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE autor SET cod_status_autor = '0' WHERE id_autor = :idAutor";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idAutor = "", $nomeAutor = "", $codStatusAutor = "", $idNacionalida = "")
    {
        parent::__construct($idAutor, $nomeAutor, $codStatusAutor, $idNacionalida);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos
    public function listarAutores()
    {
        //executar a consulta no banco
        $result = $this->sql->query(AutorDAO::$SELECT_ALL);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idAutor' => $linha->id_autor,
                    'nomeAutor' => $linha->nome_autor,
                    'codStatusAutor' => $linha->cod_status_autor,
                    'idNacionalidade' => $linha->id_nacionalidade
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarAutorId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            AutorDAO::$SELECT_ID,
            array(
                'idAutor' => array(
                    0 => $this->getIdAutor(),
                    1 => \PDO::PARAM_INT
                )
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);

            $itens = array(
                'idAutor' => $linha->id_autor,
                'nomeAutor' => $linha->nome_autor,
                'codStatusAutor' => $linha->cod_status_autor,
                'idNacionalidade' => $linha->id_nacionalidade
            );
        } else {
            $itens = null;
        }
        //devolver o resultado  

        return $itens;
    }

    public function alterarAutor()
    {
        $result = $this->sql->execute(
            AutorDAO::$UPDATE,
            array(
                ':idAutor' => array(0 => $this->getIdAutor(), 1 => \PDO::PARAM_STR),
                ':nomeAutor' => array(0 => $this->getNomeAutor(), 1 => \PDO::PARAM_STR),
                ':idNacionalidade' => array(0 => $this->getIdNacionalidade(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }

    public function adicionarAutor()
    {
        $result = $this->sql->execute(
            AutorDAO::$INSERT,
            array(
                ':nomeAutor' => array(0 => $this->getNomeAutor(), 1 => \PDO::PARAM_STR),

                ':idNacionalidade' => array(0 => $this->getIdNacionalidade(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }

    public function excluirAutor()
    {
        $result = $this->sql->execute(
            AutorDAO::$DELETE,
            array(
                ':idAutor' => array(0 => $this->getIdAutor(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
