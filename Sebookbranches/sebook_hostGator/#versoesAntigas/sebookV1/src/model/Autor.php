<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Autor
{
	//Atributos mapeando os campos da tabela
	private $idAutor;
	private $nomeAutor;
	private $codStatusAutor;
	private $idNacionalidade;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idAutor = "", $nomeAutor = "", $codStatusAutor = "", $idNacionalidade = "")
	{
		$this->idAutor = $idAutor;
		$this->nomeAutor = $nomeAutor;
		$this->codStatusAutor = $codStatusAutor;
		$this->idNacionalidade = $idNacionalidade;
	}

	//getters e setters
	public function getIdAutor(){
		return $this->idAutor;
	}

	public function setIdAutor($idAutor){
		$this->idAutor = $idAutor;
	}

	public function getNomeAutor(){
		return $this->nomeAutor;
	}

	public function setNomeAutor($nomeAutor){
		$this->nomeAutor = $nomeAutor;
	}

	public function getCodStatusAutor(){
		return $this->codStatusAutor;
	}

	public function setCodStatusAutor($codStatusAutor){
		$this->codStatusAutor = $codStatusAutor;
	}

	public function getIdNacionalidade(){
		return $this->idNacionalidade;
	}

	public function setIdNacionalidade($idNacionalidade){
		$this->idNacionalidade = $idNacionalidade;
	}

	//Método __toString()
	public function __toString()
	{
		return json_encode(array(
			'idAutor' => $this->idAutor,
			'nomeAutor' => $this->nomeAutor,
			'codStatusAutor' => $this->codStatusAutor,
			'idNacionalidade' => $this->idNacionalidade
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
