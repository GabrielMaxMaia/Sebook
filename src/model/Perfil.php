<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Perfil
{
	//Atributos mapeando os campos da tabela
	private $idPerfil;
	private $nomePerfil;
	private $codStatusPerfil;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idPerfil = "", $nomePerfil = "", $codStatusPerfil = "")
	{
		$this->idPerfil = $idPerfil;
		$this->nomePerfil = $nomePerfil;
		$this->codStatusPerfil = $codStatusPerfil;
	}

	//getters e setters
	public function getIdPerfil(){
		return $this->idPerfil;
	}

	public function setIdPerfil($idPerfil){
		$this->idPerfil = $idPerfil;
	}

	public function getNomePerfil(){
		return $this->nomePerfil;
	}

	public function setNomePerfil($nomePerfil){
		$this->nomePerfil = $nomePerfil;
	}

	public function getCodStatusPerfil(){
		return $this->codStatusPerfil;
	}

	public function setCodStatusPerfil($codStatusPerfil){
		$this->codStatusPerfil = $codStatusPerfil;
	}

	//Método __toString()
	public function __toString()
	{
		return json_encode(array(
			'idPerfil' => $this->idPerfil,
			'nomePerfil' => $this->nomePerfil,
			'codStatusPerfil' => $this->codStatusPerfil
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
