<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Usuario e UsuarioDAO
class UsuarioDAO extends Usuario
{
    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_LAST_ID = "SELECT last_insert_id() as last_id FROM db_sebook.usuario limit 0,1";

    private static $SELECT_ALL = "select * from usuario where cod_status_Usuario = '1'";

    private static $SELECT_PERFIL = "select * from perfil where cod_status_perfil = '1'";

    private static $SELECT_ID = "select * from usuario where id_usuario = :idUsuario";
    private static $INSERT = "INSERT INTO usuario (nome_Usuario, sobrenome_usuario, email_usuario, senha_usuario, id_perfil, data_criacao) VALUES (:nomeUsuario, :sobrenomeUsuario, :emailUsuario, :senhaUsuario,:idPerfil, :dataCriacao)";

    private static $UPDATE_SENHA = "UPDATE usuario SET senha_usuario =:senhaUsuario WHERE id_usuario = :idUsuario";

    private static $UPDATE_INFO = "UPDATE usuario SET nome_usuario =:nomeUsuario, sobrenome_usuario =:sobrenomeUsuario, email_usuario =:emailUsuario WHERE id_usuario = :idUsuario";

    private static $UPDATE = "UPDATE usuario SET nome_usuario = :nomeUsuario, sobrenome_usuario = :sobrenomeUsuario, email_usuario = :emailUsuario, senha_usuario = :senhaUsuario, id_perfil = :idPerfil WHERE id_usuario =  :idUsuario";

    //DELETE lógico -> altera status
    private static $DELETE = "UPDATE usuario SET cod_status_usuario = '0'
    WHERE id_usuario = :idUsuario ";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idUsuario = "", $nomeUsuario = "", $sobrenomeUsuario = "", $emailUsuario = "", $senhaUsuario = "", $codStatusUsuario = "", $idPerfil = "")
    {
        parent::__construct($idUsuario, $nomeUsuario , $sobrenomeUsuario, $emailUsuario, $senhaUsuario, $codStatusUsuario, $idPerfil);
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

    public function listarPerfil()
    {
        //executar a consulta no banco
        $result = $this->sql->query(UsuarioDAO::$SELECT_PERFIL);
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
                'emailUsuario' => $linha->email_usuario,
                'sobrenomeUsuario' => $linha->sobrenome_usuario,
                'senhaUsuario' => $linha->senha_usuario,
                'codStatusUsuario' => $linha->cod_status_usuario,
                'idPerfil' => $linha->id_perfil
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
                ':sobrenomeUsuario' => array(0 => $this->getSobrenomeUsuario(), 1 => \PDO::PARAM_STR),
                ':emailUsuario' => array(0 => $this->getEmailUsuario(), 1 => \PDO::PARAM_STR),
                ':senhaUsuario' => array(0 => \Util\Bcrypt::hash($this->getSenhaUsuario()), 1 => \PDO::PARAM_STR),
                ':idPerfil' => array(0 => $this->getIdPerfil(), 1 => \PDO::PARAM_STR),
                ':dataCriacao' => array(0 => $this->getDataCriacao(), 1 => \PDO::PARAM_STR)
            )
        );
        //Executar last id 
        //Usar a clienteDAO para inserir um registro só com id
        $result_last_id = $this->sql->query(UsuarioDAO::$SELECT_LAST_ID);
        $usuario = $result_last_id->fetch(\PDO::FETCH_OBJ);
        

        if($this->getIdPerfil() != 5){
            $clienteDAO = new ClienteDAO($this->sql, $usuario->last_id, null, null, null, 'public/icon/user.svg', null, null, null, null, '1');

            $clienteDAO->adicionarCliente();
        }else{
            $seboDAO = new SeboDAO($this->sql, $usuario->last_id, null, null, null, 'public/img/imgPerfilSebo/imgPadrao/padrao.png', null, null, null, null, null, null, null, null, null, '1');

            $seboDAO->adicionarSebo();
        }

        
        return $result;
    }

    public function alterarUsuario()
    {
        $result = $this->sql->execute(
            UsuarioDAO::$UPDATE,
            array(
                ':nomeUsuario' => array(0 => $this->getNomeUsuario(), 1 => \PDO::PARAM_STR),
                ':sobrenomeUsuario' => array(0 => $this->getSobrenomeUsuario(), 1 => \PDO::PARAM_STR),
                ':emailUsuario' => array(0 => $this->getEmailUsuario(), 1 => \PDO::PARAM_STR),
                ':senhaUsuario' => array(0 => $this->getSenhaUsuario(), 1 => \PDO::PARAM_STR),
                ':idPerfil' => array(0 => $this->getIdPerfil(), 1 => \PDO::PARAM_INT),
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }

    public function alterarSenhaUsuario()
    {
        $result = $this->sql->execute(
            UsuarioDAO::$UPDATE_SENHA,
            array(
                ':senhaUsuario' => array(0 => \Util\Bcrypt::hash($this->getSenhaUsuario()), 1 => \PDO::PARAM_STR),
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT) 
            )
        );
        return $result;
    }
    
    public function alterarInfoUsuario()
    {
        $result = $this->sql->execute(
            UsuarioDAO::$UPDATE_INFO,
            array(
                ':nomeUsuario' => array(0 => $this->getNomeUsuario(), 1 => \PDO::PARAM_STR),
                ':sobrenomeUsuario' => array(0 => $this->getSobrenomeUsuario(), 1 => \PDO::PARAM_STR),
                ':emailUsuario' => array(0 => $this->getEmailUsuario(), 1 => \PDO::PARAM_STR),
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
