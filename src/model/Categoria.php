<?php

namespace Model;

//Classe TO - Transfer Object - receber e enviar dados dentro do sistema ---> interface | BD

class Categoria {

    //Atributos mapeando os campos da tabela
    private $idCategoria;
    private $nomeCategoria;
    private $descrCategoria;
    private $statusCategoria;

    //Método construtor auxiliar de criação de objetos
    public function __construct($idCategoria = "", $nomeCategoria = "", $descrCategoria = "", $statusCategoria = "") {
        $this->idCategoria = $idCategoria;
        $this->nomeCategoria = $nomeCategoria;
        $this->descrCategoria = $descrCategoria;
        $this->statusCategoria = $statusCategoria;
    }

    //getters e setters
    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function getNomeCategoria() {
        return $this->nomeCategoria;
    }

    public function getDescrCategoria() {
        return $this->descrCategoria;
    }

    public function getStatusCategoria() {
        return $this->statusCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function setNomeCategoria($nomeCategoria) {
        $this->nomeCategoria = $nomeCategoria;
    }

    public function setDescrCategoria($descrCategoria) {
        $this->descrCategoria = $descrCategoria;
    }

    public function setStatusCategoria($statusCategoria) {
        $this->statusCategoria = $statusCategoria;
    }

    //Método __toString()
    public function __toString() {
        return json_encode(array(
            'idCategoria' => $this->idCategoria,
            'nomeCategoria' => $this->nomeCategoria,
            'descrCategoria' => $this->descrCategoria,
            'statusCategoria' => $this->statusCategoria
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