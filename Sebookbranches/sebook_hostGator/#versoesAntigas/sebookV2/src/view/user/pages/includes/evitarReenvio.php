<?php 

function evitarReenvio()
{
	//verificar se existe uma variavel de sessão para os dados do form
	if (isset($_SESSION['dadosForm'])) {
		//conteúdo armazenado sessão diferente do conteúdo atual --> ambos em forma de hash
		if ($_SESSION['dadosForm'] != md5(implode($_POST))) {   //novo envio             
			//armazena conteúdo do formulário em forma de hash na varivel de sessao
			$_SESSION['dadosForm'] = md5(implode($_POST)); // md5 cria um hash de uma string  --> implode converte array para string;
			//indica que não há reenvio de dados
			return true;
		} else { //reenvio
			//conteúdo armazenado sessão é igual do conteúdo atual --> ambos em forma de hash
			//não atualizo a sessão
			return false;
		}
	} else {
		//armazena conteúdo do formulário em forma de hash na varivel de sessao
		$_SESSION['dadosForm'] = md5(implode($_POST)); // md5 cria um hash de uma string  --> implode converte array para string;
		//indica que não há reenvio de dados
		return true;
	}
}