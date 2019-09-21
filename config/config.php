<?php

require_once $ajuste.'src/util/Psr4AutoloaderClass.php';

define("_URLBASE_","http://localhost/sebook/");
define("_URLBASEADM_","http://localhost/sebook/index.php?area=adm");
define("_CSSBASEUSER_","http://localhost/sebook/public/css/usuario.css");
define("_IMGBASE_","http://localhost/sebook/public/img/");
define("_ICONBASE_","http://localhost/sebook/public/icon/");
date_default_timezone_set('America/Sao_Paulo'); 

$autoLoading = new Util\Psr4AutoloaderClass();
$autoLoading->addNamespace("Util", $ajuste."src/util");
$autoLoading->addNamespace("Model", $ajuste."src/model");
$autoLoading->addNamespace("Controller", $ajuste."src/controller");
$autoLoading->addNamespace("PHPMailer\PHPMailer", $ajuste."vendor/PHPMailer/src");
$autoLoading->register();