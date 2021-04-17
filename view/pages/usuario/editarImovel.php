<?php
require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/head.php');
  ?>
  <link rel="stylesheet" href="/SMILIPS/view/css/usuario/editarImovel.css">
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
        <h1>Tipo de Imóvel</h1>
        <div class="content"></div>
      </div>

      <div class="btn-enviar">
        <button type="submit" name="editar-imovel">Salvar</button>
      </div>
    </form>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
  ?>

  <script src="/SMILIPS/view/js/usuario/editarImovel.js"></script>
</body>

</html>