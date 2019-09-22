<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Cliente
{

	//Atributos mapeando os campos da tabela
	private $idUsuario;
	private $sexoCliente;
	private $complEndCliente;
	private $logradouroCliente;
	private $urlFotoCliente;
	private $numComplCliente;
	private $cpfCliente;
	private $cepCliente;
	private $dtNascCliente;
	private $codStatusCliente;

	//Método construtor auxiliar de criação de objetos
	public function __construct($idUsuario = "", $sexoCliente = "", $complEndCliente = "", $logradouroCliente = "", $urlFotoCliente = "", $numComplCliente = "", $cpfCliente = "", $cepCliente = "", $dtNascCliente = "", $codStatusCliente = "")
	{
		$this->idUsuario = $idUsuario;
		$this->sexoCliente = $sexoCliente;
		$this->complEndCliente = $complEndCliente;
		$this->logradouroCliente = $logradouroCliente;
		$this->urlFotoCliente = $urlFotoCliente;
		$this->numComplCliente = $numComplCliente;
		$this->cpfCliente = $cpfCliente;
		$this->cepCliente = $cepCliente;
		$this->dtNascCliente = $dtNascCliente;
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

	public function getComplEndCliente()
	{
		return $this->complEndCliente;
	}

	public function setComplEndCliente($complEndCliente)
	{
		$this->complEndCliente = $complEndCliente;
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

	public function getDtNascCliente()
	{
		return $this->dtNascCliente;
	}

	public function setDtNascCliente($dtNascCliente)
	{
		$this->dtNascCliente = $dtNascCliente;
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
			'complEndCliente' => $this->complEndCliente,
			'logradouroCliente' => $this->logradouroCliente,
			'urlFotoCliente' => $this->urlFotoCliente,
			'numComplCliente' => $this->numComplCliente,
			'cpfCliente' => $this->cpfCliente,
			'cepCliente' => $this->cepCliente,
			'dtNascCliente' => $this->dtNascCliente,
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
