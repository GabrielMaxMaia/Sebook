<?php
$title = "Sebos";
//Arquivo de pesquisa para buscar dinamicamente
$pesquisaSebo =  _URLBASE_ . "src/view/user/pages/includes/pesquisaSebo.php";
?>
<section class="sebos">
	<p>LOCALIZAR SEBOS</p>
	<form action="search-box" name="form_pesquisa" id="form_pesquisa" method="post" action="">
		<!-- <label for="pesquisaCidade">Encontrar</label> -->
		<div class="input-prepend">
			<select name="pesquisaCidade" id="pesquisaCidade">
				<optgroup label="Selecione a Cidade">
					<?php
                //Inclui o arquivo de array cidades
				include "src/view/user/pages/includes/arrayCidades.php";

				//Adiciona o elemento do array somente nessa página
				array_unshift($cidades, "Escolha a cidade");
				
                foreach ($cidades as $cidade) {
                    ?>
					<option value="<?= $cidade ?>" name="pesquisaCidade" id="pesquisaCidade" value=""
					 tabindex="">
						<?= $cidade ?>
					</option>
					<?php
                }
                ?>
				</optgroup>
			</select>
		</div>
		<label for="pesquisaSebo">ou</label>
        <div class="input-prepend">
			<input type="text" name="pesquisaSebo" id="pesquisaSebo" value="" tabindex="1" placeholder="Digite aqui o nome do Sebo...">
		</div>
	</form>

	<section class="jumbotron">
		<div id="MostraPesq"></div>
	</section>
	<div id="contentLoading">
		<div id="loading"></div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {

			//Aqui a ativa a imagem de load
			function loading_show() {
				$('#loading').html(
					"<img class='loadGif' src='<?= _URLBASE_ ?>public/icon/loading.svg'/>"
				).fadeIn('fast');
			}

			//Aqui desativa a imagem de loading
			function loading_hide() {
				$('#loading').fadeOut('fast');
			}

			// aqui a função ajax que busca os dados em outra pagina do tipo html, não é json
			function load_dados(valores, page, div) {
				$.ajax({
					type: 'POST',
					dataType: 'html',
					url: page,
					beforeSend: function() {
						//Chama o loading antes do carregamento
						loading_show();
					},
					data: valores,
					success: function(msg) {
						loading_hide();
						var data = msg;
						$(div).html(data).fadeIn();
					}
				});
			}

			// src\view\user\pages\includes\pesquisa.php

			//Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
			// load_dados(null, '<?//= $pesquisaSebo ?>', '#MostraPesq');

			//Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
			$('#pesquisaSebo').keyup(function() {

				var valores = $('#form_pesquisa').serialize() //o serialize retorna uma string pronta para ser enviada
				load_dados(valores, '<?= $pesquisaSebo ?>', '#MostraPesq');
				//pegando o valor do campo #pesquisaSebo
				// var $parametro = $(this).val();

				// if ($parametro.length >= 1) {
				//     load_dados(valores, '<?//= $pesquisaSebo ?>', '#MostraPesq');
				// } else {
				//     load_dados(null, '<?//= $pesquisaSebo ?>', '#MostraPesq');
				// }
			});

			$('#pesquisaCidade').change(function() {

				var valores = $('#form_pesquisa').serialize() //o serialize retorna uma string pronta para ser enviada
				load_dados(valores, '<?= $pesquisaSebo ?>', '#MostraPesq');
				//pegando o valor do campo #pesquisaSebo
				// var $parametro = $(this).val();

				// if ($parametro.length >= 1) {
				//     load_dados(valores, '<?//= $pesquisaSebo ?>', '#MostraPesq');
				// } else {
				//     load_dados(null, '<?//= $pesquisaSebo ?>', '#MostraPesq');
				// }
			});

		});
	</script>

</section>