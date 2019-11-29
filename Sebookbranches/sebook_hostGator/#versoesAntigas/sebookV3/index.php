<?php

error_reporting(1);

error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();

//Variável para definir o nivel de acesso de cada úsuario
$acessoUser = $_SESSION['userLogado']['acesso'] ?? "";
//Variavel para definir o id do Usuario logado
$idUser = $_SESSION['userLogado']['idUsuario'] ?? "";

$ajuste = "";
require_once './config/config.php';

$conn = \Util\FabricaConexao::getConexao('./config/bd_mysql.ini');

if (isset($_GET['area']) && $_GET['area'] == "adm") {

    require_once "./src/view/adm/index_adm.php";
} else if (isset($_GET['area']) && $_GET['area'] == "user") {
    require_once "./src/view/user/index_user.php";
} else {
    require_once "./src/view/user/index_user.php";
}
