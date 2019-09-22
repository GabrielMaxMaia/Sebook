<?php

$ajuste = "";
require_once './config/config.php';

$conn = \Util\FabricaConexao::getConexao('./config/bd_mysql.ini');


echo "<h2>Teste classe FuncionarioDAO</h2>";


// echo util\Bcrypt::hash('1234');

echo Util\Bcrypt::hash('1234');

echo "<br>";

$sql = new Util\Sql($conn);

$admDAO = new Model\AdmDAO($sql);

$x = $admDAO->autenticarAdm("marcos_sco@outlook.com", '1234');

var_dump($x);

