<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Livro
{
    //Atributos mapeando os campos da tabela
    private $isbnLivro;
    private $idAutor;
    private $anoLivro;
    private $urlFotoLivro;
    private $nomeLivro;
    private $sinopseLivro;
    private $codStatusLivro;
    private $idEditora;
    private $idCategoria;

    //Método construtor auxiliar de criação de objetos
    public function __construct($isbnLivro = "", $idAutor = "", $anoLivro = "", $urlFotoLivro= "",$nomeLivro = "", $idEditora = "", $codStatusLivro = "", $sinopseLivro = "", $idCategoria = "")
    {
        $this->isbnLivro = $isbnLivro;
        $this->idAutor = $idAutor;
        $this->anoLivro = $anoLivro;
        $this->urlFotoLivro = $urlFotoLivro;
        $this->nomeLivro = $nomeLivro;
        $this->codStatusLivro = $codStatusLivro;
        $this->idEditora = $idEditora;
        $this->idCategoria = $idCategoria;
        $this->sinopseLivro = $sinopseLivro;
    }

    //getters e setters
    public function getIsbnLivro(){
		return $this->isbnLivro;
	}

	public function setIsbnLivro($isbnLivro){
		$this->isbnLivro = $isbnLivro;
	}

	public function getIdAutor(){
		return $this->idAutor;
	}

	public function setIdAutor($idAutor){
		$this->idAutor = $idAutor;
	}

	public function getAnoLivro(){
		return $this->anoLivro;
	}

	public function setAnoLivro($anoLivro){
		$this->anoLivro = $anoLivro;
	}

	public function getUrlFotoLivro(){
		return $this->urlFotoLivro;
	}

	public function setUrlFotoLivro($urlFotoLivro){
		$this->urlFotoLivro = $urlFotoLivro;
	}

	public function getNomeLivro(){
		return $this->nomeLivro;
	}

	public function setNomeLivro($nomeLivro){
		$this->nomeLivro = $nomeLivro;
	}

	public function getSinopseLivro(){
		return $this->sinopseLivro;
	}

	public function setSinopseLivro($sinopseLivro){
		$this->sinopseLivro = $sinopseLivro;
	}

	public function getCodStatusLivro(){
		return $this->codStatusLivro;
	}

	public function setCodStatusLivro($codStatusLivro){
		$this->codStatusLivro = $codStatusLivro;
	}

	public function getIdEditora(){
		return $this->idEditora;
	}

	public function setIdEditora($idEditora){
		$this->idEditora = $idEditora;
	}

	public function getIdCategoria(){
		return $this->idCategoria;
	}

	public function setIdCategoria($idCategoria){
		$this->idCategoria = $idCategoria;
	}

    //Método __toString()
    public function __toString()
    {
        return json_encode(array(
            'isbnLivro' => $this->isbnLivro,
            'idAutor' => $this->idAutor,
            'anoLivro' => $this->anoLivro,
            'urlFotoLivro' => $this->urlFotoLivro,
            'nomeLivro' => $this->nomeLivro,
            'sinopseLivro' => $this->sinopseLivro,
            'codStatusLivro' => $this->codStatusLivro,
            'idEditora' => $this->idEditora,
            'idCategoria' => $this->idCategoria
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
