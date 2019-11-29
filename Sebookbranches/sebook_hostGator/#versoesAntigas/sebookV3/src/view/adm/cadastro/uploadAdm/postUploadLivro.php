<?php
$ajuste = "../../../../../";
require_once '../../../../../config/config.php';

use util\Upload;
//Upload
$up = new Util\Upload(array(
	0 => "image/png",  1 => "image/tiff",
	2 => "image/jpeg", 3 => "image/bmp", 4 => "image/gif"
), "/public/img/imgLivro/");

$result = $up->realizarUpload("urlFotoLivro");

if ($result === true) {
	$arq = $up->getArqUpload();
	$arquivo = "public/img/imgLivro/" . $arq["name"];
} else {
	$arquivo = -1;
}

// var_dump($arquivo);

echo "<script>parent.resultadoUpload('$arquivo',$result) </script>";
//Upload