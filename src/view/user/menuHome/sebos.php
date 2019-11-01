<?php $title = "Sebos"; ?>
<section class="sebos">
    <div class="container">
        <h1>SEBOS</h1>
        <form action="">
            <label for="">Buscas por Sebos</label>
            <input type="text">

            <label for="">Encontre Sebos de sua Cidade</label>
            <select name="cidadeSP">
                <?php
                //Inclui o arquivo de array cidades
                include "src/view/user/pages/includes/arrayCidades.php";
                foreach ($cidades as $cidade) {
                    ?>
                    <option value="<?= $cidade ?>"><?= $cidade ?></option>
                <?php
                }
                ?>
            </select>
            <button>Pesquisar</button>
        </form>
        <a href="acervo-sebo.html">
            <div class="box-sebo">
                <strong>JULIO SEBOS</strong>
                <p>5,000</p>
            </div>
        </a>
        <a href="acervo-sebo.html">
            <div class="box-sebo">
                <strong>JULIO SEBOS</strong>
                <p>5,000</p>
            </div>
        </a>
        <a href="acervo-sebo.html">
            <div class="box-sebo">
                <strong>JULIO SEBOS</strong>
                <p>5,000</p>
            </div>
        </a>
    </div>
</section>