<?php

use Controller\EventoController;

$objSql = new Util\Sql($conn);
$eventoController = new Controller\EventoController($objSql);
$eventoController->gravarAlterar();

//Caso evento ainda não ter foto seta a foto padrão
if ($eventoController->getEventoDAO()->getUrlFotoEvento() == "") {
	$eventoController->getEventoDAO()->setUrlFotoEvento('public/img/imgEvento/imgPadrao/imgEventopadrao.jpg');
}

//$postagemDAO = new Model\PostagemDAO();
//$frontController = new Controller\FrontController($postagemDAO);

?>

<section class="<?php echo $eventoController->getLista(); ?>">

	<table>
		<caption>Listar Eventos</caption>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo $eventoController->listarEvento();
			?>
		</tbody>
	</table>

	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadEvento/add'" value="Novo">

	<section class="notificador">
		<?php
		//Estou usando a Url da lista que quero controlar
		$urlDoNotificador = "area/adm/cadastro/cadEvento";
		echo $eventoController->exibirNotificador($urlDoNotificador);
		?>
	</section>




</section>

<section class="<?php echo $eventoController->getFormulario(); ?>">
	<header class="headerPagina">
		<h1>Cadastro de Eventos</h1>
	</header>

	<div class="containerCadAdm">
		<div class="imgCadastro">
			<picture>
				<img id="imgAvatar" src="<?= _URLBASE_ . $eventoController->getEventoDAO()->getUrlFotoEvento() ?>" alt="Avatar" class="avatar">
			</picture>
		</div>
		<div class="img">
			<form action="<?= _URLBASE_ ?>src/view/adm/cadastro/uploadAdm/eventoUploadImg.php" method='post' enctype='multipart/form-data' target='ifrmUpload' name="urlFotoEvento">

				<input type="file" name="urlFotoEvento">

				<input class="button" type="submit" value="Carregar">
			</form>
			<iframe id="ifrmUpload" name="ifrmUpload" src="" frameborder="0"></iframe>
		</div>

		<form method="post" action="">

			<label for="txtId">Id Evento</label>
			<input type="text" name="txtId" id="txtId" value="<?php echo $eventoController->getEventoDAO()->getIdEvento() ?>">

			<label for="idUsuario">Id Usuario</label>
			<input type="text" name="idUsuario" id="idUsuario" value="<?php echo $eventoController->getEventoDAO()->getIdUsuario(); ?>">

			<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $eventoController->getAcaoGET(); ?>">

			<label>Titulo</label>
			<input class="grande" type="text" name="txtNome" value="<?= $eventoController->getEventoDAO()->getNomeEvento() ?>">
			<br>
			<label>Descrição</label>
			<input class="grande" type="text" name="txtEvento" value="<?= $eventoController->getEventoDAO()->getTxtEvento() ?>">


			<label>Data</label>
			<input class="grande" type="date" name="dataEvento" id="dataEvento" value="<?= $eventoController->getEventoDAO()->getDataEvento() ?>">

			<label>Hora</label>
			<input class="grande" type="time" name="horaEvento" id="horaEvento" min="00:00" max="23:59" value="<?= $eventoController->getEventoDAO()->getHoraEvento() ?>">


			<label>Local</label>
			<input class="grande" type="text" name="localEvento" id="localEvento" min="00:00" max="23:59" value="<?= $eventoController->getEventoDAO()->getLocalEvento() ?>">


			<label>Cidade</label>
			<input class="grande" type="text" name="cidadeEvento" id="cidadeEvento" min="00:00" max="23:59" value="<?= $eventoController->getEventoDAO()->getCidadeEvento() ?>">


			<input type="hidden" name="txtImg" id="txtImg" value="<?= $eventoController->getEventoDAO()->getUrlFotoEvento() ?>">

			<input class="buttonCancel" type="reset" value="Limpar">
			<input class="button" type="submit" value="Enviar">
		</form>

	</div>

	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadEvento">Voltar</a>
</section>