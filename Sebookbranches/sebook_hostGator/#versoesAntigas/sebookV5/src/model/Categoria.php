<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Categoria
{

    //Atributos mapeando os campos da tabela
    private $idCategoria;
    private $nomeCategoria;
    private $codStatusCategoria;

    //Método construtor auxiliar de criação de objetos
    public function __construct($idCategoria = "", $nomeCategoria = "", $codStatusCategoria = "")
    {
        $this->idCategoria = $idCategoria;
        $this->nomeCategoria = $nomeCategoria;
        $this->codStatusCategoria = $codStatusCategoria;
    }

    //getters e setters
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    public function getNomeCategoria()
    {
        return $this->nomeCategoria;
    }

    public function setNomeCategoria($nomeCategoria)
    {
        $this->nomeCategoria = $nomeCategoria;
    }

    public function getCodStatusCategoria()
    {
        return $this->codStatusCategoria;
    }

    public function setCodStatusCategoria($codStatusCategoria)
    {
        $this->codStatusCategoria = $codStatusCategoria;
    }

    //Método __toString()
    public function __toString()
    {
        return json_encode(array(
            'idCategoria' => $this->idCategoria,
            'nomeCategoria' => $this->nomeCategoria,
            'codStatusCategoria' => $this->codStatusCategoria
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
