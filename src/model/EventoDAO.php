<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Usuario e UsuarioDAO
class EventoDAO extends Evento
{
    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "select * from evento";

    private static $SELECT_TOT = "SELECT count(id_evento) as tot from evento";

    private static $SELECT_ID = "SELECT * from evento where id_evento = :idEvento";

    private static $INSERT = "INSERT INTO evento (nome_evento,txt_evento,data_hora_evento, url_foto_evento, id_usuario)
    VALUES (:nomeEvento, :txtEvento, :dataHoraEvento, :urlFotoEvento, :idUsuario)";

    private static $UPDATE = "UPDATE evento SET nome_evento = :nomeEvento, txt_evento = :txtEvento, data_hora_evento = :dataHoraEvento,url_foto_evento = :urlFotoEvento WHERE id_evento = :idEvento AND id_usuario = :idUsuario";

    //DELETE lógico -> altera status
    private static $DELETE = "DELETE FROM evento WHERE id_evento = :idEvento";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idEvento = "", $nomeEvento = "", $txtEvento = "", $dataHoraEvento = "", $idUsuario = "", $urlFotoEvento = "")
    {
        parent::__construct($idEvento, $nomeEvento, $txtEvento, $dataHoraEvento, $idUsuario, $urlFotoEvento);
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
            EventoDAO::$SELECT_ALL . $limit);

        //var_dump($result);
        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idEvento' => $linha->id_evento,
                    'nomeEvento' => $linha->nome_evento,
                    'txtEvento' => $linha->txt_evento,
                    'dataHoraEvento' => $linha->data_hora_evento,
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
                'dataHoraEvento' => $linha->data_hora_evento,
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
                ':dataHoraEvento' => array(0 => $this->getDataHoraEvento(), 1 => \PDO::PARAM_STR),
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':urlFotoEvento' => array(0 => $this->getUrlFotoEvento(), 1 => \PDO::PARAM_INT)
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
                ':dataHoraEvento' => array(0 => $this->getDataHoraEvento(), 1 => \PDO::PARAM_STR),
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':urlFotoEvento' => array(0 => $this->getUrlFotoEvento(), 1 => \PDO::PARAM_INT)
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
