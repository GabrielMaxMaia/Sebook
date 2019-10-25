<!--Formulário de foto-->
<div class="img">
    <form action="<?= _URLBASE_ ?>src/view/user/pages/cadUploadPerfilSebo.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoSebo">

        <input type="file" name="urlFotoSebo">

        <input class="button" type="submit" value="Carregar">
    </form>
    <iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
</div>
<?php
$src = "src='http://localhost/sebook/{$seboDAO->getUrlFotoSebo()}'";
?>
<div class="imgCadastro">
    <picture>
        <img id="imgAvatar" <?= $src ?> alt="Avatar" class="avatar"'>
	</picture>
</div>
<?php
?>