<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
// chamando a funcao de admLogadoEntra(), pra n exibir essa tela caso o adm n esteja logado
admLogadoEntra();

if (isset($_SESSION['detalhesPlano'])) {
  unset($_SESSION['detalhesPlano']);
}
if (isset($_SESSION['detalhesPropaganda'])) {
  unset($_SESSION['detalhesPropaganda']);
}

$_SESSION['detalhesDenuncia'] = true;

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/sistema/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/denuncia/detalhesDenuncia.css">
  <title>Detalhes da Denuncia</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/denunciarImovel/consultar.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/denunciarServico/consultar.php');
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <?php if (isset($_SESSION['imovel'])) : ?>
      <?php if ($proprietario->num_rows > 0) : ?>
        <h1>Detalhes da Denuncia</h1>

        <div class="denuncia">
          <?php
          require_once('/xampp/htdocs/SMILIPS/view/pages/util/detalhes/detalhesUsuario.php');
          ?>

          <h1 class="title">Motivo da Denuncia</h1>
          <div class="motivo">
            <p><?php echo $denunciaImovel['motivo']; ?></p>
          </div>

          <?php
          require_once('/xampp/htdocs/SMILIPS/view/pages/util/detalhes/detalhesImovel.php');
          ?>

          <?php
          $proprietario = $proprietario->fetch_assoc();
          ?>
          <div class="usuario">
            <h1>Detalhes do Proprietário</h1>
            <div class="detalhes_usuario">
              <div class="img-perfil">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($proprietario['ftPerfil']) ?>" alt="">
              </div>
              <div class="info-user">
                <div class="field-duo">
                  <div class="nome">
                    <p><?php echo $proprietario['nomeUsuario'] ?></p>
                    <span>Nome</span>
                  </div>
                  <div class="telefone">
                    <p><?php echo $proprietario['telefone'] ?></p>
                    <span>Telefone</span>
                  </div>
                </div>

                <div class="field-duo">
                  <div class="rua">
                    <p><?php echo $proprietario['rua'] ?></p>
                    <span>Rua</span>
                  </div>
                  <div class="numero">
                    <p><?php echo $proprietario['numero'] ?></p>
                    <span>Número</span>
                  </div>
                </div>

                <div class="field-duo">
                  <div class="bairro">
                    <p><?php echo $proprietario['bairro'] ?></p>
                    <span>Bairro</span>
                  </div>
                  <div class="complemento">
                    <?php if ($proprietario['complemento'] == '') : ?>
                      <p>Não Informado!</p>
                    <?php else : ?>
                      <p><?php echo $proprietario['complemento'] ?></p>
                    <?php endif; ?>
                    <span>Complemento</span>
                  </div>
                </div>

                <div class="field-duo">
                  <div class="email">
                    <p><?php echo $proprietario['emailUsuario'] ?></p>
                    <span>E-mail</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="buttons">
            <a href="/SMILIPS/view/pages/administrador/denuncia/denuncias.php">Voltar</a>
            <a href="/SMILIPS/controller/DAO/denunciarImovel/denunciarImovelDAO.php?marcar_como_vista=1&&denunciaImovelID=<?php echo $denunciaImovel['denunciaImovelID'] ?>">Marcar como Vista</a>
            <a href="/SMILIPS/view/pages/administrador/imovel/gerenciarImovel.php?imovelID=<?php echo $imovel['imovelID'] ?>&&usuarioID=<?php echo $proprietario['usuarioID'] ?>">Ir para o Imóvel</a>
          </div>
        </div>

      <?php else : ?>
        <h1>Nenhuma Denúncia Disponível</h1>
      <?php endif; ?>
    <?php elseif (isset($_SESSION['servico'])) : ?>
      <?php if ($prestador->num_rows > 0 and isset($_SESSION['servico'])) : ?>
        <h1>Detalhes da Denuncia</h1>

        <div class="denuncia">
          <?php
          require_once('/xampp/htdocs/SMILIPS/view/pages/util/detalhes/detalhesUsuario.php');
          ?>

          <h1 class="title">Motivo da Denuncia</h1>
          <div class="motivo">
            <p><?php echo $denunciaServico['motivo']; ?></p>
          </div>

          <?php
          $prestador = $prestador->fetch_assoc();
          ?>

          <h1 class="title">Serviço</h1>
          <div class="servico">
            <div class="tipo_servico">
              <p><?php echo $prestador['tipoServico']; ?></p>
              <span>Tipo de Serviço</span>
            </div>
            <div class="descricao_servico">
              <p><?php echo $prestador['descricao']; ?></p>
              <span>Descrição</span>
            </div>
          </div>

          <div class="usuario">
            <h1>Detalhes do Prestador de Serviço</h1>
            <div class="detalhes_usuario">
              <div class="img-perfil">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($prestador['ftPerfil']) ?>" alt="">
              </div>
              <div class="info-user">
                <div class="field-duo">
                  <div class="nome">
                    <p><?php echo $prestador['nomeUsuario'] ?></p>
                    <span>Nome</span>
                  </div>
                  <div class="telefone">
                    <p><?php echo $prestador['telefone'] ?></p>
                    <span>Telefone</span>
                  </div>
                </div>

                <div class="field-duo">
                  <div class="rua">
                    <p><?php echo $prestador['rua'] ?></p>
                    <span>Rua</span>
                  </div>
                  <div class="numero">
                    <p><?php echo $prestador['numero'] ?></p>
                    <span>Número</span>
                  </div>
                </div>

                <div class="field-duo">
                  <div class="bairro">
                    <p><?php echo $prestador['bairro'] ?></p>
                    <span>Bairro</span>
                  </div>
                  <div class="complemento">
                    <?php if ($prestador['complemento'] == '') : ?>
                      <p>Não Informado!</p>
                    <?php else : ?>
                      <p><?php echo $prestador['complemento'] ?></p>
                    <?php endif; ?>
                    <span>Complemento</span>
                  </div>
                </div>

                <div class="field-duo">
                  <div class="email">
                    <p><?php echo $prestador['emailUsuario'] ?></p>
                    <span>E-mail</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="buttons">
            <a href="/SMILIPS/view/pages/administrador/denuncia/denuncias.php">Voltar</a>
            <a href="/SMILIPS/controller/DAO/denunciarServico/denunciarServicoDAO.php?marcar_como_vista=1&&denunciaServicoID=<?php echo $denunciaServico['denunciaServicoID'] ?>">Marcar como Vista</a>
            <a href="/SMILIPS/view/pages/administrador/servico/gerenciarServicos.php?servicoID=<?php echo $servicoID ?>&&usuarioID=<?php echo $prestador['usuarioID'] ?>">Ir para o Servico</a>
          </div>
        </div>

      <?php else : ?>
        <h1>Nenhuma Denúncia Disponível</h1>
      <?php endif; ?>
    <?php endif; ?>

  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>

</body>

</html>