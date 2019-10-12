<!--Formulário de foto-->
<div class="img">
    <form action="<?= _URLBASE_ ?>src/view/user/pages/cadUpload.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoCliente">

        <input type="file" name="urlFotoCliente">

        <input class="button" type="submit" value="Carregar">
    </form>
    <iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
</div>
<?php
// src="<?//= "http://localhost/sebook/" . $clienteDAO->getUrlFotoCliente() 
$src = "src='http://localhost/sebook/{$clienteDAO->getUrlFotoCliente()}'";
$srcPadrao = "src='http://localhost/sebook/public/img/imgFormPadrao/close.gif'";

// if (file_exists($src)) {
//     echo $src;
// } else if(!file_exists($src)){
//    echo $srcPadrao;
// } 

?>
<div class="imgCadastro">
    <picture>
        <img id="imgAvatar" <?= $src ?> alt="Avatar" class="avatar">
    </picture>
</div>
<?php

?>