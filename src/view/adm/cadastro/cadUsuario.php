<?php

use Controller\UsuarioController;
 $objSql = new Util\Sql($conn);
 $usuarioController = new Controller\UsuarioController($objSql);
 $usuarioController->gravarAlterar();
?>

<section class="<?php echo $usuarioController->getLista(); ?>">
	<table>
		<caption>Lista de Usuarios</caption>
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
				echo $usuarioController->listarUsuarios();
			?>
		</tbody>
	</table>
	<input class="button" type="button" onclick="window.location='http://localhost/Sebook/area/adm/cadastro/cadUsuario/add'"
	 value="Novo">

</section>

<section class="<?php echo $usuarioController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Usuarios</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $usuarioController->getUsuarioDAO()->getIdUsuario(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $usuarioController->getAcaoGET();?>">
		<label>Usuario</label>
		<input class="grande" type="text" id="txtNome" name="txtNome" onblur="validarNomeUsuario('http://localhost/PLAO3/Projetos/Modelo_mvc_dao/src/view/adm/cadastro/cadUsuarioAjax.php', 'txtNomeCat='+this.value, 'txtNome')"
		 value="<?php echo $usuarioController->getUsuarioDAO()->getNomeUsuario(); ?>">
		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://localhost/Sebook/area/adm/cadastro/cadUsuario">Voltar</a>
</section>