<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Comentario
{
    //Atributos mapeando os campos da tabela
    private $idComentario;
    private $txtComentario;
    private $dataHoraComentario;
    private $codStatusComentario;
    private $idPost;
    private $idPagina;
    private $idUsuario;
    private $idComentarioParente;

    //Método construtor auxiliar de criação de objetos
    public function __construct($idComentario = "", $txtComentario = "", $dataHoraComentario = "", $codStatusComentario = "", $idPost = "", $idPagina= "", $idUsuario = "", $idComentarioParente = "")
    {
        $this->idComentario = $idComentario;
        $this->txtComentario = $txtComentario;
        $this->dataHoraComentario = $dataHoraComentario;
        $this->codStatusComentario = $codStatusComentario;
        $this->idPost = $idPost;
        $this->idPagina = $idPagina;
        $this->idUsuario = $idUsuario;
        $this->idComentarioParente = $idComentarioParente;
    }

    //getters e setters
    public function getIdComentario()
    {
        return $this->idComentario;
    }

    public function setIdComentario($idComentario)
    {
        $this->idComentario = $idComentario;
    }

    public function getTxtComentario()
    {
        return $this->txtComentario;
    }

    public function setTxtComentario($txtComentario)
    {
        $this->txtComentario = $txtComentario;
    }

    public function getDataHoraComentario()
    {
        return $this->dataHoraComentario;
    }

    public function setDataHoraComentario($dataHoraComentario)
    {
        $this->dataHoraComentario = $dataHoraComentario;
    }

    public function getCodStatusComentario()
    {
        return $this->codStatusComentario;
    }

    public function setCodStatusComentario($codStatusComentario)
    {
        $this->codStatusComentario = $codStatusComentario;
    }

    public function getIdPost()
    {
        return $this->idPost;
    }

    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    }

    public function getIdPagina(){
		return $this->idPagina;
	}

	public function setIdPagina($idPagina){
		$this->idPagina = $idPagina;
	}

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getIdComentarioParente()
    {
        return $this->idComentarioParente;
    }

    public function setIdComentarioParente($idComentarioParente)
    {
        $this->idComentarioParente = $idComentarioParente;
    }

    //Método __toString()
    public function __toString()
    {
        return json_encode(array(
            'idComentario' => $this->idComentario,
            'txtComentario' => $this->txtComentario,
            'dataHoraComentario' => $this->dataHoraComentario,
            'codStatusComentario' => $this->codStatusComentario,
            'idPost' => $this->idPost,
            'idUsuario' => $this->idUsuario,
            'idComentarioParente' => $this->idComentarioParente
        ));
    }
}

/*
$obj = new Comentario();

$obj->setIdComentario(1);
$obj->setNomeComentario('teste');
$obj->setDescrComentario('novo teste');
$obj->setStatusComentario();

$obj = new Comentario(1,'teste','novo teste','A');
*/
