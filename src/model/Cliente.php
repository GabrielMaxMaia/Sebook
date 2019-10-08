<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Cliente
{

	//Atributos mapeando os campos da tabela
	private $idUsuario;
	private $sexoCliente;
	private $complementoCliente;
	private $logradouroCliente;
	private $urlFotoCliente;
	private $numComplCliente;
	private $cpfCliente;
	private $cepCliente;
	private $nascimentoCliente;
	private $codStatusCliente;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idUsuario = "", $sexoCliente = "", $complementoCliente = "", $logradouroCliente = "", $urlFotoCliente = "", $numComplCliente = "", $cpfCliente = "", $cepCliente = "", $nascimentoCliente = "", $codStatusCliente = "")
	{
		$this->idUsuario = $idUsuario;
		$this->sexoCliente = $sexoCliente;
		$this->complementoCliente = $complementoCliente;
		$this->logradouroCliente = $logradouroCliente;
		$this->urlFotoCliente = $urlFotoCliente;
		$this->numComplCliente = $numComplCliente;
		$this->cpfCliente = $cpfCliente;
		$this->cepCliente = $cepCliente;
		$this->nascimentoCliente = $nascimentoCliente;
		$this->codStatusCliente = $codStatusCliente;
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

	public function getSexoCliente()
	{
		return $this->sexoCliente;
	}

	public function setSexoCliente($sexoCliente)
	{
		$this->sexoCliente = $sexoCliente;
	}

	public function getComplementoCliente()
	{
		return $this->complementoCliente;
	}

	public function setComplementoCliente($complementoCliente)
	{
		$this->complementoCliente = $complementoCliente;
	}

	public function getLogradouroCliente()
	{
		return $this->logradouroCliente;
	}

	public function setLogradouroCliente($logradouroCliente)
	{
		$this->logradouroCliente = $logradouroCliente;
	}

	public function getUrlFotoCliente()
	{
		return $this->urlFotoCliente;
	}

	public function setUrlFotoCliente($urlFotoCliente)
	{
		$this->urlFotoCliente = $urlFotoCliente;
	}

	public function getNumComplCliente()
	{
		return $this->numComplCliente;
	}

	public function setNumComplCliente($numComplCliente)
	{
		$this->numComplCliente = $numComplCliente;
	}

	public function getCpfCliente()
	{
		return $this->cpfCliente;
	}

	public function setCpfCliente($cpfCliente)
	{
		$this->cpfCliente = $cpfCliente;
	}

	public function getCepCliente()
	{
		return $this->cepCliente;
	}

	public function setCepCliente($cepCliente)
	{
		$this->cepCliente = $cepCliente;
	}

	public function getNascimentoCliente()
	{
		return $this->nascimentoCliente;
	}

	public function setNascimentoCliente($nascimentoCliente)
	{
		$this->nascimentoCliente = $nascimentoCliente;
	}

	public function getCodStatusCliente()
	{
		return $this->codStatusCliente;
	}

	public function setCodStatusCliente($codStatusCliente)
	{
		$this->codStatusCliente = $codStatusCliente;
	}

	//Método __toString()
	public function __toString()
	{
		return json_encode(array(
			'idUsuario' => $this->idUsuario,
			'sexoCliente' => $this->sexoCliente,
			'complementoCliente' => $this->complementoCliente,
			'logradouroCliente' => $this->logradouroCliente,
			'urlFotoCliente' => $this->urlFotoCliente,
			'numComplCliente' => $this->numComplCliente,
			'cpfCliente' => $this->cpfCliente,
			'cepCliente' => $this->cepCliente,
			'nascimentoCliente' => $this->nascimentoCliente,
			'codStatusCliente' => $this->codStatusCliente
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
