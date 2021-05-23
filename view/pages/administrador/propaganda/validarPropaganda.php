<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
admLogadoEntra();
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

      <form action="/SMILIPS/controller/DAO/notificacaoAnalisePropaganda/notificacaoAnalisePropagandaDAO.php" method="post">
        <input type="hidden" name="propagandaID" value="<?php echo $_GET['consultar'] ?>">
        <input type="checkbox" id="propaganda_invalida">
        <label for="propaganda_invalida">
          <h3 name="avaliar" value="Excluido">Inválidar</h3>
        </label>
        <!-- <button type="submit" name="analisar" value="excluir">Inválidar</button> -->
        <button type="submit" name="avaliar" value="Valida">Validar</button>

        <div class="msg_propaganda">
          <div class="title">
            <h1>Inválidar Plano?</h1>
          </div>

          <div class="content">
            <textarea name="descricao" id="descricao" cols="30" rows="5" maxlength="250"></textarea>
            <span data-placeholder='Motivo'></span>
          </div>

          <div class="buttons">
            <button type="button" name="cancelar">Cancelar</button>
            <button type="submit" name="avaliar" value="Excluida">Confirmar</button>
          </div>
        </div>
      </form>
    </section>
  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>

  <script src="/SMILIPS/view/js/administrador/validarPropaganda.js" type="module"></script>
</body>

</html>