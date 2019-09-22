<?php

namespace Model;

use PDO;

class AdmDAO extends Adm
{
    private $sql;

    // private static $SELECT_AUTENTICACAO = "select * from usuario where senha_usuario =
    // :senhaUsuario";

    private static $SELECT_AUTENTICACAO = "select * from usuario u, perfil p where (u.id_perfil = p.id_perfil) and p.id_perfil <= 3 and email_usuario = :emailUsuario";

    private static $SELECT_ALL = "select * from usuario where id_perfil between 1 and 3";

    private static $INSERT = "";
    private static $UPDATE = "";
    private static $DELETE = "";

    public function __construct($objSql = "", $idUsuario = "",  $nomeUsuario = "", $sobrenomeUsuario = "", $emailUsuario = "", $senhaUsuario = "", $codStatusUsuario = "", $idPerfil = "")
    {
        parent::__construct($idUsuario, $nomeUsuario, $sobrenomeUsuario, $emailUsuario, $senhaUsuario, $codStatusUsuario, $idPerfil);

        $this->sql = $objSql;
    }

    public function autenticarAdm($emailUsuario, $senhaUsuario)
    {
        $result = $this->sql->query(
            AdmDAO::$SELECT_AUTENTICACAO,
            array(':emailUsuario' => array(0 => $emailUsuario, 1 => \PDO::PARAM_STR))
        );

        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            var_dump($linha);
            if (\Util\Bcrypt::check($senhaUsuario, $linha->senha_usuario)) {
                $itens = array(
                    'idUsuario' => $linha->id_usuario,
                    'nomeUsuario' => $linha->nome_usuario,
                    'sobrenomeUsuario' => $linha->sobrenome_usuario,
                    'emailUsuario' => $linha->email_usuario,
                    'senhaUsuario' => $linha->senha_usuario,
                    'codStatusUsuario' => $linha->cod_status_usuario,
                    'idPerfil' => $linha->id_perfil
                );

            } else {
                $itens = false;
            }
        } else {
            $itens = null;
        }
        return $itens;

     
    }
}
