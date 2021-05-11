<?php

// inicaindo uma sessao caso n exista uma
if (!isset($_SESSION)) {
    session_start();
}

?>
<link rel="stylesheet" href="/SMILIPS/view/css/sistema/nav.css">
<nav>
    <div class="logo">
        <a href="/SMILIPS/view/pages/sistema/home.php">SMILIPS</a>
    </div>
    <input type="checkbox" id="menu">
    <label for="menu" class="icon">
        <i class="fa fa-bars "></i>
        <i class="fas fa-times hide "></i>
    </label>
    <ul>
        <li><a href="/SMILIPS/view/pages/sistema/home.php">Home</a></li>
        <li><a href="#">Imóveis</a></li>
        <li><a href="#">Serviços</a></li>
        <li><a href="#">Contato</a></li>
        <li>
            <!-- se existir a variavel de sessao usuarioID coloque no nav o nome do usuario -->
            <?php if (isset($_SESSION['usuarioID'])) : ?>
                <a href="/SMILIPS/view/pages/usuario/home.php">
                    <?php $primeiroNome = preg_split('/\s/', $_SESSION['nomeUsuario']) ?>
                    <i class="far fa-user"></i> <?php echo $primeiroNome[0] ?>
                </a>
                <!-- se n, se existe a variavel de sessao idAdm coloque o nome ADM no nav-->
            <?php elseif (isset($_SESSION['idAdm'])) : ?>
                <a href="/SMILIPS/view/pages/administrador/home.php">
                    <i class="fas fa-tools"></i> ADM
                </a>
                <!-- se n, coloca o nome login -->
            <?php else : ?>
                <a href="/SMILIPS/view/pages/sistema/login.php">
                    <i class="fas fa-sign-in-alt "></i></i>Login
                </a>
            <?php endif; ?>
        </li>
    </ul>

</nav>

<script src="/SMILIPS/view/js/sistema/nav.js "></script>