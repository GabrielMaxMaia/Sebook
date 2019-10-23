<?php

require_once $ajuste.'src/util/Psr4AutoloaderClass.php';

define("_URLBASE_","http://localhost/sebook/");

// !! TODAS AS CONSTANTES FORAM DESATIVADAS !!

// define("_URLBASEMENU_","http://localhost/sebook/index.php?area=user");
// define("_URLBASEADM_","http://localhost/sebook/index.php?area=adm");

// http://localhost/sebook/index.php?area=user&pasta=menuHome&page=sebos

// Constantes para importar IMG, CSS e ICONS
// define("_CSSBASEUSER_","http://localhost/sebook/public/css/user.css");
// define("_CSSBASEADM_","http://localhost/sebook/public/css/adm.css");
// define("_IMGBASE_","http://localhost/sebook/public/img/");
// define("_ICONBASE_","http://localhost/sebook/public/icon/");

date_default_timezone_set('America/Sao_Paulo'); 

$autoLoading = new Util\Psr4AutoloaderClass();
$autoLoading->addNamespace("Util", $ajuste."src/util");
$autoLoading->addNamespace("Model", $ajuste."src/model");
$autoLoading->addNamespace("Controller", $ajuste."src/controller");
$autoLoading->addNamespace("PHPMailer\PHPMailer", $ajuste."vendor/PHPMailer/src");
$autoLoading->register();