<link rel="stylesheet" href="/SMILIPS/view/css/administrador/adm/menu.css">
<div class="menu">
  <div class="navigation">
    <ul>
      <li class="menu-home">
        <a href="/SMILIPS/view/pages/administrador/adm/home.php">
          <span class="icon"><i class="fa fa-home"></i></span>
          <span class="title">Home</span>
        </a>
      </li>
      <li class="menu-perfil">
        <!-- passando o id do adm para a variavel get -->
        <a href="/SMILIPS/view/pages/administrador/adm/conta.php?consultar=<?php echo $_SESSION['idAdm'] ?>">
          <span class="icon"><i class="fa fa-user"></i></span>
          <span class="title">Conta</span>
        </a>
      </li>
      <li class="menu-senha">
        <a href="/SMILIPS/view/pages/administrador/adm/editarSenha.php">
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