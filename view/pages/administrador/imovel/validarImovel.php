<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
admLogadoEntra();

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['avaliarPlano'])) {
  unset($_SESSION['avaliarPlano']);
}
if (isset($_SESSION['avaliarPropaganda'])) {
  unset($_SESSION['avaliarPropaganda']);
}
if (isset($_SESSION['detalhesPropaganda'])) {
  unset($_SESSION['detalhesPropaganda']);
}
if (isset($_SESSION['detalhesPlano'])) {
  unset($_SESSION['detalhesPlano']);
}

$_SESSION['avaliarImovel'] = true;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/imovel/validarImovel.css">
  <title>Válidar Imóvel</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  // chamando a funcao consultarImgsImovel
  consultarImgsImovel();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Válidar Imóvel</h1>

    <section class="info-imovel">
      <?php
      require_once('/xampp/htdocs/SMILIPS/view/pages/util/detalhes/detalhesImovel.php');
      ?>

      <?php
      require_once('/xampp/htdocs/SMILIPS/view/pages/util/detalhes/detalhesUsuario.php');
      ?>

      <?php
      require_once('/xampp/htdocs/SMILIPS/view/pages/util/analisar/analisar.php');
      ?>
    </section>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>
</body>

</html>