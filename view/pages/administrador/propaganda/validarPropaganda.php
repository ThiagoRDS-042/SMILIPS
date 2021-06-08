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
if (isset($_SESSION['avaliarPlano'])) {
  unset($_SESSION['avaliarPlano']);
}

$_SESSION['avaliarPropaganda'] = true;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/propaganda/validarPropaganda.css">
  <title>Validar Propaganda</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/propaganda/consultar.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Validar Propaganda</h1>

    <section class="info_propaganda">
      <div class="propaganda">
        <div class="img_propaganda">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($propagandaUsuario['propaganda']) ?>" alt="Imagem da propaganda">
        </div>
      </div>

      <h1>Detalhes do Proprietário</h1>
      <div class="detalhes-usuario">
        <div class="img-perfil">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($propagandaUsuario['ftPerfil']) ?>" alt="">
        </div>
        <div class="info-user">
          <div class="field-duo">
            <div class="nome">
              <p><?php echo $propagandaUsuario['nomeUsuario'] ?></p>
              <span>Nome</span>
            </div>
            <div class="telefone">
              <p><?php echo $propagandaUsuario['telefone'] ?></p>
              <span>Telefone</span>
            </div>
          </div>

          <div class="field-duo">
            <div class="rua">
              <p><?php echo $propagandaUsuario['rua'] ?></p>
              <span>Rua</span>
            </div>
            <div class="numero">
              <p><?php echo $propagandaUsuario['numero'] ?></p>
              <span>Número</span>
            </div>
          </div>

          <div class="field-duo">
            <div class="bairro">
              <p><?php echo $propagandaUsuario['bairro'] ?></p>
              <span>Bairro</span>
            </div>
            <div class="complemento">
              <?php if ($propagandaUsuario['complemento'] == '') : ?>
                <p>Não Informado!</p>
              <?php else : ?>
                <p><?php echo $propagandaUsuario['complemento'] ?></p>
              <?php endif; ?>
              <span>Complemento</span>
            </div>
          </div>

          <div class="field-duo">
            <div class="email">
              <p><?php echo $propagandaUsuario['emailUsuario'] ?></p>
              <span>E-mail</span>
            </div>
          </div>
        </div>
      </div>

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