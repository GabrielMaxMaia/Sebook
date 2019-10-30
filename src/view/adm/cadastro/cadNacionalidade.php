<?php

use Controller\NacionalidadeController;

$objSql = new Util\Sql($conn);
$nacionalidadeController = new Controller\NacionalidadeController($objSql);
$nacionalidadeController->gravarAlterar();
?>

<section class="<?php echo $nacionalidadeController->getLista(); ?>">
	<table>
		<caption>Lista de nacionalidades</caption>
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
			echo $nacionalidadeController->listarNacionalidades();
			?>
		</tbody>
	</table>

	<section class="notificador">
		<?php
		//Estou usando a Url da lista que quero controlar
		$urlDoNotificador = "area/adm/cadastro/cadNacionalidade";
		echo $nacionalidadeController->exibirNotificador($urlDoNotificador);
		?>
	</section>

	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadNacionalidade/add'" value="Novo">
</section>

<section class="<?php echo $nacionalidadeController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de nacionalidades</h4>

		<input type="hidden" name="txtId" id="txtId" value="<?php echo $nacionalidadeController->getNacionalidadeDAO()->getIdNacionalidade(); ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $nacionalidadeController->getAcaoGET(); ?>">

		<label>Nacionalidade</label>


		<input class="grande" type="text" name="txtNome" value="<?php echo $nacionalidadeController->getNacionalidadeDAO()->getNomeNacionalidade(); ?>">

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	
	
	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadNacionalidade">Voltar</a>
</section>