<?php

use Controller\PostagemController;
 $objSql = new Util\Sql($conn);
 $postagemController = new Controller\PostagemController($objSql);
 $postagemController->gravarAlterar();
?>

<section class="<?php echo $postagemController->getLista(); ?>">

		<h2>Postagens</h2>
		<tbody>
			<?php
				echo $postagemController->listarPostagem();
			?>
		</tbody>
	</table>
	<input class="button" type="button" onclick="window.location='http://localhost/sebook/area/adm/cadastro/cadPostagem/add'"
	 value="Novo">

</section>

<section class="<?php echo $postagemController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de Postagems</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $postagemController->getPostagemDAO()->getIdPostagem(); ?>">

		<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $postagemController->getPostagemDAO()->getIdUsuario(); ?>">
		
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $postagemController->getAcaoGET();?>">
		
		<!-- <input class="grande" type="text" id="txtNome" name="txtNome" onblur="validarNomeUsuario('http://localhost/PLAO3/Projetos/Modelo_mvc_dao/src/view/adm/cadastro/cadUsuarioAjax.php', 'txtNomeCat='+this.value, 'txtNome')"
		 value="<?php //echo $postagemController->getPostagemDAO()->getNomeUsuario(); ?>"> -->
		 
        <label>Titulo</label>
        <input class="grande" type="text" name="txtTitulo" value="<?= $postagemController->getPostagemDAO()->getTituloPostagem() ?>">
        <br>
        <label>Post</label>
        <input class="grande" type="text" name="txtPostagem" value="<?= $postagemController->getPostagemDAO()->getTxtPostagem() ?>">
        <br>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://localhost/Sebook/area/adm/cadastro/cadPostagem">Voltar</a>
</section>