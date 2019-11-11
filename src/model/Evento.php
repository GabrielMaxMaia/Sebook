<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Evento
{
	//Atributos mapeando os campos da tabela
	private $idEvento;
	private $nomeEvento;
	private $txtEvento;
	private $dataEvento;
	private $horaEvento;
	private $localEvento;
	private $cidadeEvento;
	private $idUsuario;
	private $urlFotoEvento;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idEvento = "", $nomeEvento = "", $txtEvento = "", $dataEvento = "", $horaEvento = "", $localEvento = "", $cidadeEvento = "",$idUsuario = "", $urlFotoEvento = "")
	{
		$this->idEvento = $idEvento;
		$this->nomeEvento = $nomeEvento;
		$this->txtEvento = $txtEvento;
		$this->dataEvento = $dataEvento;
		$this->horaEvento = $horaEvento;
		$this->localEvento = $localEvento;
		$this->cidadeEvento = $cidadeEvento;
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

	public function getDataEvento(){
		return $this->dataEvento;
	}

	public function setDataEvento($dataEvento){
		$this->dataEvento = $dataEvento;
	}

	public function getHoraEvento(){
		return $this->horaEvento;
	}

	public function setHoraEvento($horaEvento){
		$this->horaEvento = $horaEvento;
	}

	public function getLocalEvento(){
		return $this->localEvento;
	}

	public function setLocalEvento($localEvento){
		$this->localEvento = $localEvento;
	}

	public function getCidadeEvento(){
		return $this->cidadeEvento;
	}

	public function setCidadeEvento($cidadeEvento){
		$this->cidadeEvento = $cidadeEvento;
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
			'dataEvento' => $this->dataEvento,
			'horaEvento' => $this->horaEvento,
			'localEvento' => $this->localEvento,
			'cidadeEvento' => $this->cidadeEvento,
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
