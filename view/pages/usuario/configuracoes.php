<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    require_once('/xampp/htdocs/SMILIPS/view/head.php');
    require_once('/xampp/htdocs/SMILIPS/controller/usuario/consultar.php');
    consultarSituacao();
    ?>
    <link rel="stylesheet" href="/SMILIPS/view/css/usuario/configuracoes.css">
    <title>Configurações</title>
</head>

<body>

    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
    ?>

    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
    ?>

    <main>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
        ?>

        <div class="desativar-conta">
            <h1>Ações</h1>
            <div class="btn-desativar">
                <form action="/SMILIPS/controller/usuario/usuarioDAO.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['usuarioID'] ?>">
                    <input type="checkbox" id="desativar">
                    <label for="desativar">
                        <h1 class="title-desativar">Desativar Conta</h1>
                    </label>

                    <div class="msg-desativar">
                        <h1>Digite sua Senha</h1>
                        <span><i class="fas fa-unlock-alt"></i></span>
                        <input type="password" class="msg-content" name="senha">
                        <i class="fa fa-eye"></i>
                        <button class="confirm" type="submit" name="desativar">Confirmar</button>
                        <button class="cancel" type="button">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
    ?>

    <script src="/SMILIPS/view/js/usuario/configuracoes.js" type="module"></script>

</body>

</html>