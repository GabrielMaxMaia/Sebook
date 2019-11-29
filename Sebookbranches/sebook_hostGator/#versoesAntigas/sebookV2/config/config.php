<?php

require_once $ajuste.'src/util/Psr4AutoloaderClass.php';

// Todos os links estão usando apenas a _URLBASE_ como constante

define("_URLBASE_","https://sebook.com.br/");

// define("_URLBASEMENU_","http://sebook.com.br/index.php?area=user");
// define("_URLBASEADM_","http://sebook.com.br/index.php?area=adm");

//http://localhost/sebook/index.php?area=user&pasta=menuHome&page=sebos

//Constantes para importar IMG, CSS e ICONS
// define("_CSSBASEUSER_","http://sebook.com.br/public/css/usuario.css");
// define("_CSSBASEADM_","http://sebook.com.br/public/css/adm.css");
// define("_IMGBASE_","http://sebook.com.br/public/img/");
// define("_ICONBASE_","http://sebook.com.br/public/icon/");

date_default_timezone_set('America/Sao_Paulo'); 

$autoLoading = new Util\Psr4AutoloaderClass();
$autoLoading->addNamespace("Util", $ajuste."src/util");
$autoLoading->addNamespace("Model", $ajuste."src/model");
$autoLoading->addNamespace("Controller", $ajuste."src/controller");
$autoLoading->addNamespace("PHPMailer\PHPMailer", $ajuste."vendor/PHPMailer/src");
$autoLoading->register();