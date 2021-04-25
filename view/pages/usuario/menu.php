<link rel="stylesheet" href="/SMILIPS/view/css/usuario/menu.css">
<div class="menu">
    <div class="navigation">
        <ul>
            <li class="menu-home">
                <a href="/SMILIPS/view/pages/usuario/home.php">
                    <span class="icon"><i class="fa fa-home"></i></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="menu-perfil">

                <!-- passando o id do usuario para a variavel get -->
                <a href="/SMILIPS/view/pages/usuario/perfil.php?consultar=<?php echo $_SESSION['usuarioID'] ?>">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <span class="title">Perfil</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-comment"></i></span>
                    <span class="title">Mensagens</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><i class="fa fa-question-circle"></i></span>
                    <span class="title">Ajuda</span>
                </a>
            </li>
            <li class="menu-config">
                <a href="/SMILIPS/view/pages/usuario/configuracoes.php">
                    <span class="icon"><i class="fa fa-cog"></i></span>
                    <span class="title">Configurações</span>
                </a>
            </li>
            <li class="menu-senha">
                <a href="/SMILIPS/view/pages/usuario/editarSenha.php">
                    <span class="icon"><i class="fa fa-lock"></i></span>
                    <span class="title">Senha</span>
                </a>
            </li>
            <li>
                <a href="/SMILIPS/controller/autenticar/sair.php">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="title">Sair</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="toggle">
        <i class="fas fa-chevron-right"></i>
        <i class="fas fa-chevron-left hide"></i>
    </div>
</div>

<script src="/SMILIPS/view/js/usuario/menu.js"></script>