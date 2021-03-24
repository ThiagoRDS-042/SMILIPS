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
        <div class="deletar-conta">
            <h1>Ações</h1>
            <div class="btn-deletar">
                <form action="/SMILIPS/controller/usuario/usuarioDAO.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['usuarioID'] ?>">
                    <input type="checkbox" id="deletar">
                    <label for="deletar">
                        <h1>Deletar Conta</h1>
                    </label>

                    <div class="msg-deletar">
                        <h1>Deseja Realmente excluir sua Conta?</h1>
                        <button class="confirm" type="submit" name="deletar">Sim</button>
                        <button class="cancel" type="button">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php
        require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
    ?>

    <script src="/SMILIPS/view/js/usuario/configuracoes.js"></script>
    
</body>
</html>