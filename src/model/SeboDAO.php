<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre sebo e seboDAO
class SeboDAO extends Sebo
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "SELECT * FROM sebo 
                                  INNER JOIN usuario ON sebo.id_usuario = usuario.id_usuario 
                                  WHERE cod_status_sebo = '1'";

    private static $SELECT_TOT = "SELECT count(id_usuario) as tot from sebo 
                                  where cod_status_sebo = '1'";

    private static $SELECT_ID = "SELECT * FROM sebo 
                                 INNER JOIN usuario ON (sebo.id_usuario = usuario.id_usuario) 
                                 AND sebo.id_usuario = :idUsuario";

    // private static $SELECT_NOME_SEBO = "SELECT * FROM sebo WHERE nome_fantasia like :nomeFantasia ORDER BY nome_fantasia ASC";
    
    private static $SELECT_NOME_SEBO = "SELECT * FROM sebo 
                                        INNER JOIN usuario ON (sebo.id_usuario = usuario.id_usuario) 
                                        WHERE nome_fantasia like :nomeFantasia 
                                        AND cidade_sebo like :cidadeSebo ORDER BY nome_fantasia ASC";

    private static $SELECT_CIDADE_SEBO = "SELECT * FROM sebo 
                                          INNER JOIN usuario ON sebo.id_usuario = usuario.id_usuario 
                                          AND cidade_sebo like :cidadeSebo ORDER BY sebo.id_usuario ASC";

    private static $INSERT = "INSERT INTO sebo (id_usuario, razao_sebo, nome_fantasia, 
                                                cnpj_sebo, latitude_sebo, longitude_sebo, 
                                                cidade_sebo, num_end_sebo, compl_end_sebo, 
                                                logradouro_sebo, cep_end_sebo, num_tel_sebo, 
                                                celular_1_sebo, celular_2_sebo, insc_estadual_sebo, 
                                                url_site_sebo) 
                              VALUES (:idUsuario, :razaoSebo, :nomeFantasia, 
                                      :cnpjSebo, :cidadeSebo, :numEndSebo, 
                                      :complEndSebo, :logradouroSebo, :cepEndSebo, 
                                      :numTelSebo, :celular1Sebo, :celular2Sebo, 
                                      :inscEstadualSebo, :urlSiteSebo)";

    private static $UPDATE = "UPDATE sebo 
                              SET razao_sebo = :razaoSebo, nome_fantasia =:nomeFantasia, 
                                  cnpj_sebo =:cnpjSebo, latitude_sebo = :latitudeSebo, 
                                  longitude_sebo = :longitudeSebo, cidade_sebo = :cidadeSebo, 
                                  num_end_sebo =:numEndSebo, compl_end_sebo =:complEndSebo, 
                                  logradouro_sebo =:logradouroSebo, cep_end_sebo =:cepEndSebo, 
                                  num_tel_sebo =:numTelSebo, celular_1_sebo =:celular1Sebo, 
                                  celular_2_sebo =:celular2Sebo, insc_estadual_sebo =:inscEstadualSebo, 
                                  url_site_sebo =:urlSiteSebo 
                              WHERE id_usuario = :idUsuario";


    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE sebo 
                              SET cod_status_sebo = '0' 
                              WHERE id_usuario = :idUsuario";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idUsuario = "", $razaoSebo = "",
                     $nomeFantasia = "", $cnpjSebo = "", $cidadeSebo = "",
                     $latitudeSebo = "", $longitudeSebo = "", $numEndSebo = "",
                     $complEndSebo = "", $logradouroSebo = "", $cepEndSebo = "",
                     $numTelSebo = "", $celular1Sebo = "", $celular2Sebo = "",
                     $inscEstadualSebo = "", $urlSiteSebo = "", $codStatusSebo = "")
    {
        parent::__construct($idUsuario, $razaoSebo, $nomeFantasia,
                $cnpjSebo, $latitudeSebo, $longitudeSebo,
                $cidadeSebo, $numEndSebo, $complEndSebo,
                $logradouroSebo, $cepEndSebo, $numTelSebo,
                $celular1Sebo, $celular2Sebo, $inscEstadualSebo,
                $urlSiteSebo, $codStatusSebo);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos
    // public function listarSebosCidade($ini = -1, $qtde = 1)
    // public function listarNomeSebos()
    // {
    //     // if ($ini >= 0) {
    //     //     $limit = " limit $ini , $qtde ";
    //     // } else {
    //     //     $limit = "";
    //     // }

    //     //executar a consulta no banco
    //     // $result = $this->sql->query(
    //     //     seboDAO::$SELECT_CIDADE_SEBO . $limit,
    //     //     array(
    //     //         ':cidadeSebo' => array(0 => "%" . $this->getCidadeSebo() . "%", 1 => \PDO::PARAM_STR)
    //     //     )
    //     // );
    //     $result = $this->sql->query(
    //         seboDAO::$SELECT_NOME_SEBO
    //         ,array(
    //             ':nomeFantasia' => array(0 => "%" . $this->getNomeFantasia(), 1 => \PDO::PARAM_STR)
    //         )
    //     );
    //     //devolver o resultado

    //     if ($result->rowCount() > 0) {
    //         while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
    //             $itens[] = array(
    //                 'idUsuario' => $linha->id_usuario,
    //                 'razaoSebo' => $linha->razao_sebo,
    //                 'nomeFantasia' => $linha->nome_fantasia,
    //                 'cnpjSebo' => $linha->cnpj_sebo,
    //                 'urlFotoSebo' => $linha->
    //                 'cidadeSebo' => $linha->cidade_sebo,
    //                 'numEndSebo' => $linha->num_end_sebo,
    //                 'complEndSebo' => $linha->compl_end_sebo,
    //                 'logradouroSebo' => $linha->logradouro_sebo,
    //                 'cepEndSebo' => $linha->cep_end_sebo,
    //                 'numTelSebo' => $linha->num_tel_sebo,
    //                 'celular1Sebo' => $linha->celular_1_sebo,
    //                 'celular2Sebo' => $linha->celular_2_sebo,
    //                 'inscEstadualSebo' => $linha->insc_estadual_sebo,
    //                 'urlSiteSebo' => $linha->url_site_sebo,
    //                 'codStatusSebo' => $linha->cod_status_sebo
    //             );
    //         }
    //     } else {
    //         $itens = null;
    //     }
    //     return $itens;
    // }
    
    public function listarSebosCidade()
    {
        // if ($ini >= 0) {
        //     $limit = " limit $ini , $qtde ";
        // } else {
        //     $limit = "";
        // }

        //executar a consulta no banco
        // $result = $this->sql->query(
        //     seboDAO::$SELECT_CIDADE_SEBO . $limit,
        //     array(
        //         ':cidadeSebo' => array(0 => "%" . $this->getCidadeSebo() . "%", 1 => \PDO::PARAM_STR)
        //     )
        // );
        $result = $this->sql->query(
            seboDAO::$SELECT_NOME_SEBO
            ,array(
                ':nomeFantasia' => array(0 => "%".$this->getNomeFantasia() . "%", 1 => \PDO::PARAM_STR),
                ':cidadeSebo' => array(0 => $this->getCidadeSebo() . "%", 1 => \PDO::PARAM_STR)
            )
        );
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idUsuario' => $linha->id_usuario,
                    'razaoSebo' => $linha->razao_sebo,
                    'nomeFantasia' => $linha->nome_fantasia,
                    'cnpjSebo' => $linha->cnpj_sebo,
                    'latitudeSebo' => $linha->latitude_sebo,
                    'longitudeSebo' => $linha->longitude_sebo,
                    'cidadeSebo' => $linha->cidade_sebo,
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
                    'urlFoto' => $linha->url_foto
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }
    public function listarCidade()
    {
        // if ($ini >= 0) {
        //     $limit = " limit $ini , $qtde ";
        // } else {
        //     $limit = "";
        // }

        //executar a consulta no banco
        // $result = $this->sql->query(
        //     seboDAO::$SELECT_CIDADE_SEBO . $limit,
        //     array(
        //         ':cidadeSebo' => array(0 => "%" . $this->getCidadeSebo() . "%", 1 => \PDO::PARAM_STR)
        //     )
        // );
        $result = $this->sql->query(
            seboDAO::$SELECT_CIDADE_SEBO
            ,array(
                ':cidadeSebo' => array(0 => $this->getCidadeSebo() . "%", 1 => \PDO::PARAM_STR)
            )
        );
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idUsuario' => $linha->id_usuario,
                    'razaoSebo' => $linha->razao_sebo,
                    'nomeFantasia' => $linha->nome_fantasia,
                    'cnpjSebo' => $linha->cnpj_sebo,
                    'latitudeSebo' => $linha->latitude_sebo,
                    'longitudeSebo' => $linha->longitude_sebo,
                    'cidadeSebo' => $linha->cidade_sebo,
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
                    'urlFoto' => $linha->url_foto
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarSebos($ini = -1, $qtde = 1)
    {
        if ($ini >= 0) {
            $limit = " limit $ini , $qtde ";
        } else {
            $limit = "";
        }

        //executar a consulta no banco
        $result = $this->sql->query(seboDAO::$SELECT_ALL . $limit);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idUsuario' => $linha->id_usuario,
                    'razaoSebo' => $linha->razao_sebo,
                    'nomeFantasia' => $linha->nome_fantasia,
                    'cnpjSebo' => $linha->cnpj_sebo,
                    'latitudeSebo' => $linha->latitude_sebo,
                    'longitudeSebo' => $linha->longitude_sebo,
                    'cidadeSebo' => $linha->cidade_sebo,
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
                    'urlFoto' => $linha->url_foto
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function totalContar()
    {
        $result = $this->sql->query(SeboDAO::$SELECT_TOT);
        $linha = $result->fetch(\PDO::FETCH_OBJ);
        return $linha->tot;
    }

    public function listarSeboId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            SeboDAO::$SELECT_ID,
            array(
                'idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );

        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idUsuario' => $linha->id_usuario,
                'razaoSebo' => $linha->razao_sebo,
                'nomeFantasia' => $linha->nome_fantasia,
                'cnpjSebo' => $linha->cnpj_sebo,
                'latitudeSebo' => $linha->latitude_sebo,
                'longitudeSebo' => $linha->longitude_sebo,
                'cidadeSebo' => $linha->cidade_sebo,
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
                'urlFoto' => $linha->url_foto
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarSebo()
    {
        $result = $this->sql->execute(
            SeboDAO::$INSERT,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':razaoSebo' => array(0 => $this->getRazaoSebo(), 1 => \PDO::PARAM_STR),
                ':nomeFantasia' => array(0 => $this->getNomeFantasia(), 1 => \PDO::PARAM_STR),
                ':cnpjSebo' => array(0 => $this->getCnpjSebo(), 1 => \PDO::PARAM_STR),
                ':latitudeSebo' => array(0 => $this->getLatitudeSebo(), 1 => \PDO::PARAM_STR),
                ':longitudeSebo' => array(0 => $this->getLongitudeSebo(), 1 => \PDO::PARAM_STR),
                ':cidadeSebo' => array(0 => $this->getCidadeSebo(), 1 => \PDO::PARAM_STR),
                ':numEndSebo' => array(0 => $this->getNumEndSebo(), 1 => \PDO::PARAM_STR),
                ':complEndSebo' => array(0 => $this->getComplEndSebo(), 1 => \PDO::PARAM_STR),
                ':logradouroSebo' => array(0 => $this->getLogradouroSebo(), 1 => \PDO::PARAM_STR),
                ':cepEndSebo' => array(0 => $this->getCepEndSebo(), 1 => \PDO::PARAM_STR),
                ':numTelSebo' => array(0 => $this->getNumTelSebo(), 1 => \PDO::PARAM_STR),
                ':celular1Sebo' => array(0 => $this->getCelular1Sebo(), 1 => \PDO::PARAM_STR),
                ':celular2Sebo' => array(0 => $this->getCelular2Sebo(), 1 => \PDO::PARAM_STR),
                ':inscEstadualSebo' => array(0 => $this->getInscEstadualSebo(), 1 => \PDO::PARAM_STR),
                ':urlSiteSebo' => array(0 => $this->getUrlSiteSebo(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function alterarSebo()
    {
        $result = $this->sql->execute(
            SeboDAO::$UPDATE,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':razaoSebo' => array(0 => $this->getRazaoSebo(), 1 => \PDO::PARAM_STR),
                ':nomeFantasia' => array(0 => $this->getNomeFantasia(), 1 => \PDO::PARAM_STR),
                ':cnpjSebo' => array(0 => $this->getCnpjSebo(), 1 => \PDO::PARAM_STR),
                ':latitudeSebo' => array(0 => $this->getLatitudeSebo(), 1 => \PDO::PARAM_STR),
                ':longitudeSebo' => array(0 => $this->getLongitudeSebo(), 1 => \PDO::PARAM_STR),
                ':cidadeSebo' => array(0 => $this->getCidadeSebo(), 1 => \PDO::PARAM_STR),
                ':numEndSebo' => array(0 => $this->getNumEndSebo(), 1 => \PDO::PARAM_STR),
                ':complEndSebo' => array(0 => $this->getComplEndSebo(), 1 => \PDO::PARAM_STR),
                ':logradouroSebo' => array(0 => $this->getLogradouroSebo(), 1 => \PDO::PARAM_STR),
                ':cepEndSebo' => array(0 => $this->getCepEndSebo(), 1 => \PDO::PARAM_STR),
                ':numTelSebo' => array(0 => $this->getNumTelSebo(), 1 => \PDO::PARAM_STR),
                ':celular1Sebo' => array(0 => $this->getCelular1Sebo(), 1 => \PDO::PARAM_STR),
                ':celular2Sebo' => array(0 => $this->getCelular2Sebo(), 1 => \PDO::PARAM_STR),
                ':inscEstadualSebo' => array(0 => $this->getInscEstadualSebo(), 1 => \PDO::PARAM_STR),
                ':urlSiteSebo' => array(0 => $this->getUrlSiteSebo(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function excluirsebo()
    {
        $result = $this->sql->execute(
            seboDAO::$DELETE,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
