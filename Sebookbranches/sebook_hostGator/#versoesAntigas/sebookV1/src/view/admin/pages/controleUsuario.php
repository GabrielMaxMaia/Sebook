<div id="container">
    <section class="controle">
        <div class="container">
            <h1>Controle de Usuários</h1>
            <p>Restrições de acesso por perfil</p>
            <hr>
            <form action="">
                <label for="nome">Nome Completo do usuário</label>
                <input name="nome" value="" required type="text">

                <label for="email">E-mail do usuário</label>
                <input name="email" value="" required type="text">

                <label for="sexo">Sexo</label>
                <select name="sexo">
                    <option value="">Selecione</option>
                    <option value="1">Feminino</option>
                    <option value="2">Masculino</option>
                </select>

                <label for="nivel de acesso">Nivel de acesso</label>
                <select name="nivel de acesso">
                    <option value="">Selecione</option>
                    <option value="1">Adm Nivel 2</option>
                    <option value="2">Adm Nivel 1</option>
                    <option value="3">Adm Master</option>
                </select>
                <br>
                <br>
                <label for="senha">Senha</label>
                <input name="senha" value="" required type="password">

                <label for="rsenha">Repita a Senha</label>
                <input name="rsenha" value="" required type="password">

                <button>Salvar</button>
            </form>
        </div>    
    </section>   
</div>
