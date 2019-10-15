<nav class="middle">
    <div class="Menu">
        <ul>
    <!-- Menu nivel 2 -->    
            <li class="item" id="RELATÓRIOS">
                <a href="#RELATÓRIOS" class="btn">RELATÓRIOS</a>
                <ul class="smenu">
                    <li><a href="#">Cadastro de Leitores</a></li>
                    <li><a href="#">Cadastro de Sebos</a></li>
                    <li><a href="#">Geral de Acervos</a></li>
                    <li><a href="#">Duvidas</a></li>
                </ul>
            </li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/tratamento" class="btn">TRATAMENTO DE DUVIDAS</a></li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/eventosComentarios" class="btn">EVENTOS E COMENTARIOS</a></li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/controleUsuario" class="btn">CONTROLE DE USUARIOS</a></li>
    <!-- Menu nivel 1 -->
            <li class="item">
                <a href="<?= _URLBASE_ ?>area/adm/pages/apagar" class="btn">APAGAR POSTAGENS INDEVIDAS</a>
                <ul class=smenu>
                    <li><a href="<?php echo _URLBASE_ ?>area/adm/cadastro/cadPostagem">Postagem</a></li>
                </ul>
            </li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/cadastraEvento" class="btn">CADASTRAR EVENTOS E NOTÍCIAS</a></li>

            <li class="item"><a href="Bloquear.html" class="btn">BLOQUEAR USUÁRIOS</a></li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/aprovarSebo" class="btn">APROVAR SEBOS PARCEIROS</a></li>

            <li class="item"><a href="ExcluirSebo.html" class="btn">EXCLUIR SEBOS PARCEIROS</a></li>

    <!-- Menu master -->
            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/aprovarISBN" class="btn">APROVAR CADASTROS SEM ISBN</a></li>

            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/pages/banir" class="btn">BANIR USUARIOS</a></li>
            
            <li class="item"><a href="<?= _URLBASE_ ?>area/adm/sair" class="btn">SAIR</a></li>
        </ul>
    </div>
</nav>