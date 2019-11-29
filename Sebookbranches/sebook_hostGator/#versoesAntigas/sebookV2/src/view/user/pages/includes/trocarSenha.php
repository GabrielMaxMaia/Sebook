<!--Modal-->
<label class="btn-modal-cadastre" for="modal-cadastre">Trocar senha?</label>
<section class="modal">
    <input class="modal-open" id="modal-cadastre" type="checkbox" hidden>
    <div class="modal-wrap" aria-hidden="true" role="dialog">
        <label class="modal-overlay" for="modal-cadastre"></label>
        <div class="modal-dialog">
            <div class="modal-header">
                <h2>Mudar sua senha</h2>
                <label class="btn-close" for="modal-cadastre" aria-hidden="true">×</label>
            </div>
            <div class="modal-body">
                <form name="mudarSenha" method="post">
                    <label for="senhaAtual">Senha Atual</label>
                    <input type="password" name="senhaAtual" id="senhaAtual">
                    <label for="senhaNova">Nova senha</label>
                    <input type="password" name="senhaNova">
                    <input type="submit" name="trocarSenha">
                </form>
            </div>
            <div class="modal-footer">
                <label class="btn btn-primary" for="modal-cadastre">Fechar</label>
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_POST['senhaNova'])) {
    $senhaAtual = $_POST['senhaAtual'] ?? null;
    if (password_verify($senhaAtual,  $usuarioDAO->getSenhaUsuario())) {
        $usuarioDAO->setSenhaUsuario($_POST['senhaNova']);
        $usuarioDAO->alterarSenhaUsuario();
        echo "senha trocada";
    } else {
        echo 'Senha não confere';
    }
}
?>