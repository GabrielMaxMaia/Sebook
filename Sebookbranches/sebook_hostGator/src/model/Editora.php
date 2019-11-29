<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Editora
{
	//Atributos mapeando os campos da tabela
	private $idEditora;
	private $nomeEditora;
	private $codStatusEditora;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idEditora = "", $nomeEditora = "", $codStatusEditora = "")
	{
		$this->idEditora = $idEditora;
		$this->nomeEditora = $nomeEditora;
		$this->codStatusEditora = $codStatusEditora;
	}

	//getters e setters
	public function getIdEditora()
	{
		return $this->idEditora;
	}

	public function setIdEditora($idEditora)
	{
		$this->idEditora = $idEditora;
	}

	public function getNomeEditora()
	{
		return $this->nomeEditora;
	}

	public function setNomeEditora($nomeEditora)
	{
		$this->nomeEditora = $nomeEditora;
	}

	public function getCodStatusEditora()
	{
		return $this->codStatusEditora;
	}

	public function setCodStatusEditora($codStatusEditora)
	{
		$this->codStatusEditora = $codStatusEditora;
	}

	//Método __toString()
	public function __toString()
	{
		return json_encode(array(
			'idEditora' => $this->idEditora,
			'nomeEditora' => $this->nomeEditora,
			'codStatusEditora' => $this->codStatusEditora
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
