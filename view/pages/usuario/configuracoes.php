<?php
    require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
    usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        require_once('/xampp/htdocs/SMILIPS/view/head.php');
    ?>
    <link rel="stylesheet" href="/SMILIPS/view/css/usuario/configuracoes.css">
    <title>Configurações</title>
</head>
<body>

    <?php
        require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
    ?>

    <?php
        require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
    ?>
    
</body>
</html>