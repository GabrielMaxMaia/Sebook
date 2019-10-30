<?php

use Controller\ComentarioController;
use Util\Sql;

$objSql = new Util\Sql($conn);
$comentarioController = new Controller\ComentarioController($objSql);
$comentarioController->gravarAlterar();

//var_dump($$objSql);
?>

<section class="<?php echo $comentarioController->getLista(); ?>">
	<table>
		<caption>Lista de comentarios</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Status</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo $comentarioController->listarComentario();
			?>
		</tbody>
	</table>

	<section class="notificador">
		<?php
		//Estou usando a Url da lista que quero controlar
		$urlDoNotificador = "area/adm/cadastro/cadComentario";
		echo $comentarioController->exibirNotificador($urlDoNotificador);
		?>
	</section>

	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadComentario/add'" value="Novo">

</section>

<section class="<?php echo $comentarioController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Comentarios</h4>

		<input type="hidden" name="idPost" id="idPost" value="<?php echo $comentarioController->getComentarioDAO()->getIdPost(); ?>">

		<label>Id usuario</label>
		<input type="text" name="idUsuario" id="idUsuario" value="<?php echo $comentarioController->getComentarioDAO()->getIdUsuario(); ?>">

		<input type="hidden" name="idComentarioParente" id="idComentarioParente" value="<?php echo $comentarioController->getComentarioDAO()->getIdComentarioParente(); ?>">

		<input type="hidden" name="idComentario" id="idComentario" value="<?php echo $comentarioController->getComentarioDAO()->getIdComentario(); ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $comentarioController->getAcaoGET(); ?>">
		<label>Comentario</label>

		<!-- 
		<input class="grande" type="text" id="txtNome" name="txtNome" onblur="validarNomeComentario('". _URLBASE_ ."src/view/adm/cadastro/cadComentarioAjax.php', 'txtNomeCat='+this.value, 'txtNome')" value="<?php //echo $comentarioController->getComentarioDAO()->getNomeComentario(); 
																																																				?>"> -->

		<input class="grande" type="text" id="txtComentario" name="txtComentario" value="<?= $comentarioController->getComentarioDAO()->getTxtComentario(); ?>">

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>

	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadComentario">Voltar</a>
</section>