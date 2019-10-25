<!--Formulário de foto-->
<div class="img">
    <form action="<?= _URLBASE_ ?>src/view/user/pages/cadUpload.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoCliente">

        <input type="file" name="urlFotoCliente">

        <input class="button" type="submit" value="Carregar">
    </form>
    <iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
</div>
<?php
$src = "src='". _URLBASE_ ."{$clienteDAO->getUrlFotoCliente()}'";
?>
<div class="imgCadastro">
    <picture>
        <img id="imgAvatar" <?= $src ?> alt="Avatar" class="avatar">
    </picture>
</div>
<?php

?>