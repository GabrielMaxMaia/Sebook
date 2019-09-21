<div id="container">
        <section class=publicar>
            <h2>Criar publicação</h2>
            <p>Não é necessário preencher todos os campos para se criar uma publicação</p>
            <form name=foo method="post" enctype="multipart/form-data" action="">
                <div class=itemForm>
                    <label for=tiluto>Título</label>
                    <input type=text id=titulo placeholder="Escreva um título para a publicação">
                </div>
                <div class=itemForm>
                    <label for=textArea>Texto</label>
                    <textarea id=textArea placeholder="Escreva um texto para a publicação"></textarea>
                </div>
                <div class=itemForm>
                    <label for=carregarFoto>Foto</label>
                    <input type="file" id=carregarFoto>
                </div>
                <div class="itemForm enviaForm">
                    <input type="submit" value="Confirmar">
                    <input type="reset" value="Cancelar">
                </div>
            </form>
        </section>
    </div>