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

    <div class="menu-container">
        
        <div class="menu">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="/SMILIPS/view/pages/home.php">
                            <span class="icon"><i class="fa fa-home"></i></span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-user"></i></span>
                            <span class="title">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-comment"></i></span>
                            <span class="title">Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-question-circle"></i></span>
                            <span class="title">Help</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-cog"></i></span>
                            <span class="title">Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-lock"></i></span>
                            <span class="title">Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="/SMILIPS/controller/autenticar/sair.php">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="toggle">
                <i class="fas fa-chevron-right"></i>
                <i class="fas fa-chevron-left hide"></i>
            </div>
        </div>
        <div class="nome">
            <?php $nome = preg_split('/\s/', $_SESSION['nomeUsuario']); ?>
            <h1>Bem Vindo! <?php echo $nome[0]; ?></h1>
        </div>
    </div>

    <script src="/SMILIPS/view/js/usuario/home.js"></script>
</body>
</html>