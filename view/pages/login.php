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
    <link rel="stylesheet" href="/SMILIPS/view/css/login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <?php
            require_once('/xampp/htdocs/SMILIPS/view/nav.php');
            if(!isset($_SESSION)){
                session_start();
            }
        ?>

    </header>

    <main>
        <?php
            require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
        ?>
        <div class="middle">
            <h1>Login</h1>
            <form action="/SMILIPS/controller/autenticar/autenticar.php" method="POST">
                <div class="field-input">
                    <input type="text" name="email">
                    <span data-placeholder="Email"></span>
                </div>
                <div class="field-input">
                    <input type="password" class="visible" name="senha">
                    <span data-placeholder="Senha"></span>
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field-button">
                    <button type="submit" name="autenticar"><i class="fas fa-sign-in-alt"></i>Login</button>
                </div>

                <div class="txt-bottom">
                    <p>Não tem uma conta?<a href="/SMILIPS/view/pages/usuario/cadastro.php"> Cadastre-se</a></p>
                </div>

            </form>
        </div>

    </main>

    <?php
        require_once('/xampp/htdocs/SMILIPS/view/footer.html');
    ?>

    <script src="/SMILIPS/view/js/login.js"></script>
</body>

</html>