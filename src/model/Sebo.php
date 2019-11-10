<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Sebo {

    //Atributos mapeando os campos da tabela
    private $idUsuario;
    private $razaoSebo;
    private $nomeFantasia;
	private $cnpjSebo;
	private $latitudeSebo;
	private $longitudeSebo;
	private $cidadeSebo;
    private $numEndSebo;
    private $complEndSebo;
    private $logradouroSebo;
    private $cepEndSebo;
    private $numTelSebo;
    private $celular1Sebo;
    private $celular2Sebo;
    private $inscEstadualSebo;
    private $urlSiteSebo;
    private $codStatusSebo;

    //Método construtor auxiliar de criação de objetos
    public function __construct($idUsuario = "", $razaoSebo = "",
					$nomeFantasia = "", $cnpjSebo = "", $cidadeSebo = "",
					$latitudeSebo = "", $longitudeSebo = "", $numEndSebo = "",
					$complEndSebo = "", $logradouroSebo = "", $cepEndSebo = "",
					$numTelSebo = "", $celular1Sebo = "", $celular2Sebo = "",
					$inscEstadualSebo = "", $urlSiteSebo = "", $codStatusSebo = "") {
		$this->idUsuario = $idUsuario;
        $this->razaoSebo = $razaoSebo;
        $this->nomeFantasia = $nomeFantasia;
		$this->cnpjSebo = $cnpjSebo;
		$this->latitudeSebo = $latitudeSebo;
		$this->longitudeSebo = $longitudeSebo;
        $this->cidadeSebo = $cidadeSebo;
        $this->numEndSebo = $numEndSebo;
        $this->complEndSebo = $complEndSebo;
        $this->logradouroSebo = $logradouroSebo;
        $this->cepEndSebo = $cepEndSebo;
        $this->numTelSebo = $numTelSebo;
        $this->celular1Sebo = $celular1Sebo;
        $this->celular2Sebo = $celular2Sebo;
        $this->inscEstadualSebo = $inscEstadualSebo;
        $this->urlSiteSebo = $urlSiteSebo;
        $this->codStatusSebo = $codStatusSebo;  
    }

    //getters e setters
    public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getRazaoSebo(){
		return $this->razaoSebo;
	}

	public function setRazaoSebo($razaoSebo){
		$this->razaoSebo = $razaoSebo;
	}

	public function getNomeFantasia(){
		return $this->nomeFantasia;
	}

	public function setNomeFantasia($nomeFantasia){
		$this->nomeFantasia = $nomeFantasia;
	}

	public function getCnpjSebo(){
		return $this->cnpjSebo;
	}

	public function setCnpjSebo($cnpjSebo){
		$this->cnpjSebo = $cnpjSebo;
	}

	public function getLatitudeSebo(){
		return $this->latitudeSebo;
	}

	public function setLatitudeSebo($latitudeSebo){
		$this->latitudeSebo = $latitudeSebo;
	}

	public function getLongitudeSebo(){
		return $this->longitudeSebo;
	}

	public function setLongitudeSebo($logitudeSebo){
		$this->longitudeSebo = $longitudeSebo;
	}

	public function getCidadeSebo(){
		return $this->cidadeSebo;
	}

	public function setCidadeSebo($cidadeSebo){
		$this->cidadeSebo = $cidadeSebo;
	}

	public function getNumEndSebo(){
		return $this->numEndSebo;
	}

	public function setNumEndSebo($numEndSebo){
		$this->numEndSebo = $numEndSebo;
	}

	public function getComplEndSebo(){
		return $this->complEndSebo;
	}

	public function setComplEndSebo($complEndSebo){
		$this->complEndSebo = $complEndSebo;
	}

	public function getLogradouroSebo(){
		return $this->logradouroSebo;
	}

	public function setLogradouroSebo($logradouroSebo){
		$this->logradouroSebo = $logradouroSebo;
	}

	public function getCepEndSebo(){
		return $this->cepEndSebo;
	}

	public function setCepEndSebo($cepEndSebo){
		$this->cepEndSebo = $cepEndSebo;
	}

	public function getNumTelSebo(){
		return $this->numTelSebo;
	}

	public function setNumTelSebo($numTelSebo){
		$this->numTelSebo = $numTelSebo;
	}

	public function getCelular1Sebo(){
		return $this->celular1Sebo;
	}

	public function setCelular1Sebo($celular1Sebo){
		$this->celular1Sebo = $celular1Sebo;
	}

	public function getCelular2Sebo(){
		return $this->celular2Sebo;
	}

	public function setCelular2Sebo($celular2Sebo){
		$this->celular2Sebo = $celular2Sebo;
	}

	public function getInscEstadualSebo(){
		return $this->inscEstadualSebo;
	}

	public function setInscEstadualSebo($inscEstadualSebo){
		$this->inscEstadualSebo = $inscEstadualSebo;
	}

	public function getUrlSiteSebo(){
		return $this->urlSiteSebo;
	}

	public function setUrlSiteSebo($urlSiteSebo){
		$this->urlSiteSebo = $urlSiteSebo;
	}

	public function getCodStatusSebo(){
		return $this->codStatusSebo;
	}

	public function setCodStatusSebo($codStatusSebo){
		$this->codStatusSebo = $codStatusSebo;
	}

    //Método __toString()
    public function __toString() {
        return json_encode(array(
            'idUsuario' => $this->idUsuario,
            'razaoSebo' => $this->razaoSebo,
            'nomeFantasia' => $this->nomeFantasia,
			'cnpjSebo' => $this->cnpjSebo,
			'latitudeSebo' => $this->latitudeSebo,
			'logitudeSebo' => $this->logitudeSebo,
            'numEndSebo' => $this->numEndSebo,
            'cidadeSebo' => $this->cidadeSebo,
            'complEndSebo' => $this->complEndSebo,
            'logradouroSebo' => $this->logradouroSebo,
            'cepEndSebo' => $this->cepEndSebo,
            'numTelSebo' => $this->numTelSebo,
            'celular1Sebo' => $this->celular1Sebo,
            'celular2Sebo' => $this->celular2Sebo,
            'inscEstadualSebo' => $this->inscEstadualSebo,
            'urlSiteSebo' => $this->urlSiteSebo,
            'codStatusSebo' => $this->codStatusSebo
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