<?php
require_once('/xampp/htdocs/SMILIPS/controller/DAO/usuario/consultar.php');
consultarFtPerfil();
?>
<link rel="stylesheet" href="/SMILIPS/view/css/usuario/header.css">
<header>
    <div class="logo">
        <a href="/SMILIPS/view/pages/sistema/home.php">SMILIPS</a>
    </div>

    <div class="user">
        <!-- se o usuario tem um ft de perfil cadastrada exiba ela se nao exiba a padrao do sistema -->
        <?php if ($ftPerfil != null) : ?>
            <a href="/SMILIPS/view/pages/usuario/perfil.php?consultar=<?php echo $_SESSION['usuarioID'] ?>"><img src="/SMILIPS/controller/DAO/usuario/imgPerfil.php" alt="Imagem do Usuário"></a>
        <?php else : ?>
            <a href="/SMILIPS/view/pages/usuario/perfil.php?consultar=<?php echo $_SESSION['usuarioID'] ?>"><img src="/SMILIPS/view/images/usuario/user.png" alt="Imagem do Usuário"></a>
        <?php endif; ?>
    </div>
</header>