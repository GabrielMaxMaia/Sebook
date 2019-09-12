<?php
session_start();

$ajuste = "";
require_once './config/config.php';

$conn = \Util\FabricaConexao::getConexao('./config/bd_mysql.ini');

if (isset($_GET['area']) && $_GET['area'] == "adm") {

    require_once "./src/view/adm/index_adm.php";
    
} else if (isset($_GET['area']) && $_GET['area'] == "teste") {

    require_once "./teste.php";
    
} else {

    require_once "./src/view/front/index_front.php ";
}