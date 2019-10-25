<?php
$title = "Quem Somos";
$styleSobrescrito =
    "<style>
    div#containerTemplate {
        margin-top:6%
    }
    @media (min-width:780px){
        div#containerTemplate {
            display: flex;
            justify-content: center;
            align-items: center
        } 
    }
</style>";
?>
<article class="quemSomos">
    <section class="container">
        <div class="containerText">
            <h1>Quem Somos</h1>
            <p>
                SebooK é uma Plataforma Web dedicada aos amantes de livros usados com a principal missão de fornecer acesso ágil e eficiente
                aos leitores na busca por livros em sua região. Oferecemos um sistema de Gestão de Acervos para os
                donos de sebos parceiros. Promovemos interação entre sebos e leitores sob um enfoque social - através
                da Economia Solidária - incentivando assim o consumo sustentável, pois, além de garantir economia
                ao leitor, trará visibilidade aos empreendedores desse mercado, estimulando e fomentando de forma
                ecológica o consumo dessas obras dentro e fora dos grandes centros.
            </p>
        </div>
        <img src="<?= _URLBASE_ ?>public/img/imgSite/quemSomos.jpg" alt="Sebook">
    </section>
</article>
