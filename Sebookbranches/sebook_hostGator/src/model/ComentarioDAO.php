<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre comentario e ComentarioDAO
class ComentarioDAO extends Comentario
{
    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "SELECT * FROM comentario inner join usuario WHERE usuario.id_usuario = comentario.id_usuario and cod_status_comentario = '1' ORDER BY id_comentario DESC";

    private static $SELECT_ALL_ADM = "SELECT * FROM comentario where cod_status_comentario = '1' ORDER BY id_comentario DESC";

    private static $SELECT_TOT = "SELECT count(id_comentario) as tot from comentario where cod_status_comentario = '1'";

    private static $SELECT_ID = "SELECT * FROM comentario INNER JOIN usuario ON (comentario.id_usuario = usuario.id_usuario) AND comentario.id_comentario =:idComentario";

    private static $SELECT_ID_POSTAGEM = "SELECT * FROM comentario inner join usuario WHERE comentario.id_usuario = usuario.id_usuario AND id_post = :idPost AND cod_status_comentario = '1' ORDER BY id_comentario DESC";
    
    private static $SELECT_ID_PAGINA = "SELECT * FROM comentario inner join usuario WHERE comentario.id_usuario = usuario.id_usuario AND id_pagina = :idPagina AND cod_status_comentario = '1' ORDER BY id_comentario DESC";
    
    private static $SELECT_ID_EVENTO = "SELECT * FROM comentario inner join usuario WHERE comentario.id_usuario = usuario.id_usuario AND id_evento = :idEvento AND cod_status_comentario = '1' ORDER BY id_comentario DESC";

    private static $INSERT = "INSERT INTO comentario (id_comentario_parente, txt_comentario, data_hora_comentario, id_post, id_pagina, id_evento, id_usuario) VALUES (:idComentarioParente, :txtComentario, :dataHoraComentario, :idPost, :idPagina, :idEvento, :idUsuario)";

    private static $UPDATE = "UPDATE comentario SET txt_comentario = :txtComentario WHERE id_comentario = :idComentario";

