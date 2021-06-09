<link rel="stylesheet" href="/SMILIPS/view/css/util/denunciar/denunciar.css">

<input type="checkbox" id="denunciar">
<div class="denunciar">

  <label for="denunciar">
    <?php if (isset($_SESSION['usuarioID'])) : ?>
      <h3>Denunciar Anúncio <i class="fas fa-exclamation-triangle"></i></h3>
    <?php elseif (isset($_SESSION['idAdm'])) : ?>
      <a href="/SMILIPS/controller/DAO/denunciarImovel/denunciarImovelDAO.php?denunciaADM=<?php echo $_GET['imovelID'] ?>">Denunciar Anúncio <i class="fas fa-exclamation-triangle"></i></a>
    <?php else : ?>
      <a href="/SMILIPS/controller/DAO/denunciarImovel/denunciarImovelDAO.php?denunciarLogin">Denunciar Anúncio <i class="fas fa-exclamation-triangle"></i></a>
    <?php endif; ?>
  </label>
</div>

<div class="conteudo_denuncia">
  <?php if (isset($_SESSION['denunciarImovel'])) : ?>
    <form action="/SMILIPS/controller/DAO/denunciarImovel/denunciarImovelDAO.php" method="post">
    <?php else : ?>
      <form action="/SMILIPS/controller/DAO/denunciarServico/denunciarServicoDAO.php" method="post">
      <?php endif; ?>
      <div class="title">
        <h3>Enviar Denuncia</h3>
      </div>
      <div class="content">
        <?php if (isset($_SESSION['denunciarImovel'])) : ?>
          <input type="hidden" name="id" value="<?php echo $_GET['imovelID']; ?>">
        <?php else : ?>
          <input type="hidden" name="id" value="<?php echo $_GET['servicoID']; ?>">
        <?php endif; ?>
        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['usuarioID']; ?>">
        <textarea name="motivo" id="motivo" cols="30" rows="6" maxlength="250"></textarea>
        <span class="info">Motivo</span>
        <span class="maxlength">250</span>
      </div>
      <div class="buttons">
        <button type="button">Cancelar</button>
        <button type="submit" name="denunciar">Enviar</button>
      </div>
      </form>
</div>

<script src="/SMILIPS/view/js/util/denunciar/denunciar.js" type="module"></script>