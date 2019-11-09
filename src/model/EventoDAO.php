<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Usuario e UsuarioDAO
class EventoDAO extends Evento
{
    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "SELECT * FROM evento ORDER BY id_evento DESC";

    private static $SELECT_ID_USER_EVENTO = "SELECT * from evento WHERE id_usuario = :idUsuario ORDER BY id_evento DESC";

    private static $SELECT_ULTIMOS = "SELECT * FROM evento ORDER BY id_evento DESC LIMIT 2";

    private static $SELECT_TOT = "SELECT count(id_evento) as tot from evento";

    private static $SELECT_TOT_CONT_ID = "SELECT count(id_evento) as tot from evento where id_usuario = :idUsuario";

    private static $SELECT_ID = "SELECT * from evento where id_evento = :idEvento";

    private static $INSERT = "INSERT INTO evento (nome_evento,txt_evento,data_evento,hora_evento, url_foto_evento, id_usuario)
    VALUES (:nomeEvento, :txtEvento, :dataEvento,:horaEvento, :urlFotoEvento, :idUsuario)";

    private static $UPDATE = "UPDATE evento SET nome_evento = :nomeEvento, txt_evento = :txtEvento, data_evento = :dataEvento, hora_evento = :horaEvento,url_foto_evento = :urlFotoEvento WHERE id_evento = :idEvento";

    //DELETE lógico -> altera status
    private static $DELETE = "DELETE FROM evento WHERE id_evento = :idEvento";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idEvento = "", $nomeEvento = "", $txtEvento = "", $dataEvento = "", $horaEvento = "", $idUsuario = "", $urlFotoEvento = "")
    {
        parent::__construct($idEvento, $nomeEvento, $txtEvento, $dataEvento, $horaEvento, $idUsuario, $urlFotoEvento);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos

    public function listarEvento($ini = -1, $qtde = 1)
    {
        if ($ini >= 0) {
            $limit = " limit $ini , $qtde ";
        } else {
            $limit = "";
        }

        //executar a consulta no banco
        $result = $this->sql->query(
            EventoDAO::$SELECT_ALL . $limit
        );

        //var_dump($result);
        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idEvento' => $linha->id_evento,
                    'nomeEvento' => $linha->nome_evento,
                    'txtEvento' => $linha->txt_evento,
                    'dataEvento' => $linha->data_evento,
                    'horaEvento' => $linha->hora_evento,
                    'idUsuario' => $linha->id_usuario,
                    'urlFotoEvento' => $linha->url_foto_evento
                );
            }
            //var_dump($itens);
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarEventoUser($ini = -1, $qtde = 1)
    {
        if ($ini >= 0) {
            $limit = " limit $ini , $qtde ";
        } else {
            $limit = "";
        }
        //executar a consulta no banco
        $result = $this->sql->query(
            EventoDAO::$SELECT_ID_USER_EVENTO . $limit,
            array(
                ':idUsuario' => array(
                    0 => $this->getIdUsuario(),
                    1 => \PDO::PARAM_INT
                )
            )
        );

        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idEvento' => $linha->id_evento,
                    'nomeEvento' => $linha->nome_evento,
                    'txtEvento' => $linha->txt_evento,
                    'dataEvento' => $linha->data_evento,
                    'horaEvento' => $linha->hora_evento,
                    'idUsuario' => $linha->id_usuario,
                    'urlFotoEvento' => $linha->url_foto_evento
                );
            }
            //var_dump($itens);
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarUltimos()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            EventoDAO::$SELECT_ULTIMOS
        );

        //var_dump($result);
        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idEvento' => $linha->id_evento,
                    'nomeEvento' => $linha->nome_evento,
                    'txtEvento' => $linha->txt_evento,
                    'dataEvento' => $linha->data_evento,
                    'horaEvento' => $linha->hora_evento,
                    'idUsuario' => $linha->id_usuario,
                    'urlFotoEvento' => $linha->url_foto_evento
                );
            }
            //var_dump($itens);
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function totalContar()
    {
        $result = $this->sql->query(EventoDAO::$SELECT_TOT);
        $linha = $result->fetch(\PDO::FETCH_OBJ);
        return $linha->tot;
    }

    public function totalContarId()
    {
        $result = $this->sql->query(
            EventoDAO::$SELECT_TOT_CONT_ID,
            array(
                ':idUsuario' => array(
                    0 => $this->getIdUsuario(),
                    1 => \PDO::PARAM_INT
                )
            )
        );
        $linha = $result->fetch(\PDO::FETCH_OBJ);
        return $linha->tot;
    }

    public function listarEventoId()
    {
        //executar a consulta no banco

        $result = $this->sql->query(
            EventoDAO::$SELECT_ID,
            array(
                ':idEvento' => array(
                    0 => $this->getIdEvento(),
                    1 => \PDO::PARAM_INT
                )
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idEvento' => $linha->id_evento,
                'nomeEvento' => $linha->nome_evento,
                'txtEvento' => $linha->txt_evento,
                'dataEvento' => $linha->data_evento,
                'horaEvento' => $linha->hora_evento,
                'idUsuario' => $linha->id_usuario,
                'urlFotoEvento' => $linha->url_foto_evento
            );
            // var_dump($itens);
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarEvento()
    {
        $result = $this->sql->execute(
            EventoDAO::$INSERT,
            array(
                ':nomeEvento' => array(0 => $this->getNomeEvento(), 1 => \PDO::PARAM_STR),
                ':txtEvento' => array(0 => $this->getTxtEvento(), 1 => \PDO::PARAM_STR),
                ':dataEvento' => array(0 => $this->getDataEvento(), 1 => \PDO::PARAM_STR),
                ':horaEvento' => array(0 => $this->getHoraEvento(), 1 => \PDO::PARAM_STR),
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':urlFotoEvento' => array(0 => $this->getUrlFotoEvento(), 1 => \PDO::PARAM_STR)
            )
        );
        //var_dump($result);
        return $result;
    }

    public function alterarEvento()
    {
        $result = $this->sql->execute(
            EventoDAO::$UPDATE,
            array(
                ':idEvento' => array(0 => $this->getIdEvento(), 1 => \PDO::PARAM_INT),
                ':nomeEvento' => array(0 => $this->getNomeEvento(), 1 => \PDO::PARAM_STR),
                ':txtEvento' => array(0 => $this->getTxtEvento(), 1 => \PDO::PARAM_STR),
                ':dataEvento' => array(0 => $this->getDataEvento(), 1 => \PDO::PARAM_STR),
                ':horaEvento' => array(0 => $this->getHoraEvento(), 1 => \PDO::PARAM_STR),
                ':urlFotoEvento' => array(0 => $this->getUrlFotoEvento(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function excluirEvento()
    {
        $result = $this->sql->execute(
            EventoDAO::$DELETE,
            array(
                ':idEvento' => array(0 => $this->getIdEvento(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
