<?php
require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
// chamando a funcao consultarImgsImovel
consultarImgsImovel();
?>

<link rel="stylesheet" href="/SMILIPS/view/css/util/detalhes/detalhesImovel.css">

<div class="imovel">
  <h1>Imagens do Imóvel</h1>
  <div class="imgs-imovel">
    <!-- enquanto tiver imgsimoveis, exiba um card para cada img -->
    <?php while ($row = $imgImovel->fetch_assoc()) : ?>
      <div class="card" id="<?php echo $row['imgImovelID'] ?>">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']) ?>" alt="Imagem de um Imóvel" class="preview-img">
      </div>
      <!-- finalizando o while -->
    <?php endwhile; ?>
  </div>

  <h1>Detalhes do Imóvel</h1>
  <div class="detalhes-imovel">
    <h1>Endereço</h1>
    <div class="endereco">

      <div class="field-duo">
        <div class="rua">
          <p><?php echo $imovel['rua'] ?></p>
          <span>Rua</span>
        </div>

        <div class="numero">
          <p><?php echo $imovel['numero'] ?></p>
          <span>Número</span>
        </div>

      </div>

      <div class="field-duo">

        <div class="bairro">
          <p><?php echo $imovel['bairro'] ?></p>
          <span>Bairro</span>
        </div>

        <div class="complemento">
          <?php if ($imovel['complemento'] == '') : ?>
            <p>Não Informado!</p>
          <?php else : ?>
            <p><?php echo $imovel['complemento'] ?></p>
          <?php endif; ?>
          <span>Complemento</span>
        </div>
      </div>
    </div>

    <h1>Detalhes</h1>
    <div class="detalhes">
      <div class="field-quadruplo">
        <div class="quarto">
          <p><?php echo $imovel['qtdQuarto'] ?></p>
          <span>Quartos</span>
        </div>
        <div class="banheiro">
          <p><?php echo $imovel['qtdBanheiro'] ?></p>
          <span>Banheiros</span>
        </div>
        <div class="garagem">
          <p><?php echo $imovel['qtdGaragem'] ?></p>
          <span>Garagens</span>
        </div>
        <div class="area">
          <p><?php echo $imovel['area'] ?></p>
          <span>Área</span>
        </div>
      </div>
      <div class="field">
        <div class="descricao">
          <?php if ($imovel['complemento'] == '') : ?>
            <p>Não Informado!</p>
          <?php else : ?>
            <p><?php echo $imovel['descricao'] ?></p>
          <?php endif; ?>
          <span>Descrição</span>
        </div>
      </div>

    </div>

    <h1>Valor</h1>
    <div class="valor">
      <div class="field">
        <div class="valor-imovel">
          <p>R$ <?php echo $imovel['valorAluguel'] ?>,00</p>
          <span>Valor</span>
        </div>
      </div>
    </div>

  </div>
</div>