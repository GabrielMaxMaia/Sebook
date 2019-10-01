<?php
$title = "Login";
$menuHide = true;
$cssCaminho = '<link rel="stylesheet" href="http://localhost/sebook/public/css/login.css">';
$styleSobrescrito =
    "<style>
.containerScroll{
    display:flex;
    overflow:hidden
}
div#containerTemplate{
    align-self:center
}
</style>";
?>
<!--Style sobrescrito para login-->

<!-- <figure class="logo">
    <a href="<? //_URLBASE_ 
                ?>">
        <img src="<? //_IMGBASE_
                    ?>logoSebookCor.png" alt="SebooK">
    </a>
</figure> -->
<div class="linkTop">
    <a href="<?= _URLBASE_ ?>">Voltar | Home</a>
</div>
<div class="containerLogin">
    <article class="loginSpace">
        <section class="login">
            <figure>
                <img src="<?= _ICONBASE_ ?>enter.png" alt="Login" title="Login">
                <figcaption>LOGIN</figcaption>
            </figure>
            <label class="btn-modal-cadastre" for="modal-cadastre">Primeiro Acesso? Cadastre-se</label>

            <form action="">
                <label for="">Email:</label>
                <input type="text">
                <label for="">Senha:</label>
                <input type="password">
                <button>ENTRAR</button>
            </form>
            <div class="linkGroup">
                <a href="">Esqueci minha senha</a>
            </div>
        </section>

        <!--Modal-->
        <section class="modal">
            <input class="modal-open" id="modal-cadastre" type="checkbox" hidden>
            <div class="modal-wrap" aria-hidden="true" role="dialog">
                <label class="modal-overlay" for="modal-cadastre"></label>
                <div class="modal-dialog">
                    <div class="modal-header">
                        <h2>Selecione a opção de cadastro</h2>
                        <label class="btn-close" for="modal-cadastre" aria-hidden="true">×</label>
                    </div>
                    <div class="modal-body">
                        <div class="content-modal-cadastre">
                            <a class="btn-modal" href="<?= _URLBASE_?>area/user/pages/cadLeitor">Sou Leitor</a>
                            <span>OU</span>
                            <a class="btn-modal blue" href="<?= _URLBASE_?>area/user/pages/cadSeboFisica">Sou Sebo</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <label class="btn btn-primary" for="modal-cadastre">Fechar</label>
                    </div>
                </div>
            </div>
        </section>
    </article>
</div>