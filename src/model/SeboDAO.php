<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre sebo e seboDAO
class SeboDAO extends Sebo
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from sebo where cod_status_sebo = '1'";

    private static $SELECT_ID = "select * from sebo where id_usuario = :id";

    private static $INSERT = "INSERT INTO `sebo` (`id_usuario`,`sexo_sebo`,`compl_end_sebo`,`logradouro_sebo`,`url_foto_sebo`,`num_compl_sebo`,`cpf_sebo`,`cep_sebo`,`dt_nasc_sebo`,`cod_status_sebo`) VALUES (:id_usuario,:sexo_sebo,:compl_end_sebo,:logradouro_sebo,:url_foto_sebo,:num_compl_sebo,:cpf_sebo,:cep_sebo,:dt_nasc_sebo,:cod_status_sebo)";

    private static $UPDATE = "UPDATE `sebo` SET
    `id_usuario` = :id_usuario,
    `sexo_sebo` = :sexo_sebo,
    `compl_end_sebo` = :compl_end_sebo,
    `logradouro_sebo` = :logradouro_sebo,
    `url_foto_sebo` = :url_foto_sebo,
    `num_compl_sebo` = :num_compl_sebo,
    `cpf_sebo` = :cpf_sebo,
    `cep_sebo` = :cep_sebo,
    `dt_nasc_sebo` = :dt_nasc_sebo,
    `cod_status_sebo` = :cod_status_sebo
    WHERE `id_usuario` = :id_usuario";


    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE sebo SET cod_status_sebo = 0 WHERE id_usuario = :id_usuario";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idUsuario = "", $razaoSebo = "", $nomeFantasia = "", $cnpjSebo = "", $urlFotoSebo = "", $numEndSebo = "", $complEndSebo = "", $logradouroSebo = "", $cepEndSebo = "", $numTelSebo = "", $celular1Sebo = "", $celular2Sebo = "", $inscEstadualSebo = "", $urlSiteSebo = "", $codStatusSebo = "", $idLivro = "")
    {
        parent::__construct($idUsuario, $razaoSebo, $nomeFantasia, $cnpjSebo, $urlFotoSebo, $numEndSebo, $complEndSebo, $logradouroSebo, $cepEndSebo, $numTelSebo, $celular1Sebo, $celular2Sebo, $inscEstadualSebo, $urlSiteSebo, $codStatusSebo, $idLivro);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos
    public function listarSebos()
    {
        //executar a consulta no banco
        $result = $this->sql->query(seboDAO::$SELECT_ALL);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idUsuario' => $linha->id_usuario,
                    'razaoSebo' => $linha->razao_sebo,
                    'nomeFantasia' => $linha->nome_fantasia,
                    'cnpjSebo' => $linha->cnpj_sebo,
                    'urlFotoSebo' => $linha->url_foto_sebo,
                    'numEndSebo' => $linha->num_end_sebo,
                    'complEndSebo' => $linha->compl_end_sebo,
                    'logradouroSebo' => $linha->logradouro_sebo,
                    'cepEndSebo' => $linha->cep_end_sebo,
                    'numTelSebo' => $linha->num_tel_sebo,
                    'celular1Sebo' => $linha->celular_1_sebo,
                    'celular2Sebo' => $linha->celular_2_sebo,
                    'inscEstadualSebo' => $linha->insc_estadual_sebo,
                    'urlSiteSebo' => $linha->url_site_sebo,
                    'codStatusSebo' => $linha->cod_status_sebo,
                    'idLivro' => $linha->id_livro
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
        var_dump($itens);
    }

    public function listarseboId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            SeboDAO::$SELECT_ID,
            array(
                'id_usuario' => array(0 => $this->setIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                `id_usuario` => $linha->idUsuario,
                `cod_status_sebo` => $linha->codStatussebo
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarsebo()
    {
        $result = $this->sql->execute(
            SeboDAO::$INSERT,
            array(
                `:sexo_sebo` => array(0 => $this->getSexosebo(), 1 => \PDO::PARAM_STR),
                `:compl_end_sebo` => array(0 => $this->getComplEndsebo(), 1 => \PDO::PARAM_STR),
                `:logradouro_sebo` => array(0 => $this->getLogradourosebo(), 1 => \PDO::PARAM_STR),
                `:url_foto_sebo` => array(0 => $this->getUrlFotosebo(), 1 => \PDO::PARAM_STR),
                `:num_compl_sebo` => array(0 => $this->getNumComplsebo(), 1 => \PDO::PARAM_STR),
                `:cpf_sebo` => array(0 => $this->getCpfsebo(), 1 => \PDO::PARAM_STR),
                `:cep_sebo` => array(0 => $this->getCepsebo(), 1 => \PDO::PARAM_STR),
                `:dt_nasc_sebo` => array(0 => $this->getDtNascsebo(), 1 => \PDO::PARAM_STR),
                `:cod_status_sebo` => array(0 => $this->getCodStatussebo(), 1 => \PDO::PARAM_STR),
            )
        );
        return $result;
    }

    public function excluirsebo()
    {
        $result = $this->sql->execute(
            seboDAO::$DELETE,
            array(
                ':id' => array(0 => $this->getIdsebo(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
