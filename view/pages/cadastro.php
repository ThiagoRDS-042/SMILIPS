<?php
    require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
    usuarioLogadoNEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        require_once('/xampp/htdocs/SMILIPS/view/head.html');
    ?>
    <link rel="stylesheet" href="/SMILIPS/view/css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>

    <main>
        <?php
            require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
        ?>
        <div class="voltar">
            <a href="/SMILIPS/view/pages/login.php"><i class="fas fa-chevron-left"></i> Voltar</a>
        </div>

        <div class="form-cad">
            <span>Preencha todos os campos obrigatórios (*)</span>

            <h1>Cadastro</h1>

            <form action="/SMILIPS/controller/usuario/usuarioDAO.php" method="post">

                <div class="input-container">
                   
                    <div class="input-field">
                        <label>Nome*</label>
                        <input type="text" name="nome"  maxlength="100">
                        <span class="counter">100</span>
                    </div>

                    <div class="input-field">
                        <label>CPF/CNPJ*</label>
                        <input type="text" name="cpf_cnpj" maxlength="18" id="cpf_cnpj">
                        <span id="msgCpf_cnpj" class="msg"></span>
                        <span class="counter">18</span>
                    </div>

                </div>

                <div class="input-container">

                    <div class="input-field">
                        <label>Email*</label>
                        <input type="email" name="email" id="email"  maxlength="100">
                        <span id="msgEmail" class="msg"></span>
                        <span class="counter">100</span>
                    </div>

                    <div class="input-field">
                        <label>Senha*</label>
                        <input type="password" name="senha"  maxlength="35" id="senha">
                        <span id="msgSenha" class="msg"></span>
                        <i class="fa fa-eye"></i>
                    </div>

                </div>

                <div class="input-container">

                    <div class="input-field">
                        <label>Telefone*</label>
                        <input type="text" name="telefone"  maxlength="20" id="telefone">
                        <span id="msgTelefone" class="msg"></span>
                        <span class="counter">20</span>
                    </div>

                    <div class="input-field">
                        <label>Endereço*</label>
                        <input type="text" name="endereco"  maxlength="45">
                        <span class="counter">45</span>
                    </div>

                </div>

                <div class="input-container">

                    <div class="input-field">
                        <label>Bairro*</label>
                        <input type="text" name="bairro"  maxlength="45">
                        <span class="counter">45</span>
                    </div>

                    <div class="input-field">
                        <label>Complemento</label>
                        <input type="text" name="complemento"  maxlength="45">
                        <span class="counter">45</span>
                    </div>

                </div>

                <div class="button-field">
                    <button type="submit" name="save">Cadastrar</button>
                </div>

            </form>

        </div>

    </main>

    <script src="/SMILIPS/view/js/usuario/cadastro.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/SMILIPS/controller/verificarCampo/verificarCampoCadastro/verificarEmail.js"></script>
    <script src="/SMILIPS/controller/verificarCampo/verificarCampoCadastro/verificarCpf_cnpj.js"></script>
    <script src="/SMILIPS/controller/verificarCampo/verificarCampoCadastro/verificarTelefone.js"></script>
    <script src="/SMILIPS/controller/verificarCampo/verificarCampoCadastro/verificarSenha.js"></script>
</body>
</html>