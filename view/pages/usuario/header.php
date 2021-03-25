<?php
    require_once('/xampp/htdocs/SMILIPS/controller/usuario/consultar.php');
?>
<link rel="stylesheet" href="/SMILIPS/view/css/usuario/header.css">
<header>
    <div class="logo">
        <a href="/SMILIPS/view/pages/home.php">SMILIPS</a>
    </div>

    <div class="user">
        <?php if($ftPerfil != null): ?>
            <a href="/SMILIPS/view/pages/usuario/perfil.php?consultar=<?php echo $_SESSION['usuarioID'] ?>"><img src="/SMILIPS/controller/usuario/imgPerfil.php" alt="Imagem do Usuário"></a>
        <?php else: ?>
            <a href="/SMILIPS/view/pages/usuario/perfil.php?consultar=<?php echo $_SESSION['usuarioID'] ?>"><img src="/SMILIPS/view/images/user.png" alt="Imagem do Usuário"></a>
        <?php endif; ?>
    </div>
</header>