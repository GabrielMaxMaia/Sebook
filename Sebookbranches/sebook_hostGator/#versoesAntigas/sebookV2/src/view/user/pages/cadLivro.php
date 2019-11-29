<?php

use Model\LivroDAO;
use Model\AutorDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$livroDAO = new LivroDAO($objSql);
$autorDAO = new AutorDAO($objSql);
$resultAutor = $autorDAO->listarAutores();

//Seta armazena o idPost em setIdPost
// $livroDAO->setIdUsuario($acessoUser);
$livroDAO->setUrlFotoLivro('public/img/imgPost/imgPadrao/padrao.jpg');


//Include para evitar reenvio
include "includes/evitarReenvio.php";

$post = $_POST['enviar'] ?? null;
if ($post != null || $post != "") {

    $erro = false;

    //Isbn
    if ($_POST['isbnLivro'] != "") {
		$livroDAO->setIsbnLivro($_POST['isbnLivro']);
	} else {
		$erro = true;
		echo "Prencha o Isbn";
    }

    //Ano
    if ($_POST['anoLivro'] != "") {
		$livroDAO->setAnoLivro($_POST['anoLivro']);
	} else {
		$erro = true;
		echo "Digite o ano do livro";
    }

    //Nome
    if ($_POST['nomeLivro'] != "") {
		$livroDAO->setNomeLivro($_POST['nomeLivro']);
	} else {
		$erro = true;
		echo "Digite o nome do livro";
    }

    //Editora
    if ($_POST['idEditora'] != "") {
		$livroDAO->setIdEditora($_POST['idEditora']);
	} else {
		$erro = true;
		echo "Digite o nome do livro";
    }

    //Categoria
    if ($_POST['idCategoria'] != "") {
		$livroDAO->setIdCategoria($_POST['idCategoria']);
	} else {
		$erro = true;
		echo "Selecione a categoria";
    }

    //Sinopse
    if ($_POST['sinopseLivro'] != "") {
		$livroDAO->setSinopseLivro($_POST['sinopseLivro']);
	} else {
		$erro = true;
		echo "Digite a sinopse do livro";
    }
	if ($erro != true) {   
            $livroDAO->setUrlFotoLivro('public/img/imgPost/imgPadrao/padrao.jpg');
            if(evitarReenvio()){
                $success = true;
                $livroDAO->adicionarLivro();
            }else{
                echo "Livro cadastrado";
            }
        }
    if(isset($success)){
        echo "Cadastrado com sucesso";
    }

}

if ($acessoUser != null || "") {

?>
<h1>Adicionar Livro</h1>

<form method="post" action="">

	<h4 class="cadCat">Cadastro de Livros</h4>

	<select name="selecAutor">

	<input type="hidden" name="urlFotoLivro" id="urlFotoLivro" value="<?//= $livroController->getLivroDAO()->getUrlFotoLivro(); ?>">

	<label>Isbn</label>
	<input class="grande" type="text" name="isbnLivro" value="<?= $_POST['isbnLivro'] ?? '' ?>">
	<br>

	<label>Ano</label>
	<input class="grande" type="text" name="anoLivro" id="anoLivro" value="<?= $_POST['anoLivro'] ?? '' ?>">
	<br>

	<label>Nome</label>
	<input class="grande" type="text" name="nomeLivro" id="nomeLivro" value="<?= $_POST['nomeLivro'] ?? '' ?>">
	<br>

	<label>Editora</label>
	<textarea class="grande" name="idEditora" id="idEditora"><?= $_POST['idEditora'] ?? '' ?></textarea>
	<br>

	<label>Categoria</label>
	<textarea class="grande" name="idCategoria" id="idCategoria"><?= $_POST['idCategoria'] ?? '' ?></textarea>
	<br>

	<label>Sinopse</label>
	<textarea class="grande" name="sinopseLivro" id="sinopseLivro"><?= $_POST['sinopseLivro'] ?? '' ?></textarea>
	<br>

	<input class="button" type="submit" name="enviar" value="Enviar">
</form>
<?php
	//Chama estrutura para formulário de img 
	include "includes/formPostLivro.php";
} else {
	echo "É necessário estar Logado para criar uma Publicação";
}

