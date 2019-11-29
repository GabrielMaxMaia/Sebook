<?php

use Controller\AutorController;

$objSql = new Util\Sql($conn);
$autorController = new Controller\AutorController($objSql);
$nacionalidadeController = new Controller\NacionalidadeController($objSql);
$autorController->gravarAlterar();
?>

<section class="<?php echo $autorController->getLista(); ?>">
	<table>
		<caption>Lista de autors</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Status</th>
				<th>Nacionalidade</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
			echo $autorController->listarAutores();
			?>
		</tbody>
	</table>

	<section class="notificador">
		<?php
		//Estou usando a Url da lista que quero controlar
		$urlDoNotificador = "area/adm/cadastro/cadAutor";
		echo $autorController->exibirNotificador($urlDoNotificador);
		?>
	</section>


	<input class="button" type="button" onclick="window.location='<?= _URLBASE_ ?>area/adm/cadastro/cadAutor/add'" value="Novo">
</section>

<section class="<?php echo $autorController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de autores</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $autorController->getAutorDAO()->getIdAutor(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $autorController->getAcaoGET(); ?>">
		<label>Autor</label>
		<input class="grande" type="text" name="txtNome" value="<?php echo $autorController->getAutorDAO()->getNomeAutor(); ?>">

		<br><br>

		<select class="grande" name="selecNacionalidade" id="selecNacionalidade">
			<optgroup label="Nacionalidade">
				<?php
				//Listagem de perfis
				$result = $nacionalidadeController->getNacionalidadeDAO()->listarNacionalidades();

				foreach ($result as $linha) {

					//  if($linha['idNacionalidade'] == $nacionalidadeController->getNacionalidadeDAO->getIdNacionalidade()){
					// 	$select = "select";
					// 	echo "encontrou";
					//  }

					echo "<option value='{$linha['idNacionalidade']}'>{$linha['nomeNacionalidade']}</option>";
				}
				?>
			</optgroup>
		</select>

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="<?= _URLBASE_ ?>area/adm/cadastro/cadAutor">Voltar</a>
</section>