    //DELETE lógico -> altera status
    private static $DELETE = "UPDATE comentario SET cod_status_comentario = '0' WHERE id_comentario = :idComentario ";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idComentario = "", $txtComentario = "", $dataHoraComentario = "", $codStatusComentario = "", $idPost = "", $idPagina= "", $idEvento="", $idUsuario = "", $idComentarioParente = "")
    {
        parent::__construct($idComentario, $txtComentario, $dataHoraComentario, $codStatusComentario, $idPost, $idPagina, $idEvento, $idUsuario, $idComentarioParente);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos    
    // public function listarComentario()
    // {
    //     //executar a consulta no banco
    //     $result = $this->sql->query(ComentarioDAO::$SELECT_ALL);

    //     //devolver o resultado
    //     if ($result->rowCount() > 0) {
    //         while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
    //             $itens[] = array(
    //                 'idComentario' => $linha->id_comentario,
    //                 'idComentarioParente' => $linha->id_comentario_parente,
    //                 'txtComentario' => $linha->txt_comentario,
    //                 'dataHoraComentario' => $linha->data_hora_comentario,
    //                 'codStatusComentario' => $linha->cod_status_comentario,
    //                 'idPost' => $linha->id_post,
    //                 'idPagina' => $linha->id_pagina,
    //                 'idUsuario' => $linha->id_usuario,
    //                 'nomeUsuario' => $linha->nome_usuario
    //             );
    //         }
    //     } else {
    //         $itens = null;
    //     }
    //     return $itens;
    // }

    public function listarComentario($ini = -1, $qtde = 1)
    {
        if ($ini >= 0) {
            $limit = " limit $ini , $qtde ";
        } else {
            $limit = "";
        }

        //executar a consulta no banco
        $result = $this->sql->query(ComentarioDAO::$SELECT_ALL . $limit);

        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idComentario' => $linha->id_comentario,
                    'idComentarioParente' => $linha->id_comentario_parente,
                    'txtComentario' => $linha->txt_comentario,
                    'dataHoraComentario' => $linha->data_hora_comentario,
                    'codStatusComentario' => $linha->cod_status_comentario,
                    'idPost' => $linha->id_post,
                    'idPagina' => $linha->id_pagina,
                    'idEvento' => $linha->id_evento,
                    'idUsuario' => $linha->id_usuario,
                    'nomeUsuario' => $linha->nome_usuario,
                    'urlFoto' => $linha->url_foto
                );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarComentarioAdm($ini = -1, $qtde = 1)
    {
        if ($ini >= 0) {
            $limit = " limit $ini , $qtde ";
        } else {
            $limit = "";
        }

        //executar a consulta no banco
        $result = $this->sql->query(ComentarioDAO::$SELECT_ALL_ADM . $limit);

        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idComentario' => $linha->id_comentario,
                    'idComentarioParente' => $linha->id_comentario_parente,
                    'txtComentario' => $linha->txt_comentario,
                    'dataHoraComentario' => $linha->data_hora_comentario,
                    'codStatusComentario' => $linha->cod_status_comentario,
                    'idPost' => $linha->id_post,
                    'idPagina' => $linha->id_pagina,
                    'idEvento' => $linha->id_evento,
                    );
            }
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function totalContar()
    {
        $result = $this->sql->query(ComentarioDAO::$SELECT_TOT);
        $linha = $result->fetch(\PDO::FETCH_OBJ);
        return $linha->tot;
    }

    public function listarComentarioId()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            ComentarioDAO::$SELECT_ID,
            array(
                ':idComentario' => array(0 => $this->getIdComentario(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);

            $itens = array(
                'idComentario' => $linha->id_comentario,
                'idComentarioParente' => $linha->id_comentario_parente,
                'txtComentario' => $linha->txt_comentario,
                'dataHoraComentario' => $linha->data_hora_comentario,
                'codStatusComentario' => $linha->cod_status_comentario,
                'idPost' => $linha->id_post,
                'idPagina' => $linha->id_pagina,
                'idEvento' => $linha->id_evento,
                'idUsuario' => $linha->id_usuario,
                'urlFoto' => $linha->url_foto
            );
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function listarComentarioPost()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            ComentarioDAO::$SELECT_ID_POSTAGEM,
            array(
                ':idPost' => array(0 => $this->getIdPost(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() > 0) {

            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idComentario' => $linha->id_comentario,
                    'idComentarioParente' => $linha->id_comentario_parente,
                    'txtComentario' => $linha->txt_comentario,
                    'dataHoraComentario' => $linha->data_hora_comentario,
                    'codStatusComentario' => $linha->cod_status_comentario,
                    'idPost' => $linha->id_post,
                    'idUsuario' => $linha->id_usuario,
                    'nomeUsuario' => $linha->nome_usuario,
                    'urlFoto' => $linha->url_foto
                );
            }
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function listarComentarioPagina()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            ComentarioDAO::$SELECT_ID_PAGINA,
            array(
                ':idPagina' => array(0 => $this->getIdPagina(), 1 => \PDO::PARAM_STR)
            )
        );
        if ($result->rowCount() > 0) {

            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idComentario' => $linha->id_comentario,
                    'idComentarioParente' => $linha->id_comentario_parente,
                    'txtComentario' => $linha->txt_comentario,
                    'dataHoraComentario' => $linha->data_hora_comentario,
                    'codStatusComentario' => $linha->cod_status_comentario,
                    'idPagina' => $linha->id_pagina,
                    'idUsuario' => $linha->id_usuario,
                    'nomeUsuario' => $linha->nome_usuario,
                    'urlFoto' => $linha->url_foto
                );
            }
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function listarComentarioEvento()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            ComentarioDAO::$SELECT_ID_EVENTO,
            array(
                ':idEvento' => array(0 => $this->getIdEvento(), 1 => \PDO::PARAM_INT)
            )
        );
        if ($result->rowCount() > 0) {

            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idComentario' => $linha->id_comentario,
                    'idComentarioParente' => $linha->id_comentario_parente,
                    'txtComentario' => $linha->txt_comentario,
                    'dataHoraComentario' => $linha->data_hora_comentario,
                    'codStatusComentario' => $linha->cod_status_comentario,
                    'idEvento' => $linha->id_evento,
                    'idUsuario' => $linha->id_usuario,
                    'nomeUsuario' => $linha->nome_usuario,
                    'urlFoto' => $linha->url_foto
                );
            }
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarComentario()
    {
        $result = $this->sql->execute(
            ComentarioDAO::$INSERT,
            array(
                ':idPost' => array(0 => $this->getIdPost(), 1 => \PDO::PARAM_INT),
                ':idPagina' => array(0 => $this->getIdPagina(), 1 => \PDO::PARAM_INT),
                ':idEvento' => array(0 => $this->getIdEvento(), 1 => \PDO::PARAM_INT),
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':idComentarioParente' => array(0 => 0, 1 => \PDO::PARAM_INT),
                ':txtComentario' => array(0 => $this->getTxtComentario(), 1 => \PDO::PARAM_STR),
                ':dataHoraComentario' => array(0 => $this->getDataHoraComentario(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function alterarComentario()
    {
        $result = $this->sql->execute(
            ComentarioDAO::$UPDATE,
            array(
                ':txtComentario' => array(0 => $this->getTxtComentario(), 1 => \PDO::PARAM_STR),
                ':idComentario' => array(0 => $this->getIdComentario(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }

    public function excluirComentario()
    {
        $result = $this->sql->execute(
            ComentarioDAO::$DELETE,
            array(
                'idComentario' => array(0 => $this->getIdcomentario(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
