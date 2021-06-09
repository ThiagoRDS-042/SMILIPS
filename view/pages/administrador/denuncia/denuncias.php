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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/denuncia/denuncias.css">
  <title>Gerenciar Denuncias</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/denunciarImovel/consultar.php');
  consultarDenunciasImovelNExibidas();
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/denunciarServico/consultar.php');
  consultarDenunciasServicoNExibidas();
  ?>

  <main>
    <?php if ($denunciasImovel->num_rows > 0) : ?>
      <h1>Denuncias sobre Imóveis</h1>

      <table>
        <thead>
          <tr>
            <th>Delator</th>
            <th>E-mail</th>
            <th>Denuncia</th>
            <th>Detalhes</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $denunciasImovel->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $row['nomeUsuario'] ?></td>
              <td><?php echo $row['emailUsuario'] ?></td>
              <td class="motivo"><?php echo $row['motivo'] ?></td>
              <td><a href="/SMILIPS/view/pages/administrador/denuncia/detalhesDenuncia.php?denunciaImovelID=<?php echo $row['denunciaImovelID'] ?>">Detalhes</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>

      </table>
    <?php endif; ?>


    <?php if ($denunciasServico->num_rows > 0) : ?>
      <h1 class="servico">Denuncias sobre Serviços</h1>

      <table>
        <thead>
          <tr>
            <th>Delator</th>
            <th>E-mail</th>
            <th>Denuncia</th>
            <th>Detalhes</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $denunciasServico->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $row['nomeUsuario'] ?></td>
              <td><?php echo $row['emailUsuario'] ?></td>
              <td class="motivo"><?php echo $row['motivo'] ?></td>
              <td><a href="/SMILIPS/view/pages/administrador/denuncia/detalhesDenuncia.php?denunciaServicoID=<?php echo $row['denunciaServicoID'] ?>">Detalhes</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>

      </table>
    <?php endif; ?>

    <?php if ($denunciasImovel->num_rows == 0 and $denunciasServico->num_rows == 0) : ?>
      <h1>Nenhuma Denuncia Disponível</h1>
    <?php endif; ?>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>
</body>

</html>