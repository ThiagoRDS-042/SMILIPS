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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/validarImovel.css">
  <title>Válidar Imóvel</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/imovel/consultar.php');
  // chamando a funcao consultarImgsImovel
  consultarImgsImovel();
  ?>

  <main>
    <h1>Válidar Imóvel</h1>

    <section class="info-imovel">
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
              <p>adasdasdasdas</p>
              <span>Rua</span>
            </div>

            <div class="numero">
              <p>123</p>
              <span>Número</span>
            </div>

          </div>

          <div class="field-duo">

            <div class="bairro">
              <p>adasd as dasdas</p>
              <span>Bairro</span>
            </div>

            <div class="complemento">
              <p>adas das dasdasss sssss</p>
              <span>Complemento</span>
            </div>
          </div>
        </div>

        <h1>Detalhes</h1>
        <div class="detalhes">
          <div class="field-quadruplo">
            <div class="quarto">
              <p>4</p>
              <span>Quartos</span>
            </div>
            <div class="banheiro">
              <p>4</p>
              <span>Banheiros</span>
            </div>
            <div class="garagem">
              <p>4</p>
              <span>Garagens</span>
            </div>
            <div class="area">
              <p>4 M²</p>
              <span>Área</span>
            </div>
          </div>
          <div class="field">
            <div class="descricao">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              <span>Descrição</span>
            </div>
          </div>

        </div>

        <h1>Valor</h1>
        <div class="valor">
          <div class="field">
            <div class="valor-imovel">
              <p>R$ 1500,00</p>
              <span>Valor</span>
            </div>
          </div>
        </div>

      </div>

      <h1>Detalhes do Proprietário</h1>
      <div class="detalhes-proprietario">

      </div>

      <form action="#" method="post">
        <input type="hidden" name="id" value="<?php echo $imovel['imovelID'] ?>" id="id">
        <button type="submit" name="invalidar">Inválidar</button>
        <button type="submit" name="validar">Válidar</button>
      </form>
    </section>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>
</body>

</html>