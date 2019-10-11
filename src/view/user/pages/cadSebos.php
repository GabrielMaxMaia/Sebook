<div id="container">
	<section class="cadastro">
		<div class="container">
			<figure>
				<img src="<?= _ICONBASE_ ?>userSVG.svg" alt="">
				<figcaption>Cadastre-se</figcaption>
			</figure>
			<p>
				<span>Preencha o formulário abaixo</span>
			</p>
			<form action="">
				<label for="">Nome Fantasia</label>
				<input type="text">

				<label for="">Razão Social</label>
				<input type="text">

				<label for="">CNPJ</label>
				<input type="text">

				<label for="">Inscrição Estadual</label>
				<input type="text">

				<hr>

				<div class="formItem">
					<label for="">CEP</label>
					<input type="text">
				</div>

				<div class="formItem">
					<label for="">Logradouro</label>
					<select name=" Logradouro ">
						<option value=" AL"> ALAMEDA </option>
						<option value=" AV">AVENIDA </option>
						<option value=" BC "> BECO </option>
						<option value=" BL "> BLOCO </option>
						<option value=" CAM "> CAMINHO </option>
						<option value=" EST "> ESTAÇÃO </option>
						<option value=" FAZ "> FAZENDA </option>
						<option value=" GL"> GALERIA </option>
						<option value=" LD"> LADEIRA </option>
						<option value=" LGO "> LARGO </option>
						<option value=" PÇA "> PRAÇA </option>
						<option value=" PRQ "> PARQUE </option>
						<option value=" PR "> PRAIA </option>
						<option value=" KM "> QUILÔMETRO </option>
						<option value=" ROD "> RODOVIA </option>
						<option value=" R "> RUA </option>
						<option value=" SQD "> SUPER QUADRA </option>
						<option value=" TRV "> TRAVESSA </option>
						<option value=" VD "> VIADUTO </option>
						<option value=" VL "> VILA </option>
					</select>
				</div>
				<div class="formItem">
					<label for="">Número</label>
					<input type="text">
				</div>
				<div class="formItem">
					<label for="">Complemento</label>
					<input type="text">
				</div>

				<label for="">Telefone</label>
				<input type="text">

				<label for="">Celular 1</label>
				<input type="text">

				<label for="">Celular 2</label>
				<input type="text">

				<label for="">Link e/ou site</label>
				<input type="text">

				<label for="">E-mail</label>
				<input type="text">

				<hr>

				<label for="">Senha</label>
				<input type="password">

				<label for="">Repita a senha</label>
				<input class="password2" type="password">

				<button>ENVIAR</button>
			</form>
		</div>
	</section>
</div>