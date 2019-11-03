<!--Formulário de foto-->
<div class="img">
    <form action="<?= _URLBASE_ ?>src/view/user/pages/cadUpload.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFoto">

        <input type="file" name="urlFoto">

        <input class="button" type="submit" value="Carregar">
    </form>
    <iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
</div>
<?php
$src = "src='". _URLBASE_ . "{$usuarioDAO->getUrlFoto()}'";
?>
<div class="imgCadastro">
    <picture>
        <img id="imgAvatar" <?= $src ?> alt="Avatar" class="avatar">
    </picture>
</div>