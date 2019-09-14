<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Editora e EditoraDAO
class EditoraDAO extends Editora
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from editora where cod_status_Editora = '1'";

    private static $SELECT_ID = "select * from Editora where id_usuario = :id";

    private static $INSERT = "INSERT INTO `Editora` (`id_usuario`,`sexo_Editora`,`compl_end_Editora`,`logradouro_Editora`,`url_foto_Editora`,`num_compl_Editora`,`cpf_Editora`,`cep_Editora`,`dt_nasc_Editora`,`cod_status_Editora`) VALUES (:id_usuario,:sexo_Editora,:compl_end_Editora,:logradouro_Editora,:url_foto_Editora,:num_compl_Editora,:cpf_Editora,:cep_Editora,:dt_nasc_Editora,:cod_status_Editora)";

    private static $UPDATE = "UPDATE `Editora` SET
    `id_usuario` = :id_usuario,
    `sexo_Editora` = :sexo_Editora,
    `compl_end_Editora` = :compl_end_Editora,
    `logradouro_Editora` = :logradouro_Editora,
    `url_foto_Editora` = :url_foto_Editora,
    `num_compl_Editora` = :num_compl_Editora,
    `cpf_Editora` = :cpf_Editora,
    `cep_Editora` = :cep_Editora,
    `dt_nasc_Editora` = :dt_nasc_Editora,
    `cod_status_Editora` = :cod_status_Editora
    WHERE `id_usuario` = :id_usuario";


    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE Editora SET cod_status_Editora = 0 WHERE id_usuario = :id_usuario";

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
                'id_usuario' => array(0 => $this->setIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                `id_usuario` => $linha->id_editora,
                `cod_status_Editora` => $linha->cod_status_editora
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
                `:sexo_Editora` => array(0 => $this->getSexoEditora(), 1 => \PDO::PARAM_STR),
                `:compl_end_Editora` => array(0 => $this->getComplEndEditora(), 1 => \PDO::PARAM_STR),
                `:logradouro_Editora` => array(0 => $this->getLogradouroEditora(), 1 => \PDO::PARAM_STR),
                `:url_foto_Editora` => array(0 => $this->getUrlFotoEditora(), 1 => \PDO::PARAM_STR),
                `:num_compl_Editora` => array(0 => $this->getNumComplEditora(), 1 => \PDO::PARAM_STR),
                `:cpf_Editora` => array(0 => $this->getCpfEditora(), 1 => \PDO::PARAM_STR),
                `:cep_Editora` => array(0 => $this->getCepEditora(), 1 => \PDO::PARAM_STR),
                `:dt_nasc_Editora` => array(0 => $this->getDtNascEditora(), 1 => \PDO::PARAM_STR),
                `:cod_status_Editora` => array(0 => $this->getCodStatusEditora(), 1 => \PDO::PARAM_STR),
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
