<?php

use Controller\PostagemController;

$objSql = new Util\Sql($conn);
$postagemController = new Controller\PostagemController($objSql);
$postagemController->gravarAlterar();

//Caso postagem ainda n���o ter foto seta a foto padr���o
if ($postagemController->getPostagemDAO()->getUrlFotoPostagem() == "") {
	$postagemController->getPostagemDAO()->setUrlFotoPostagem('public/img/imgPost/imgPadrao/padrao.jpg');
}

?>

<section class="<?php echo $postagemController->getLista(); ?>">

	<table>
		<caption>Listar Publicações</caption>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo $postagemController->listarPostagem();
			?>
		</tbody>
	</table>


	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadPostagem/add'" value="Novo">

	<section class="notificador">
		<?php
		//Estou usando a Url da lista que quero controlar
		$urlDoNotificador = "area/adm/cadastro/cadPostagem";
		echo $postagemController->exibirNotificador($urlDoNotificador);
		?>
	</section>

</section>

<section class="<?php echo $postagemController->getFormulario(); ?>">

	<header class="headerPagina">
		<h1>Cadastro de Postagems</h1>
	</header>

	<form method="post" action="">

		<input type="hidden" name="txtId" id="txtId" value="<?php echo $postagemController->getPostagemDAO()->getIdPostagem(); ?>">

		<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $postagemController->getPostagemDAO()->getIdUsuario(); ?>">

		<input type="hidden" name="dataPost" id="dataPost" value="<?= date('Y-m-d H:i:s') ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $postagemController->getAcaoGET(); ?>">

		<label>Titulo</label>
		<input class="grande" type="text" name="txtTitulo" value="<?= $postagemController->getPostagemDAO()->getTituloPostagem() ?>">
		<br>
		<label>Post</label>
		<input class="grande" type="text" name="txtPostagem" value="<?= $postagemController->getPostagemDAO()->getTxtPostagem() ?>">
		<br>

		<input type="hidden" name="txtImg" id="txtImg" value="<?= $postagemController->getPostagemDAO()->getUrlFotoPostagem() ?>">

		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>

	<div class="img">
		<form action="<?= _URLBASE_ ?>src/view/adm/cadastro/uploadAdm/postUploadImg.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoPost">

			<input type="file" name="urlFotoPost">

			<input class="button" type="submit" value="Carregar">
		</form>
		<iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
	</div>
	<div class="imgCadastro">
		<picture>
			<img id="imgAvatar" src="<?= _URLBASE_ . $postagemController->getPostagemDAO()->getUrlFotoPostagem() ?>" alt="Avatar" class="avatar">
		</picture>
	</div>



	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadPostagem">Voltar</a>
</section>