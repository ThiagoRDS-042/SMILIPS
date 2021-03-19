<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        require_once('/xampp/htdocs/SMILIPS/view/head.html');
    ?>
    <link rel="stylesheet" href="/SMILIPS/view/css/usuario/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <?php
            require_once('/xampp/htdocs/SMILIPS/view/nav.html');
            if(!isset($_SESSION)){
                session_start();
            }
        ?>
    </header>

    <main>
        <?php
            require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
        ?>

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
                        <input type="text" name="cpf_cnpj" maxlength="19">
                        <span class="counter">19</span>
                    </div>

                </div>

                <div class="input-container">

                    <div class="input-field">
                        <label>Email*</label>
                        <input type="email" name="email"  maxlength="100">
                        <span class="counter">100</span>
                    </div>

                    <div class="input-field">
                        <label>Senha*</label>
                        <input type="password" name="senha"  maxlength="35">
                        <i class="fa fa-eye"></i>
                    </div>

                </div>

                <div class="input-container">

                    <div class="input-field">
                        <label>Telefone*</label>
                        <input type="text" name="telefone"  maxlength="20">
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
                    <button type="submit">Cadastrar</button>
                </div>

            </form>

        </div>

    </main>
    
    <?php
        require_once('/xampp/htdocs/SMILIPS/view/footer.html');
    ?>

<script src="/SMILIPS/view/js/usuario/cadastro.js"></script>
</body>
</html>