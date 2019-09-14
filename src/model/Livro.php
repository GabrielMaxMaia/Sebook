<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Livro
{
    //Atributos mapeando os campos da tabela
    private $idLivro;
    private $isbnLivro;
    private $anoLivro;
    private $nomeLivro;
    private $sinopseLivro;
    private $codStatusLivro;
    private $idEditora;
    private $idCategoria;

    //Método construtor auxiliar de criação de objetos
    public function __construct($idLivro = "", $isbnLivro = "", $anoLivro = "", $nomeLivro = "", $idEditora = "", $codStatusLivro = "", $sinopseLivro = "", $idCategoria = "")
    {
        $this->idLivro = $idLivro;
        $this->isbnLivro = $isbnLivro;
        $this->anoLivro = $anoLivro;
        $this->nomeLivro = $nomeLivro;
        $this->codStatusLivro = $codStatusLivro;
        $this->idEditora = $idEditora;
        $this->idCategoria = $idCategoria;
        $this->sinopseLivro = $sinopseLivro;
    }

    //getters e setters
    public function getIdLivro()
    {
        return $this->idLivro;
    }

    public function setIdLivro($idLivro)
    {
        $this->idLivro = $idLivro;
    }

    public function getIsbnLivro()
    {
        return $this->isbnLivro;
    }

    public function setIsbnLivro($isbnLivro)
    {
        $this->isbnLivro = $isbnLivro;
    }

    public function getAnoLivro()
    {
        return $this->anoLivro;
    }

    public function setAnoLivro($anoLivro)
    {
        $this->anoLivro = $anoLivro;
    }

    public function getNomeLivro()
    {
        return $this->nomeLivro;
    }

    public function setNomeLivro($nomeLivro)
    {
        $this->nomeLivro = $nomeLivro;
    }

    public function getSinopseLivro()
    {
        return $this->sinopseLivro;
    }

    public function setSinopseLivro($sinopseLivro)
    {
        $this->sinopseLivro = $sinopseLivro;
    }

    public function getCodStatusLivro()
    {
        return $this->codStatusLivro;
    }

    public function setCodStatusLivro($codStatusLivro)
    {
        $this->codStatusLivro = $codStatusLivro;
    }

    public function getIdEditora()
    {
        return $this->idEditora;
    }

    public function setIdEditora($idEditora)
    {
        $this->idEditora = $idEditora;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    //Método __toString()
    public function __toString()
    {
        return json_encode(array(
            'idLivro' => $this->idLivro,
            'isbnLivro' => $this->isbnLivro,
            'anoLivro' => $this->anoLivro,
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
