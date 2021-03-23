<?php
    require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
    usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        require_once('/xampp/htdocs/SMILIPS/view/head.html');
    ?>
    <link rel="stylesheet" href="/SMILIPS/view/css/usuario/home.css">
    <title>Home</title>
</head>
<body>

    <?php
        require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.html');
    ?>

    <div class="menu-container">
        <?php
            require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
        ?>

        <div class="nome">
            <?php $nome = preg_split('/\s/', $_SESSION['nomeUsuario']); ?>
            <h1>Bem Vindo! <?php echo $nome[0]; ?></h1>
        </div>
    </div>
</body>
</html>