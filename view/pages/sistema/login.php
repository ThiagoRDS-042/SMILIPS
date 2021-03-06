<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de usuarioLogadoNEntra(), pra n exibir essa tela caso o usuario esteja logado
usuarioLogadoNEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/sistema/login.css">
  <title>Login</title>
</head>

<body>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <div class="voltar">
      <a href="/SMILIPS/view/pages/sistema/home.php"><i class="fas fa-chevron-left"></i> Voltar</a>
    </div>
    <div class="middle">
      <h1>Faça seu Acesso</h1>
      <form action="/SMILIPS/controller/autenticar/autenticar.php" method="POST">
        <div class="field-input">
          <input type="text" name="email" required>
          <span data-placeholder="Email"></span>
        </div>
        <div class="field-input">
          <input type="password" class="visible" name="senha" required>
          <span data-placeholder="Senha"></span>
          <i class="fa fa-eye"></i>
        </div>
        <div class="field-button">
          <button type="submit" name="autenticar"><i class="fas fa-sign-in-alt"></i>Login</button>
        </div>

        <div class="txt-bottom">
          <p>Não tem uma conta?<a href="/SMILIPS/view/pages/sistema/cadastro.php"> Cadastre-se</a></p>
        </div>

      </form>
    </div>

  </main>

  <script src="/SMILIPS/view/js/sistema/login.js" type="module"></script>
</body>

</html>