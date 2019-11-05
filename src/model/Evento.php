<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Evento
{
	//Atributos mapeando os campos da tabela
	private $idEvento;
	private $nomeEvento;
	private $txtEvento;
	private $dataHoraEvento;
	private $idUsuario;
	private $urlFotoEvento;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idEvento = "", $nomeEvento = "", $txtEvento = "", $dataHoraEvento = "", $idUsuario = "", $urlFotoEvento = "")
	{
		$this->idEvento = $idEvento;
		$this->nomeEvento = $nomeEvento;
		$this->txtEvento = $txtEvento;
		$this->dataHoraEvento = $dataHoraEvento;
		$this->idUsuario = $idUsuario;
		$this->urlFotoEvento = $urlFotoEvento;
	}

	//getters e setters
	public function getIdEvento(){
		return $this->idEvento;
	}

	public function setIdEvento($idEvento){
		$this->idEvento = $idEvento;
	}

	public function getNomeEvento(){
		return $this->nomeEvento;
	}

	public function setNomeEvento($nomeEvento){
		$this->nomeEvento = $nomeEvento;
	}

	public function getTxtEvento(){
		return $this->txtEvento;
	}

	public function setTxtEvento($txtEvento){
		$this->txtEvento = $txtEvento;
	}

	public function getDataHoraEvento(){
		return $this->dataHoraEvento;
	}

	public function setDataHoraEvento($dataHoraEvento){
		$this->dataHoraEvento = $dataHoraEvento;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getUrlFotoEvento(){
		return $this->urlFotoEvento;
	}

	public function setUrlFotoEvento($urlFotoEvento){
		$this->urlFotoEvento = $urlFotoEvento;
	}

	//Método __toString()
	public function __toString()
	{
		return json_encode(array(
			'idEvento' => $this->idEvento,
			'nomeEvento' => $this->nomeEvento,
			'txtEvento' => $this->txtEvento,
			'dataHoraEvento' => $this->dataHoraEvento,
			'idUsuario' => $this->idUsuario,
			'urlFotoEvento' => $this->urlFotoEvento
		));
	}
}

/*
$obj = new Categoria();

$obj->setIdCategoria(1);
$obj->setNomeCategoria('teste');
$obj->setDescrCategoria('novo teste');
$obj->setStatusCategoria();

$obj = new Categoria(1,'teste','novo teste','A');

*/
