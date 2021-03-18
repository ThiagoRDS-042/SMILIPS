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
        ?>
    </header>

    <main>

        <div class="form-cad">
            <span>Preencha todos os campos obrigatórios (*)</span>

            <h1>Cadastro</h1>

            <form action="#" method="post">

                <div class="input-container">
                   
                    <div class="input-field">
                        <label>Nome*</label>
                        <input type="text" name="nome">
                    </div>

                    <div class="input-field">
                        <label>CPF/CNPJ*</label>
                        <input type="text" name="cpf/cnpj">
                    </div>

                </div>

                <div class="input-container">

                    <div class="input-field">
                        <label>Email*</label>
                        <input type="email" name="email">
                    </div>

                    <div class="input-field">
                        <label>Senha*</label>
                        <input type="password" name="senha" class="visible">
                        <i class="fa fa-eye"></i>
                    </div>

                </div>

                <div class="input-container">

                    <div class="input-field">
                        <label>Telefone*</label>
                        <input type="text" name="telefone">
                    </div>

                    <div class="input-field">
                        <label>Endereço*</label>
                        <input type="text" name="endereco">
                    </div>

                </div>

                <div class="input-container">

                    <div class="input-field">
                        <label>Bairro*</label>
                        <input type="text" name="bairro">
                    </div>

                    <div class="input-field">
                        <label>Complemento</label>
                        <input type="text" name="complemento">
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