<?php
 
 use Controller\ClienteController;

 $objSql = new Util\Sql($conn);
 $clienteController = new Controller\ClienteController($objSql);
//  $clienteController->gravarAlterar();
?>

<section class="<?php echo $clienteController->getLista(); ?>">
	<table>
		<caption>Lista de clientes</caption>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th colspan="2">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php
				echo $clienteController->listarClientes();
			?>
		</tbody>
	</table>
	<input class="button" type="button" onclick="window.location='http://localhost/PLAO3/Projetos/modelo_mvc_dao/index.php?area=adm&folder=cadastro&page=cadCliente&acao=1'"
	 value="Novo">

</section>

<section class="<?php echo $clienteController->getFormulario(); ?>">
	<form method="post" action="">
		<h4 class="cadCat">Cadastro de clientes</h4>
		<input type="hidden" name="txtId" id="txtId" value="<?php echo $clienteController->getClienteDAO()->getIdCliente(); ?>">
		<input type="hidden" name="txtAcao" id="txtAcao" value="<?php echo $clienteController->getAcaoGET();?>">
		<label>cliente</label>
		<input class="grande" type="text" name="txtNome" value="<?php echo $clienteController->getClienteDAO()->getNomeCliente(); ?>">
		<br>
		<label>Descrição</label>
		<textarea class="grande" name="txtDescr"><?php echo $clienteController->getClienteDAO()->getDescrCliente(); ?></textarea>
		<br>

		<label> </label>
		<input class="buttonCancel" type="reset" value="Limpar">
		<input class="button" type="submit" value="Enviar">
	</form>
	<br>
	<br>
	<br>
	<br>
	<a href="http://localhost/PLAO3/Projetos/modelo_mvc_dao/index.php?area=adm&folder=cadastro&page=cadCategoria">Voltar</a>
</section>