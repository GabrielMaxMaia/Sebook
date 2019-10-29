<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class SeboLivro
{

	//Atributos mapeando os campos da tabela
	private $idUsuario;
	private $isbnLivro;
	private $qtdEstoque;
	private $estadoLivro;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idUsuario = "", $isbnLivro = "", $qtdEstoque = "", $estadoLivro = "")
	{
		$this->idUsuario = $idUsuario;
		$this->isbnLivro = $isbnLivro;
		$this->qtdEstoque = $qtdEstoque;
		$this->estadoLivro = $estadoLivro;
	}

	//getters e setters
	public function getIdUsuario()
	{
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;
	}

	public function getIsbnLivro()
	{
		return $this->isbnLivro;
	}

	public function setIsbnLivro($isbnLivro)
	{
		$this->isbnLivro = $isbnLivro;
	}

	public function getQtdEstoque()
	{
		return $this->qtdEstoque;
	}

	public function setQtdEstoque($qtdEstoque)
	{
		$this->qtdEstoque = $qtdEstoque;
	}

	public function getEstadoLivro(){
		return $this->estadoLivro;
	}

	public function setEstadoLivro($estadoLivro){
		$this->estadoLivro = $estadoLivro;
	}

	//Método __toString()
	public function __toString()
	{
		return json_encode(array(
			'idUsuario' => $this->idUsuario,
			'isbnLivro' => $this->isbnLivro,
			'qtdEstoque' => $this->qtdEstoque,
			'estadoLivro' => $this->estadoLivro
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
