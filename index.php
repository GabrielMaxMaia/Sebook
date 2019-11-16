<?php
session_start();

//Variável para definir o nivel de acesso de cada úsuario
$acessoUser = $_SESSION['userLogado']['acesso'] ?? "";
//Variavel para definir o id do Usuario logado
$idUser = $_SESSION['userLogado']['idUsuario'] ?? "";

$ajuste = "";
require_once './config/config.php';

$conn = \Util\FabricaConexao::getConexao('./config/bd_mysql.ini');

//Autentificação para logar
$sql = new \Util\Sql($conn);
$autenticadorController = new \Controller\AutentificadorController($sql);
$autenticadorController->efetuarLogin();
$autenticadorController->efetuarLogOut();

if (isset($_GET['area']) && $_GET['area'] == "adm") {

    require_once "./src/view/adm/index_adm.php";
} else if (isset($_GET['area']) && $_GET['area'] == "user") {
    require_once "./src/view/user/index_user.php";
} else {
    require_once "./src/view/user/index_user.php";
}
