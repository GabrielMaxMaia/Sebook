<?php

use Controller\EventoController;

$objSql = new Util\Sql($conn);
$eventoController = new Controller\EventoController($objSql);
$eventoController->gravarAlterar();

//Caso evento ainda não ter foto seta a foto padrão
if($eventoController->getEventoDAO()->getUrlFotoEvento() == ""){
	$eventoController->getEventoDAO()->setUrlFotoEvento('public/img/imgEvento/imgPadrao/imgEventopadrao.jpg');
}

//$postagemDAO = new Model\PostagemDAO();
//$frontController = new Controller\FrontController($postagemDAO);

?>

<section class="<?php echo $eventoController->getLista(); ?>">

	<h2>Eventos</h2>
	<tbody>
		<?php
			echo $eventoController->listarEvento();
		?>
		<section class="notificador">
			<?php
			//Estou usando a Url da lista que quero controlar
			$urlDoNotificador = "area/adm/cadastro/cadEvento";
			echo $eventoController->exibirNotificador($urlDoNotificador);
			?>
		</section>

	</tbody>
	</table>
	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadEvento/add'" value="Novo">

</section>

<section class="<?php echo $eventoController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Eventos</h4>

		<label for="txtId">Id Evento</label>
		<input type="text" name="txtId" id="txtId" value="<?php echo $eventoController->getEventoDAO()->getIdEvento() ?>">
		<br>

		<label for="idUsuario">Id Usuario</label>
		<input type="text" name="idUsuario" id="idUsuario" value="<?php echo $eventoController->getEventoDAO()->getIdUsuario(); ?>">

		<!-- <input type="text" name="dataHoraEvento" id="dataHoraEvento" value="<?//= date('Y-m-d H:i:s') ?>"> -->
		
		<!-- <input type="hidden" name="dataPost" id="dataPost" value="<?php //echo $eventoController->getEventoDAO()->getDatahoraPostagem();?>"> -->

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $eventoController->getAcaoGET(); ?>">

		<!-- <input class="grande" type="text" id="txtNome" name="txtNome" onblur="validarNomeUsuario('". _URLBASE_ ."src/view/adm/cadastro/cadUsuarioAjax.php', 'txtNomeCat='+this.value, 'txtNome')"
		 value="<?php //echo $eventoController->getEventoDAO()->getNomeUsuario(); 
				?>"> -->
		<br>
		<label>Titulo</label>
		<input class="grande" type="text" name="txtNome" value="<?= $eventoController->getEventoDAO()->getNomeEvento() ?>">
		<br>
		<label>Post</label>
		<input class="grande" type="text" name="txtEvento" value="<?= $eventoController->getEventoDAO()->getTxtEvento() ?>">
		<br>
		
		<label>Data</label>
		<input class="grande" type="date" name="dataEvento" id="dataEvento" value="<?= $eventoController->getEventoDAO()->getDataEvento() ?>">
		<br>
		<label>Hora</label>
		<input class="grande" type="time" name="horaEvento" id="horaEvento" min="00:00" max="23:59" value="<?= $eventoController->getEventoDAO()->getHoraEvento() ?>">
		<br>

		<label>Local</label>
		<input class="grande" type="text" name="localEvento" id="localEvento" min="00:00" max="23:59" value="<?= $eventoController->getEventoDAO()->getLocalEvento() ?>">
		<br>

		<label>Cidade</label>
		<input class="grande" type="text" name="cidadeEvento" id="cidadeEvento" min="00:00" max="23:59" value="<?= $eventoController->getEventoDAO()->getCidadeEvento() ?>">
		<br>

		<input type="hidden" name="txtImg" id="txtImg" value="<?= $eventoController->getEventoDAO()->getUrlFotoEvento() ?>">
		<br>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>

	<div class="img">
		<form action="<?= _URLBASE_ ?>src/view/adm/cadastro/uploadAdm/eventoUploadImg.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoEvento">

			<input type="file" name="urlFotoEvento">

			<input class="button" type="submit" value="Carregar">
		</form>
		<iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
	</div>
	<div class="imgCadastro">
		<picture>
			<img id="imgAvatar" src="<?= _URLBASE_ . $eventoController->getEventoDAO()->getUrlFotoEvento() ?>" alt="Avatar" class="avatar">
		</picture>
	</div>



	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadEvento">Voltar</a>
</section>