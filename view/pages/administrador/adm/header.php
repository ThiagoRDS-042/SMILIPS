<link rel="stylesheet" href="/SMILIPS/view/css/administrador/adm/header.css">
<header>
    <div class="logo">
        <a href="/SMILIPS/view/pages/sistema/home.php">SMILIPS</a>
    </div>

    <div class="adm">
        <!-- passando a variavel get o id do adm -->
        <a href="/SMILIPS/view/pages/administrador/adm/conta.php?consultar=<?php echo $_SESSION['idAdm'] ?>">ADM</a>
    </div>
</header>