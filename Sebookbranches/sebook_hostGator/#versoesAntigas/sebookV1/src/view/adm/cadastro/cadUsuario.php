<?php

use Controller\PerfilController;
use Controller\UsuarioController;

$objSql = new Util\Sql($conn);
$usuarioController = new Controller\UsuarioController($objSql);
$perfilCrontoller = new Controller\PerfilController($objSql);
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
	<input class="button" type="button" onclick="window.location='http://Sebook/area/adm/cadastro/cadUsuario/add'" value="Novo">

</section>

<section class="<?php echo $usuarioController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Usuarios</h4>
		<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $usuarioController->getUsuarioDAO()->getIdUsuario(); ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $usuarioController->getAcaoGET(); ?>">

		<label>Usuario</label>
		<input class="grande" type="text" id="nomeUsuario" name="nomeUsuario" onblur="validarNomeUsuario('http://PLAO3/Projetos/Modelo_mvc_dao/src/view/adm/cadastro/cadUsuarioAjax.php', 'txtNomeCat='+this.value, 'nomeUsuario')" value="<?= $usuarioController->getUsuarioDAO()->getNomeUsuario(); ?>" placeholder='Nome'>

		<input class="grande" type="text" id="sobrenomeUsuario" name="sobrenomeUsuario" value="<?= $usuarioController->getUsuarioDAO()->getSobrenomeUsuario();?>" placeholder='Sobrenome'>

		<input class="grande" type="text" id="emailUsuario" name="emailUsuario" value="<?= $usuarioController->getUsuarioDAO()->getEmailUsuario(); ?>" placeholder='E-mail'>

		<input class="grande" type="password" id="senhaUsuario" name="senhaUsuario" value="<?= $usuarioController->getUsuarioDAO()->getSenhaUsuario(); ?>" placeholder='Senha'>

		<select class="grande" name="selecPerfil" id="selecPerfil">
			<optgroup label="Perfill">
				<?php
				//Listagem de perfis
				$result = $usuarioController->getUsuarioDAO()->listarPerfil();
				
				foreach ($result as $linha) {

					//  if($linha['idPerfil'] == $perfilCrontoller->getPerfilDAO()->getIdPerfil()){
					// 	$select = "select";
					// 	echo "encontrou";
					//  }
					//  var_dump($perfilCrontoller->getPerfilDAO());

					echo "<option value='{$linha['idPerfil']}'>{$linha['nomePerfil']}</option>";
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
	<a href="http://Sebook/area/adm/cadastro/cadUsuario">Voltar</a>
</section>