<?php

//este arquivo será executado via ajax na pasta de origem e não na rraiz do site como os outros arquivos

//Ajuste para chegar à raiz do site
$ajuste = "../../../../";

require_once "{$ajuste}config/config.php";

$conn = \Util\FabricaConexao::getConexao("{$ajuste}config/bd_mysql.ini");

//Recuperando dados do AJAX
$nomeCategoria = isset($_REQUEST['txtNomeCat']) ? $_REQUEST['txtNomeCat'] : null; 

//Criando conexao PHP MySql
$sql = new Util\Sql($conn);

//Criando objeto categoriaDAO já com o valor do nome a ser pesquisado
$categoriaDAO = new Model\CategoriaDAO($sql,0,$nomeCategoria);

//realizando a consulta
$result = $categoriaDAO->listarCategoriaNome();

print_r($result);

//print_r($result);


