<?php
 
 use Controller\PerfilController;

 $objSql = new Util\Sql($conn);
 $perfilCrontoller = new Controller\PerfilController($objSql);
 $perfilCrontoller->gravarAlterar();
?>

<section class="<?php echo $perfilCrontoller->getLista(); ?>">
	<table>
		<caption>Lista de Perfils</caption>
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
				echo $perfilCrontoller->listarPerfils();
			?>
		</tbody>
	</table>
	 <input class="button" type="button" onclick="window.location=<?= _URLBASE_ ?>area/adm/cadastro/cadPerfil/add'"
	 value="Novo">
</section>

<section class="<?php echo $perfilCrontoller->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Perfil</h4>

		<input type="hidden" name="idPerfil" id="idPerfil" value="<?php echo $perfilCrontoller->getPerfilDAO()->getIdPerfil(); ?>">

		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $perfilCrontoller->getAcaoGET();?>">
		<label>Perfil</label>
		<input class="grande" type="text" name="nomePerfil" id="nomePefil" value="<?php echo $perfilCrontoller->getPerfilDAO()->getNomePerfil(); ?>">
		<br>
	

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href=<?= _URLBASE_ ?>area/adm/cadastro/cadPerfil">Voltar</a>
</section>