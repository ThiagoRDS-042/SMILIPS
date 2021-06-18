<?php
require_once('/xampp/htdocs/SMILIPS/controller/DAO/usuario/consultar.php');
consultarFtPerfil();
require_once('/xampp/htdocs/SMILIPS/controller/DAO/notificacaoServico/consultar.php');
consultarNotificacaoServico();
require_once('/xampp/htdocs/SMILIPS/controller/DAO/notificacaoAnaliseImovel/consultar.php');
consultarNotificacaoAnaliseImovel();
require_once('/xampp/htdocs/SMILIPS/controller/DAO/notificacaoAnalisePlano/consultar.php');
consultarNotificacaoAnalisePlano();
require_once('/xampp/htdocs/SMILIPS/controller/DAO/notificacaoAnalisePropaganda/consultar.php');
consultarNotificacaoAnalisePropaganda();

$qtdNotificacoesUsuario = $notificacaoAnaliseImovel->num_rows + $notificacaoAnalisePlano->num_rows + $notificacaoAnalisePropaganda->num_rows + $notificacaoServico->num_rows;
?>
<link rel="stylesheet" href="/SMILIPS/view/css/usuario/header.css">
<header>
  <div class="logo">
    <a href="/SMILIPS/view/pages/sistema/home.php">SMILIPS</a>
  </div>

  <input type="checkbox" id="notification">

  <div class="notification">
    <?php if ($qtdNotificacoesUsuario > 0) : ?>
      <div>
        <p><?php echo $qtdNotificacoesUsuario; ?></p>
      </div>
    <?php endif; ?>
    <label for="notification">
      <i class="far fa-bell"></i>
    </label>
  </div>

  <div class="content_notification">
    <?php if ($notificacaoAnaliseImovel->num_rows > 0) : ?>
      <?php while ($row = $notificacaoAnaliseImovel->fetch_assoc()) : ?>
        <div class="notificacao">
          <input type="hidden" name="type" value="Imovel">
          <input type="hidden" name="id" value="<?php echo $row['notificacaoAnaliseImovelID'] ?>">
          <?php if ($row['situacao'] == 'Excluido') : ?>
            <p><i class="fas fa-exclamation-circle"></i>Seu Imóvel não foi Aprovado. Motivo: <?php echo $row['mensagem'] ?></p>
          <?php else : ?>
            <p><i class="fas fa-check-circle"></i>Seu Imóvel foi Aprovado na Analise!</p>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php if ($notificacaoAnalisePlano->num_rows > 0) : ?>
      <?php while ($row = $notificacaoAnalisePlano->fetch_assoc()) : ?>
        <div class="notificacao">
          <input type="hidden" name="type" value="Plano">
          <input type="hidden" name="id" value="<?php echo $row['notificacaoAnalisePlanoID'] ?>">
          <?php if ($row['situacao'] == 'Excluido') : ?>
            <p><i class="fas fa-exclamation-circle"></i>Seu Plano não foi Aprovado. Motivo: <?php echo $row['mensagem'] ?></p>
          <?php else : ?>
            <p><i class="fas fa-check-circle"></i>Seu Plano foi Aprovado na Analise!</p>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php if ($notificacaoAnalisePropaganda->num_rows > 0) : ?>
      <?php while ($row = $notificacaoAnalisePropaganda->fetch_assoc()) : ?>
        <div class="notificacao">
          <input type="hidden" name="type" value="Propaganda">
          <input type="hidden" name="id" value="<?php echo $row['notificacaoAnalisePropagandaID'] ?>">
          <?php if ($row['situacao'] == 'Excluida') : ?>
            <p><i class="fas fa-exclamation-circle"></i>Sua Propaganda não foi Aprovada. Motivo: <?php echo $row['mensagem'] ?></p>
          <?php else : ?>
            <p><i class="fas fa-check-circle"></i>Sua Propaganda foi Aprovada na Analise!</p>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php if ($notificacaoServico->num_rows > 0) : ?>
      <?php while ($row = $notificacaoServico->fetch_assoc()) : ?>
        <div class="notificacao">
          <input type="hidden" name="type" value="Serviço">
          <input type="hidden" name="id" value="<?php echo $row['notificacaoServicoID'] ?>">
          <p><i class="fas fa-exclamation-circle"></i>Seu Serviço foi Deletado!. Motivo: <?php echo $row['mensagem'] ?></p>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

  </div>

  <div class="card_notificacao">
    <div class="title">
      <h3>Notificação</h3>
    </div>

    <div class="content">
      <p>Seu Imóvel foi Aprovado na Analise!</p>
    </div>

    <div class="button">
      <form action="" method="post">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="url" value="<?php echo str_replace("Novo/", "", $_SERVER["REQUEST_URI"]); ?>">
        <button type="submit" name="edity">Ok</button>
      </form>
    </div>
  </div>

  <div class="user">
    <!-- se o usuario tem um ft de perfil cadastrada exiba ela se nao exiba a padrao do sistema -->
    <?php if ($ftPerfil != null) : ?>
      <a href="/SMILIPS/view/pages/usuario/perfil.php?consultar=<?php echo $_SESSION['usuarioID'] ?>"><img src="/SMILIPS/controller/DAO/usuario/imgPerfil.php" alt="Imagem do Usuário"></a>
    <?php else : ?>
      <a href="/SMILIPS/view/pages/usuario/perfil.php?consultar=<?php echo $_SESSION['usuarioID'] ?>"><img src="/SMILIPS/view/images/usuario/user.png" alt="Imagem do Usuário"></a>
    <?php endif; ?>
  </div>
</header>

<script src="/SMILIPS/view/js/usuario/header.js"></script>