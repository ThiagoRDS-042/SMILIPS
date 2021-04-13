<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/imovel/cadastro.css">
  <title>Cadastro de Imóvel</title>
</head>

<body>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  ?>
  <div class="container">
    <h1>Cadastro de Imóvel</h1>
  </div>
  <section>
    <?php
    require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
    ?>
  </section>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <!--/SMILIPS/controller/usuario/teste.php -->
    <form action="#" method="post" enctype="multipart/form-data">
      <div class="type-imovel">
        <h1>Tipo de Imóvel:</h1>
        <div class="select-box">

          <div class="list-options">

            <label for="apartamento">
              <div class="option type">
                <input type="radio" class="radio" id="apartamento" name="type" value="apartamento" />
                <span>Apartamento</span>
              </div>
            </label>

            <label for="residencial">
              <div class="option type">
                <input type="radio" class="radio" id="residencial" name="type" value="residencial" />
                <span>Residencial</span>
              </div>
            </label>

            <label for="comercial">
              <div class="option type">
                <input type="radio" class="radio" id="comercial" name="type" value="comercial" />
                <span>Comercial</span>
              </div>
            </label>

            <label for="kitnet">
              <div class="option type">
                <input type="radio" class="radio" id="kitnet" name="type" value="kitnet" />
                <span>Kitnet</span>
              </div>
            </label>

          </div>

          <div class="select">Tipo de imóvel</div>

        </div>
      </div>

      <div class="endereco">
        <h1>Endereço do Imóvel:</h1>
        <div class="field-input">
          <input type="text" name="endereco" required class="obrigatorio">
          <span data-placeholder="Endereço" class="info_field"></span>
        </div>
        <div class="field-input">
          <input type="text" name="bairro" required class="obrigatorio">
          <span data-placeholder="Bairro" class="info_field"></span>
        </div>
        <div class="field-duo">
          <div class="field-input">
            <input type="text" name="complemento" class="complemento">
            <span data-placeholder="Complemento" class="info_field"></span>
          </div>
          <div class="field-input">
            <input type="text" name="numero" required class="obrigatorio">
            <span data-placeholder="Número" class="info_field"></span>
          </div>
        </div>
      </div>

      <div class="detalhes-imovel">
        <h1>Detalhes do Imóvel:</h1>
        <div class="field-duo">
          <div class="field-input">
            <input type="text" name="qtdQuarto" required class="obrigatorio">
            <span data-placeholder="Quarto" class="info_field"></span>
          </div>
          <div class="field-input">
            <input type="text" name="qtdBanheiro" required class="obrigatorio">
            <span data-placeholder="Banheiro" class="info_field"></span>
          </div>
        </div>

        <div class="field-duo">
          <div class="field-input">
            <input type="text" name="qtdGgaragem" required class="obrigatorio">
            <span data-placeholder="Garagem" class="info_field"></span>
          </div>
          <div class="field-input">
            <input type="text" name="area" required class="obrigatorio">
            <span data-placeholder="Area" class="info_field"></span>
          </div>
        </div>

        <div class="field-input">
          <textarea name="descricao" id="descricao" cols="30" rows="6"></textarea>
          <span data-placeholder="Descrição" class="descri info_field"></span>
        </div>
      </div>

      <div class="value-imovel">
        <h1>Valor do Imóvel:</h1>
        <div class="field-input">
          <input type="text" name="valor" required class="obrigatorio">
          <span data-placeholder="Valor do Imóvel" class="info_field"></span>
          <span data-placeholder=",00" class="reais"></span>
        </div>
      </div>

      <div class="container-img">
        <span class="icon-voltar"><i class="fas fa-chevron-left"></i></span>
        <div class="list-img">
          <div class="list-img-slider preview">

          </div>
        </div>
        <span class="icon-proximo"><i class="fas fa-chevron-right"></i></span>
      </div>

      <div class="img-imovel">
        <h1>Imagens do Imóvel:</h1>
        <label for="btn">
          <div class="select-img">
            <i class="far fa-images"></i>
            <h1>Selecionar Imagens</h1>
          </div>

          <input type="file" multiple name="image[]" id="btn">
        </label>
      </div>

      <button type="submit" name="cadastro-imovel">enviar</button>
    </form>

  </main>

  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/imovel/previewImoveis.js" type="module"></script>
  <script src="/SMILIPS/view/js/imovel/cadastro.js"></script>
</body>

</html>