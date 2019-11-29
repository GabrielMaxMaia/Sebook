<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Nacionalidade
{

	//Atributos mapeando os campos da tabela
	private $idNacionalidade;
	private $nomeNacionalidade;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idNacionalidade = "", $nomeNacionalidade = "")
	{
		$this->idNacionalidade = $idNacionalidade;
		$this->nomeNacionalidade = $nomeNacionalidade;
	}

	//getters e setters
	public function getIdNacionalidade()
	{
		return $this->idNacionalidade;
	}

	public function setIdNacionalidade($idNacionalidade)
	{
		$this->idNacionalidade = $idNacionalidade;
	}

	public function getNomeNacionalidade()
	{
		return $this->nomeNacionalidade;
	}

	public function setNomeNacionalidade($nomeNacionalidade)
	{
		$this->nomeNacionalidade = $nomeNacionalidade;
	}

	//Método __toString()
	public function __toString()
	{
		return json_encode(array(
			'idNacionalidade' => $this->idNacionalidade,
			'nomeNacionalidade' => $this->nomeNacionalidade
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
