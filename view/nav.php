<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<link rel="stylesheet" href="/SMILIPS/view/css/nav.css">
<nav>
    <div class="logo">
        <a href="/SMILIPS/view/pages/home.php">SMILIPS</a>
    </div>
    <input type="checkbox" id="menu">
    <label for="menu" class="icon">
        <i class="fa fa-bars "></i>
        <i class="fas fa-times hide "></i>
    </label>
    <ul>
        <li><a href="/SMILIPS/view/pages/home.php">Home</a></li>
        <li>
            <a href="#">Imóveis</a>
        </li>
        <li>
            <a href="#">Sobre</a>
        </li>
        <li><a href="#">Ajuda</a></li>
        <li><a href="#">Contato</a></li>
        <li>
            <!-- se existir a variavel de sessao usuarioID coloque no nav o nome do usuario se nao coloque login -->
            <?php if (isset($_SESSION['usuarioID'])) : ?>
                <a href="/SMILIPS/view/pages/usuario/home.php">
                    <?php $primeiroNome = preg_split('/\s/', $_SESSION['nomeUsuario']) ?>
                    <i class="far fa-user"></i> <?php echo $primeiroNome[0] ?>
                </a>
            <?php elseif (isset($_SESSION['idAdm'])) : ?>
                <a href="/SMILIPS/view/pages/administrador/home.php">
                    <i class="fas fa-tools"></i> ADM
                </a>
            <?php else : ?>
                <a href="/SMILIPS/view/pages/login.php">
                    <i class="fas fa-sign-in-alt "></i></i>Login
                </a>
            <?php endif; ?>
        </li>
    </ul>

</nav>

<script src="/SMILIPS/view/js/nav.js "></script>