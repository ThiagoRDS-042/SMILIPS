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
            require_once('/xampp/htdocs/SMILIPS/view/nav.html');
        ?>
    </header>


    <main>
        <div class="middle">
            <h1>Login</h1>
            <form action="#" method="POST">
                <div class="field-input">
                    <input type="text">
                    <span data-placeholder="Email"></span>
                </div>
                <div class="field-input">
                    <input type="password" class="visible">
                    <span data-placeholder="Senha"></span>
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field-button">
                    <button type="submit"><i class="fas fa-sign-in-alt"></i>Login</button>
                </div>

                <div class="txt-bottom">
                    <p>Não tem uma conta?<a href="#"> Cadastre-se</a></p>
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