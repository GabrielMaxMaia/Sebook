<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Perfil e PerfilDAO
class PerfilDAO extends Perfil
{

    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from perfil where cod_status_perfil = '1'";

    private static $SELECT_ID = "select * from perfil where id_perfil = :idPerfil";

    private static $INSERT = "INSERT INTO perfil (nome_perfil) VALUES (:nomePerfil)";

    private static $UPDATE = "UPDATE perfil SET
    nome_perfil = :nomePerfil
    WHERE id_perfil = :idPerfil";


    //DELETE lógico -> altera status    
    private static $DELETE = "UPDATE perfil SET cod_status_perfil = '0' WHERE id_perfil = :idPerfil";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idPerfil = "", $nomePerfil = "", $codStatusPerfil = "", $idNacionalida = "")
    {
        parent::__construct($idPerfil, $nomePerfil, $codStatusPerfil, $idNacionalida);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos
    public function listarPerfiles()
    {
        //executar a consulta no banco
        $result = $this->sql->query(PerfilDAO::$SELECT_ALL);
        //devolver o resultado

        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idPerfil' => $linha->id_perfil,
                    'nomePerfil' => $linha->nome_perfil,
                    'codStatusPerfil' => $linha->cod_status_perfil
                );
            }
        } else {
            $itens = null;
        }
        return $itens;

    }

    public function listarPerfilId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            PerfilDAO::$SELECT_ID,
            array(
                'idPerfil' => array(0 => $this->getIdPerfil(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
           
            $itens = array(
                'idPerfil' => $linha->id_perfil,
                'nomePerfil' => $linha->nome_perfil,
                'codStatusPerfil' => $linha->cod_status_perfil
            );
        } else {
            $itens = null;
        }
        //devolver o resultado  

        return $itens;
    }

    public function alterarPerfil()
    {
        $result = $this->sql->execute(
            PerfilDAO::$UPDATE,
            array(
                ':idPerfil' => array(0 => $this->getIdPerfil(), 1 => \PDO::PARAM_INT),
                ':nomePerfil' => array(0 => $this->getNomePerfil(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function adicionarPerfil()
    {
        $result = $this->sql->execute(
            PerfilDAO::$INSERT,
            array(
                ':nomePerfil' => array(0 => $this->getNomePerfil(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function excluirPerfil()
    {
        $result = $this->sql->execute(
            PerfilDAO::$DELETE,
            array(
                ':idPerfil' => array(0 => $this->getIdPerfil(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
