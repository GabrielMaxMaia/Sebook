<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Usuario
{

    //Atributos mapeando os campos da tabela
    private $idUsuario;
    private $nomeUsuario;
    private $sobrenomeUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $codStatusUsuario;
    private $idPerfil;

    //Método construtor auxiliar de criação de objetos
    public function __construct($idUsuario = "", $nomeUsuario = "", $sobrenomeUsuario = "",$emailUsuario = "" , $senhaUsuario = "", $codStatusUsuario = "", $idPerfil = "")
    {
        $this->idUsuario = $idUsuario;
        $this->nomeUsuario = $nomeUsuario;
        $this->sobrenomeUsuario = $sobrenomeUsuario;
        $this->emailUsuario = $emailUsuario;
        $this->senhaUsuario = $senhaUsuario;
        $this->codStatusUsuario = $codStatusUsuario;
        $this->idPerfil = $idPerfil;
    }

    //getters e setters
    public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getNomeUsuario(){
		return $this->nomeUsuario;
	}

	public function setNomeUsuario($nomeUsuario){
		$this->nomeUsuario = $nomeUsuario;
	}

	public function getSobrenomeUsuario(){
		return $this->sobrenomeUsuario;
	}

	public function setSobrenomeUsuario($sobrenomeUsuario){
		$this->sobrenomeUsuario = $sobrenomeUsuario;
	}

	public function getEmailUsuario(){
		return $this->emailUsuario;
	}

	public function setEmailUsuario($emailUsuario){
		$this->emailUsuario = $emailUsuario;
	}

	public function getSenhaUsuario(){
		return $this->senhaUsuario;
	}

	public function setSenhaUsuario($senhaUsuario){
		$this->senhaUsuario = $senhaUsuario;
	}

	public function getCodStatusUsuario(){
		return $this->codStatusUsuario;
	}

	public function setCodStatusUsuario($codStatusUsuario){
		$this->codStatusUsuario = $codStatusUsuario;
	}

	public function getIdPerfil(){
		return $this->idPerfil;
	}

	public function setIdPerfil($idPerfil){
		$this->idPerfil = $idPerfil;
	}

    //Método __toString()
    public function __toString()
    {
        return json_encode(array(
            'idUsuario' => $this->idUsuario,
            'nomeUsuario' => $this->nomeUsuario,
            'sobrenomeUsuario' => $this->sobrenomeUsuario,
            'emailUsuario' => $this->emailUsuario,
            'senhaUsuario' => $this->senhaUsuario,
            'codStatusUsuario' => $this->codStatusUsuario,
            'idPerfil' => $this->idPerfil
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
