<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class LivroAutor
{

	//Atributos mapeando os campos da tabela
	private $idAutor;
	private $isbnLivro;


	//Método construtor auxiliar de criação de objetos
	public function __construct($idAutor = "", $isbnLivro = "")
	{
		$this->idAutor = $idAutor;
		$this->isbnLivro = $isbnLivro;
	}

	//getters e setters
	public function getIdAutor()
	{
		return $this->idAutor;
	}

	public function setIdAutor($idAutor)
	{
		$this->idAutor = $idAutor;
	}

	public function getIsbnLivro()
	{
		return $this->isbnLivro;
	}

	public function setIsbnLivro($isbnLivro)
	{
		$this->isbnLivro = $isbnLivro;
	}

	//Método __toString()
	public function __toString()
	{
		return json_encode(array(
			'idAutor' => $this->idAutor,
			'isbnLivro' => $this->isbnLivro
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
