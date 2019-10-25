<?php

use Model\livroDAO;

//Pega a conexão
$objSql = new Util\Sql($conn);

$livroDAO = new livroDAO($objSql);

$resultLivro = $livroDAO->listarLivros();

?>
<section class="busca">
	<div class="container">
		<div class="box-search">
			<a href="" class="search">
				<img src="<?= _ICONBASE_ ?>busca.svg" alt="">
			</a>
			<input type="text">
		</div>
		<div class="searchBooks">
			<?php
			foreach ($resultLivro as $livro) {
				?>
				<div>
					<a href="<?= _URLBASE_ ?>area/user/pages/descLivro/<?= $livro['isbnLivro'] ?>">
						<img src="<?= _URLBASE_ . $livro['urlFotoLivro'] ?>" alt="<?= $livro['nomeLivro'] ?>" title="<?= $livro['nomeLivro'] ?>">
					</a>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</section>