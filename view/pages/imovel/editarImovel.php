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
  <link rel="stylesheet" href="/SMILIPS/view/css/imovel/editarImovel.css">
  <title>Editar Imóvel</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/imovel/consultar.php');
  consultarImgsImovel();
  ?>

  <main>
    <h1>Editar Imóvel</h1>

    <form action="#" method="post" class="info-imovel">
      <span class="icon-delete"><i class="fas fa-trash-alt"></i></span>
      <h1>Imagens do Imóvel</h1>
      <div class="imgs-imovel">
        <input type="hidden" value="<?php echo $imovel['imovelID'] ?>" id="id">
        <?php while ($row = $imgImovel->fetch_assoc()) : ?>
          <label for="<?php echo $row['imgImovelID'] ?>">
            <input type="file" name="imagem<?php echo $row['imgImovelID'] ?>" id="<?php echo $row['imgImovelID'] ?>">
            <div class="card" id="<?php echo $row['imgImovelID'] ?>">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($row['imagem']) ?>" alt="Imagem de um Imóvel" class="preview-img">
              <span class="icon"><i class="fas fa-camera"></i></span>
            </div>
          </label>
        <?php endwhile; ?>
        <span class="obs">Formatos Suportados: PNG, JPG e JPEG, Tamanho Suportado: até 1000 KB.</span>
      </div>

      <div class="type-imv">
        <h1>Detalhes do Imóvel</h1>
        <div class="detalhes">
          <div class="endereco-imovel">

            <div class="field-duo">

              <div class="field-input end">
                <input type="text" name="endereco" required class="obrigatorio">
                <span class="info-field" data-placeholder="Rua"></span>
              </div>

              <div class="field-input num">
                <input type="text" name="numero" required class="obrigatorio numerico">
                <span class="info-field" data-placeholder="Número"></span>
              </div>

            </div>

            <div class="field-duo">

              <div class="field-input">
                <input type="text" name="bairro" required class="obrigatorio">
                <span class="info-field" data-placeholder="Bairro"></span>
              </div>

              <div class="field-input">
                <input type="text" name="complemento" class="complemento">
                <span class="info-field" data-placeholder="Complemento"></span>
              </div>

            </div>

          </div>

          <div class="comodos">
            <div class="field-for">

              <div class="field-input">
                <input type="text" name="qtdQuarto" required class="obrigatorio numerico">
                <span class="info-field" data-placeholder="Quarto"></span>
              </div>

              <div class="field-input">
                <input type="text" name="qtdBanheiro" required class="obrigatorio numerico">
                <span class="info-field" data-placeholder="Banheiro"></span>
              </div>

              <div class="field-input">
                <input type="text" name="qtdGaragem" required class="obrigatorio numerico">
                <span class="info-field" data-placeholder="Garagem"></span>
              </div>

              <div class="field-input">
                <input type="text" name="area" required class="obrigatorio">
                <span class="info-field" data-placeholder="Área"></span>
              </div>

            </div>

            <div class="field-input desc">
              <textarea name="descricao" id="descricao" cols="30" rows="4"></textarea>
              <span class="info-field" data-placeholder="Descrição"></span>
            </div>

          </div>

          <div class="type-value">
            <div class="select-box">

              <div class="list-options">

                <label for="apartamento">
                  <div class="option type">
                    <input type="radio" class="radio" id="apartamento" name="type" value="Apartamento" />
                    <span>Apartamento</span>
                  </div>
                </label>

                <label for="residencial">
                  <div class="option type">
                    <input type="radio" class="radio" id="residencial" name="type" value="Residencial" />
                    <span>Residencial</span>
                  </div>
                </label>

                <label for="comercial">
                  <div class="option type">
                    <input type="radio" class="radio" id="comercial" name="type" value="Comercial" />
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

            <div class="field-input">
              <input type="text" name="valor" required class="obrigatorio numerico">
              <span class="info-field" data-placeholder="Valor"></span>
            </div>

          </div>

        </div>
      </div>

      <div class="btn-enviar">
        <button type="submit" name="editar-imovel">Salvar</button>
      </div>
    </form>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/imovel/editarImovel.js" type="module"></script>
</body>

</html>