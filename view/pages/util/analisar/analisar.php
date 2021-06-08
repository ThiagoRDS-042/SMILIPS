<link rel="stylesheet" href="/SMILIPS/view/css/util/analisar/analisar.css">

<?php if (isset($_SESSION['avaliarPlano'])) : ?>

  <form action="/SMILIPS/controller/DAO/notificacaoAnalisePlano/notificacaoAnalisePlanoDAO.php" method="post">
    <input type="hidden" name="planoUsuarioID" value="<?php echo $_GET['consultar'] ?>">

    <input type="checkbox" id="avaliacao">
    <label for="avaliacao">
      <h3 name="avaliar">Inválidar</h3>
    </label>

    <button type="submit" name="avaliar" value="Valido">Validar</button>

    <div class="msg">
      <div class="title">
        <h1>Inválidar Plano?</h1>
      </div>


      <div class="content">
        <textarea name="descricao" id="descricao" cols="30" rows="5" maxlength="250"></textarea>
        <span data-placeholder='Motivo' class="info_field"></span>
        <span class="count">250</span>
      </div>

      <div class="buttons">
        <button type="button" name="cancelar">Cancelar</button>
        <button type="submit" name="avaliar" value="Excluido">Confirmar</button>
      </div>
    </div>

  </form>

<?php elseif (isset($_SESSION['avaliarPropaganda'])) : ?>

  <form action="/SMILIPS/controller/DAO/notificacaoAnalisePropaganda/notificacaoAnalisePropagandaDAO.php" method="post">
    <input type="hidden" name="propagandaID" value="<?php echo $_GET['consultar'] ?>">

    <input type="checkbox" id="avaliacao">
    <label for="avaliacao">
      <h3 name="avaliar">Inválidar</h3>
    </label>

    <button type="submit" name="avaliar" value="Valida">Validar</button>

    <div class="msg">
      <div class="title">
        <h1>Inválidar Propaganda?</h1>
      </div>


      <div class="content">
        <textarea name="descricao" id="descricao" cols="30" rows="5" maxlength="250"></textarea>
        <span data-placeholder='Motivo' class="info_field"></span>
        <span class="count">250</span>
      </div>

      <div class="buttons">
        <button type="button" name="cancelar">Cancelar</button>
        <button type="submit" name="avaliar" value="Excluida">Confirmar</button>
      </div>
    </div>

  </form>

<?php else : ?>

  <form action="/SMILIPS/controller/DAO/notificacaoAnaliseImovel/notificacaoAnaliseImovelDAO.php" method="post">
    <input type="hidden" name="id" value="<?php echo $imovel['imovelID'] ?>" id="id">

    <input type="checkbox" id="avaliacao">
    <label for="avaliacao">
      <h3 name="avaliar">Inválidar</h3>
    </label>

    <button type="submit" name="analisar" value="Valido">Válidar</button>

    <div class="msg">
      <div class="title">
        <h1>Inválidar Imóvel?</h1>
      </div>


      <div class="content">
        <textarea name="descricao" id="descricao" cols="30" rows="5" maxlength="250"></textarea>
        <span data-placeholder='Motivo' class="info_field"></span>
        <span class="count">250</span>
      </div>

      <div class="buttons">
        <button type="button" name="cancelar">Cancelar</button>
        <button type="submit" name="analisar" value="Excluido">Confirmar</button>
      </div>
    </div>

  </form>

<?php endif; ?>

<script src="/SMILIPS/view/js/util/analisar/analisar.js" type="module"></script>