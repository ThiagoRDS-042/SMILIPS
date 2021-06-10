<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
admLogadoEntra();

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['avaliarImovel'])) {
  unset($_SESSION['avaliarImovel']);
}
if (isset($_SESSION['avaliarPropaganda'])) {
  unset($_SESSION['avaliarPropaganda']);
}
if (isset($_SESSION['detalhesPropaganda'])) {
  unset($_SESSION['detalhesPropaganda']);
}
if (isset($_SESSION['detalhesDenuncia'])) {
  unset($_SESSION['detalhesDenuncia']);
}
if (isset($_SESSION['imovel'])) {
  unset($_SESSION['imovel']);
}
if (isset($_SESSION['servico'])) {
  unset($_SESSION['servico']);
}

$_SESSION['detalhesPlano'] = true;
$_SESSION['avaliarPlano'] = true;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/plano/validarPlano.css">
  <title>Validar Plano</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Validar Plano</h1>

    <section class="info_plano">
      <?php
      require_once('/xampp/htdocs/SMILIPS/view/pages/util/detalhes/detalhesPlano.php');
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