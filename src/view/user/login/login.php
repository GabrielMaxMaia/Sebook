<?php
$title = "Login";
$menuHide = true;
$styleSobrescrito = 
"<style>
.containerScroll{
    display:flex;
    overflow:hidden
}
div#containerTemplate{
    display:flex;
    align-self:center;
    height:100%
}
</style>";
?>

<!--Style sobrescrito para login-->


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
            <a href="">Esqueci minha senha</a>
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
                            <a class="btn-modal" href="cadLeitor.html">Sou Leitor</a>
                            <span>OU</span>
                            <a class="btn-modal blue" href="cadSeboJuridica.html">Sou Sebo</a>
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