<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Usuario e UsuarioDAO
class UsuarioDAO extends Usuario
{
    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from usuario where cod_status_Usuario = '1'";
    private static $SELECT_ID = "select * from usuario where id_usuario = :idUsuario";
    private static $INSERT = "INSERT INTO usuario (nome_Usuario) VALUES (:nomeUsuario)";

    private static $UPDATE = "UPDATE usuario SET
                            nome_Usuario = :nomeUsuario 
                              WHERE id_Usuario =  :idUsuario";

    //DELETE lógico -> altera status
    private static $DELETE = "UPDATE usuario SET
                                    cod_status_usuario = '0'
                                WHERE id_usuario = :idUsuario ";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idUsuario = "", $nomeUsuario = "", $sobrenomeUsuario = "",$emailUsuario = "" , $senhaUsuario = "", $codStatusUsuario = "", $idPerfil = "")
    {
        parent::__construct($idUsuario = "", $nomeUsuario = "", $sobrenomeUsuario = "",$emailUsuario = "" , $senhaUsuario = "", $codStatusUsuario = "", $idPerfil = "");
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos

    public function listarUsuarios()
    {
        //executar a consulta no banco
        $result = $this->sql->query(UsuarioDAO::$SELECT_ALL);
        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idUsuario' => $linha->id_usuario,
                    'nomeUsuario' => $linha->nome_usuario,
                    'codStatusUsuario' => $linha->cod_status_usuario,
                    'codStatusUsuario' => $linha->cod_status_usuario,
                    'idPerfil' => $linha->id_perfil
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarUsuarioId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            UsuarioDAO::$SELECT_ID,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idUsuario' => $linha->id_usuario,
                'nomeUsuario' => $linha->nome_usuario,
                'codStatusUsuario' => $linha->cod_status_usuario
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarUsuario()
    {
        $result = $this->sql->execute(
            UsuarioDAO::$INSERT,
            array(
                ':nomeUsuario' => array(0 => $this->getNomeUsuario(), 1 => \PDO::PARAM_STR),
            )
        );
        return $result;
    }

    public function alterarUsuario()
    {
        $result = $this->sql->execute(
            UsuarioDAO::$UPDATE,
            array(
                ':nomeUsuario' => array(0 => $this->getNomeUsuario(), 1 => \PDO::PARAM_STR),
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }

    public function excluirUsuario()
    {
        $result = $this->sql->execute(
            UsuarioDAO::$DELETE,
            array(
                'idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
