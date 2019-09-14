<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Autor e AutorDAO
class AutorDAO extends Autor
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from autor where cod_status_autor = '1'";

    private static $SELECT_ID = "select * from Autor where id_usuario = :id";

    private static $INSERT = "INSERT INTO `Autor` (`id_usuario`,`sexo_Autor`,`compl_end_Autor`,`logradouro_Autor`,`url_foto_Autor`,`num_compl_Autor`,`cpf_Autor`,`cep_Autor`,`dt_nasc_Autor`,`cod_status_Autor`) VALUES (:id_usuario,:sexo_Autor,:compl_end_Autor,:logradouro_Autor,:url_foto_Autor,:num_compl_Autor,:cpf_Autor,:cep_Autor,:dt_nasc_Autor,:cod_status_Autor)";

    private static $UPDATE = "UPDATE `Autor` SET
    `id_usuario` = :id_usuario,
    `sexo_Autor` = :sexo_Autor,
    `compl_end_Autor` = :compl_end_Autor,
    `logradouro_Autor` = :logradouro_Autor,
    `url_foto_Autor` = :url_foto_Autor,
    `num_compl_Autor` = :num_compl_Autor,
    `cpf_Autor` = :cpf_Autor,
    `cep_Autor` = :cep_Autor,
    `dt_nasc_Autor` = :dt_nasc_Autor,
    `cod_status_Autor` = :cod_status_Autor
    WHERE `id_usuario` = :id_usuario";


    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE autor SET cod_status_autor = '0' WHERE id_usuario = :id_usuario";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "",$idAutor = "", $nomeAutor = "", $codStatusAutor = "", $idNacionalida = "")
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
                    'idNacionalida' => $linha->id_nacionalidade
                );
    
            }
        } else {
            $itens = null;
        }
        return $itens;
        var_dump($itens);
    }

    public function listarAutorId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            AutorDAO::$SELECT_ID,
            array(
                'id_usuario' => array(0 => $this->setIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                `id_usuario` => $linha->id_Autor,
                `cod_status_Autor` => $linha->cod_status_Autor
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarAutor()
    {
        $result = $this->sql->execute(
            AutorDAO::$INSERT,
            array(
                `:sexo_Autor` => array(0 => $this->getSexoAutor(), 1 => \PDO::PARAM_STR),
                `:compl_end_Autor` => array(0 => $this->getComplEndAutor(), 1 => \PDO::PARAM_STR),
                `:logradouro_Autor` => array(0 => $this->getLogradouroAutor(), 1 => \PDO::PARAM_STR),
                `:url_foto_Autor` => array(0 => $this->getUrlFotoAutor(), 1 => \PDO::PARAM_STR),
                `:num_compl_Autor` => array(0 => $this->getNumComplAutor(), 1 => \PDO::PARAM_STR),
                `:cpf_Autor` => array(0 => $this->getCpfAutor(), 1 => \PDO::PARAM_STR),
                `:cep_Autor` => array(0 => $this->getCepAutor(), 1 => \PDO::PARAM_STR),
                `:dt_nasc_Autor` => array(0 => $this->getDtNascAutor(), 1 => \PDO::PARAM_STR),
                `:cod_status_Autor` => array(0 => $this->getCodStatusAutor(), 1 => \PDO::PARAM_STR),
            )
        );
        return $result;
    }

    public function excluirAutor()
    {
        $result = $this->sql->execute(
            AutorDAO::$DELETE,
            array(
                ':id' => array(0 => $this->getIdAutor(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
