<?php

require_once $ajuste.'src/util/Psr4AutoloaderClass.php';

define("_URLBASE_","https://sebook.com.br/home1/sebook24/public_html/src/");

define("_URLBASEMENU_","https://sebook.com.br/index.php?area=user");
define("_URLBASEADM_","https://sebook.com.br/index.php?area=adm");

//http://sebook/index.php?area=user&pasta=menuHome&page=sebos

//Constantes para importar IMG, CSS e ICONS
define("_CSSBASEUSER_","https://sebook.com.br/public/css/usuario.css");
define("_CSSBASEADM_","https://sebook.com.br/public/css/adm.css");
define("_IMGBASE_","https://sebook.com.br/public/img/");
define("_ICONBASE_","https://sebook.com.br/public/icon/");

date_default_timezone_set('America/Sao_Paulo'); 

$autoLoading = new Util\Psr4AutoloaderClass();
$autoLoading->addNamespace("Util", $ajuste."src/util");
$autoLoading->addNamespace("Model", $ajuste."src/model");
$autoLoading->addNamespace("Controller", $ajuste."src/controller");
$autoLoading->addNamespace("PHPMailer\PHPMailer", $ajuste."vendor/PHPMailer/src");
$autoLoading->register();