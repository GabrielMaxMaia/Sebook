<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Postagem
{
	//Atributos mapeando os campos da tabela
	private $idPostagem;
	private $tituloPostagem;
	private $datahoraPostagem;
	private $linkPostagem;
	private $urlFotoPostagem;
	private $codStatusPostagem;
	private $txtPostagem;
	private $idUsuario;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idPostagem = "", $tituloPostagem = "", $datahoraPostagem = "", $linkPostagem = "", $urlFotoPostagem = "", $codStatusPostagem = "", $txtPostagem = "", $idUsuario = "")
	{
		$this->idPostagem = $idPostagem;
		$this->tituloPostagem = $tituloPostagem;
		$this->datahoraPostagem = $datahoraPostagem;
		$this->linkPostagem = $linkPostagem;
		$this->urlFotoPostagem = $urlFotoPostagem;
		$this->codStatusPostagem = $codStatusPostagem;
		$this->txtPostagem = $txtPostagem;
		$this->idUsuario = $idUsuario;
	}

	//getters e setters
	public function getIdPostagem()
	{
		return $this->idPostagem;
	}

	public function setIdPostagem($idPostagem)
	{
		$this->idPostagem = $idPostagem;
	}

	public function getTituloPostagem()
	{
		return $this->tituloPostagem;
	}

	public function setTituloPostagem($tituloPostagem)
	{
		$this->tituloPostagem = $tituloPostagem;
	}

	public function getDatahoraPostagem()
	{
		return $this->datahoraPostagem;
	}

	public function setDatahoraPostagem($datahoraPostagem)
	{
		$this->datahoraPostagem = $datahoraPostagem;
	}

	public function getLinkPostagem()
	{
		return $this->linkPostagem;
	}

	public function setLinkPostagem($linkPostagem)
	{
		$this->linkPostagem = $linkPostagem;
	}

	public function getUrlFotoPostagem()
	{
		return $this->urlFotoPostagem;
	}

	public function setUrlFotoPostagem($urlFotoPostagem)
	{
		$this->urlFotoPostagem = $urlFotoPostagem;
	}

	public function getCodStatusPostagem()
	{
		return $this->codStatusPostagem;
	}

	public function setCodStatusPostagem($codStatusPostagem)
	{
		$this->codStatusPostagem = $codStatusPostagem;
	}

	public function getTxtPostagem()
	{
		return $this->txtPostagem;
	}

	public function setTxtPostagem($txtPostagem)
	{
		$this->txtPostagem = $txtPostagem;
	}

	public function getIdUsuario()
	{
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario)
	{
		$this->idUsuario = $idUsuario;
	}

	//Método __toString()
	public function __toString()
	{
		return json_encode(array(
			'idPostagem' => $this->idPostagem,
			'tituloPostagem' => $this->tituloPostagem,
			'txtPostagem' => $this->txtPostagem,
			'datahoraPostagem' => $this->datahoraPostagem,
			'linkPostagem' => $this->linkPostagem,
			'urlFotoPostagem' => $this->urlFotoPostagem,
			'codStatusPostagem' => $this->codStatusPostagem,
			'idUsuario' => $this->idUsuario,
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
