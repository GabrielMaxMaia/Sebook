<?php

//Indicamos o namespace

namespace Model;

//Criamos a herança entre Usuario e UsuarioDAO
class PostagemDAO extends Postagem
{
    //Atributos - serão os comandos SQL  + um objeto Sql
    private static $SELECT_ALL = "SELECT * FROM postagem WHERE cod_status_post = '1' ORDER BY id_post DESC";

    private static $SELECT_ULTIMOS = "SELECT * FROM postagem WHERE cod_status_post = '1' ORDER BY id_post DESC LIMIT 2";

    private static $SELECT_TOT = "SELECT count(id_post) as tot from postagem where cod_status_post = '1'";

    private static $SELECT_ID = "SELECT * from postagem where id_post = :idPostagem";

    private static $INSERT = "INSERT INTO postagem
    (titulo_post,txt_postagem,data_hora_post, url_foto_post, id_usuario)
    VALUES (:tituloPostagem, :txtPostagem, :datahoraPost, :urlFotoPost, :idUsuario)";

    private static $UPDATE = "UPDATE postagem SET titulo_post = :tituloPostagem, txt_postagem = :txtPostagem, url_foto_post = :urlFotoPost WHERE id_post =  :idPostagem";

    //DELETE lógico -> altera status
    private static $DELETE = "UPDATE postagem SET cod_status_post = '0' WHERE id_post = :idPostagem ";

    //Atributo par armazenar o Objeto SQL 
    private $sql;

    //Método Construtor - setamos os parametros e passamos um obj SQL
    public function __construct($objSql = "", $idPost = "", $tituloPost = "", $datahoraPost = "", $linkPost = "", $urlFotoPost = "", $codStatusPost = "", $txtPost = "", $idUsuario = "")
    {
        parent::__construct($idPost, $tituloPost, $datahoraPost, $linkPost, $urlFotoPost, $codStatusPost, $txtPost, $idUsuario);
        $this->sql = $objSql;
    }

    //Métodos especialistas - irão executar os SQL dos Atributos

    public function listarPostagem($ini = -1, $qtde = 1)
    {
        if ($ini >= 0) {
            $limit = " limit $ini , $qtde ";
        } else {
            $limit = "";
        }

        //executar a consulta no banco
        $result = $this->sql->query(
            PostagemDAO::$SELECT_ALL . $limit);

        //var_dump($result);
        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idPostagem' => $linha->id_post,
                    'tituloPostagem' => $linha->titulo_post,
                    'txtPostagem' => $linha->txt_postagem,
                    'datahoraPost' => $linha->data_hora_post,
                    'idUsuario' => $linha->id_usuario,
                    'datahoraPost' => $linha->data_hora_post,
                    'urlFotoPost' => $linha->url_foto_post
                );
            }
            //var_dump($itens);
        } else {
            $itens = null;
        }
        return $itens;
    }

    public function listarUltimasPostagens()
    {
        //executar a consulta no banco
        $result = $this->sql->query(
            PostagemDAO::$SELECT_ULTIMOS);

        //var_dump($result);
        //devolver o resultado
        if ($result->rowCount() > 0) {
            while ($linha = $result->fetch(\PDO::FETCH_OBJ)) {
                $itens[] = array(
                    'idPostagem' => $linha->id_post,
                    'tituloPostagem' => $linha->titulo_post,
                    'txtPostagem' => $linha->txt_postagem,
                    'datahoraPost' => $linha->data_hora_post,
                    'idUsuario' => $linha->id_usuario,
                    'datahoraPost' => $linha->data_hora_post,
                    'urlFotoPost' => $linha->url_foto_post
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
        $result = $this->sql->query(PostagemDAO::$SELECT_TOT);
        $linha = $result->fetch(\PDO::FETCH_OBJ);
        return $linha->tot;
    }

    public function listarPostagemId()
    {
        //executar a consulta no banco

        $result = $this->sql->query(
            PostagemDAO::$SELECT_ID,
            array(
                ':idPostagem' => array(
                    0 => $this->getIdPostagem(),
                    1 => \PDO::PARAM_INT
                )
            )
        );
        if ($result->rowCount() == 1) {
            $linha = $result->fetch(\PDO::FETCH_OBJ);
            $itens = array(
                'idPostagem' => $linha->id_post,
                'tituloPostagem' => $linha->titulo_post,
                'txtPostagem' => $linha->txt_postagem,
                'idUsuario' => $linha->id_usuario,
                'urlFotoPost' => $linha->url_foto_post
            );
            // var_dump($itens);
        } else {
            $itens = null;
        }
        //devolver o resultado     
        return $itens;
    }

    public function adicionarPostagem()
    {
        $result = $this->sql->execute(
            PostagemDAO::$INSERT,
            array(
                ':idUsuario' => array(0 => $this->getIdUsuario(), 1 => \PDO::PARAM_INT),
                ':tituloPostagem' => array(0 => $this->getTituloPostagem(), 1 => \PDO::PARAM_STR),
                ':txtPostagem' => array(0 => $this->getTxtPostagem(), 1 => \PDO::PARAM_STR),
                ':datahoraPost' => array(0 => $this->getDatahoraPostagem(), 1 => \PDO::PARAM_STR),
                ':urlFotoPost' => array(0 => $this->getUrlFotoPostagem(), 1 => \PDO::PARAM_STR)
            )
        );
        //var_dump($result);
        return $result;
    }

    public function alterarPostagem()
    {
        $result = $this->sql->execute(
            PostagemDAO::$UPDATE,
            array(
                ':idPostagem' => array(0 => $this->getIdPostagem(), 1 => \PDO::PARAM_INT),
                ':tituloPostagem' => array(0 => $this->getTituloPostagem(), 1 => \PDO::PARAM_STR),
                ':txtPostagem' => array(0 => $this->getTxtPostagem(), 1 => \PDO::PARAM_STR),
                ':urlFotoPost' => array(0 => $this->getUrlFotoPostagem(), 1 => \PDO::PARAM_STR)
            )
        );
        return $result;
    }

    public function excluirPostagem()
    {
        $result = $this->sql->execute(
            PostagemDAO::$DELETE,
            array(
                'idPostagem' => array(0 => $this->getIdPostagem(), 1 => \PDO::PARAM_INT)
            )
        );
        return $result;
    }
}
