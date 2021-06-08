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
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/planoUsuario/consultar.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Validar Plano</h1>

    <section class="info_plano">
      <div class="plano">
        <div class="img_comprovante">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($planoUsuario['comprovante']) ?>" alt="Imagem do comprovante de pagamento">
        </div>
        <a href="/SMILIPS/controller/DAO/planoUsuario/imgComprovante.php?comprovante=<?php echo $planoUsuario['planoUsuarioID'] ?>">Baixar Comprovante <i class="fas fa-download"></i></a>
      </div>

      <h1>Detalhes do Proprietário</h1>
      <div class="detalhes-usuario">
        <div class="img-perfil">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($planoUsuario['ftPerfil']) ?>" alt="">
        </div>
        <div class="info-user">
          <div class="field-duo">
            <div class="nome">
              <p><?php echo $planoUsuario['nomeUsuario'] ?></p>
              <span>Nome</span>
            </div>
            <div class="telefone">
              <p><?php echo $planoUsuario['telefone'] ?></p>
              <span>Telefone</span>
            </div>
          </div>

          <div class="field-duo">
            <div class="rua">
              <p><?php echo $planoUsuario['rua'] ?></p>
              <span>Rua</span>
            </div>
            <div class="numero">
              <p><?php echo $planoUsuario['numero'] ?></p>
              <span>Número</span>
            </div>
          </div>

          <div class="field-duo">
            <div class="bairro">
              <p><?php echo $planoUsuario['bairro'] ?></p>
              <span>Bairro</span>
            </div>
            <div class="complemento">
              <?php if ($planoUsuario['complemento'] == '') : ?>
                <p>Não Informado!</p>
              <?php else : ?>
                <p><?php echo $planoUsuario['complemento'] ?></p>
              <?php endif; ?>
              <span>Complemento</span>
            </div>
          </div>

          <div class="field-duo">
            <div class="email">
              <p><?php echo $planoUsuario['emailUsuario'] ?></p>
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