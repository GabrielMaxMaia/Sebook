<?php

require_once $ajuste.'src/util/Psr4AutoloaderClass.php';

define("_URLBASE_","http://localhost/Sebook/");
define("_URLBASEADM_","http://localhost/Sebook/index.php?area=adm");
date_default_timezone_set('America/Sao_Paulo'); 

$autoLoading = new Util\Psr4AutoloaderClass();
$autoLoading->addNamespace("Util", $ajuste."src/util");
$autoLoading->addNamespace("Model", $ajuste."src/model");
$autoLoading->addNamespace("Controller", $ajuste."src/controller");
$autoLoading->addNamespace("PHPMailer\PHPMailer", $ajuste."vendor/PHPMailer/src");
$autoLoading->register();