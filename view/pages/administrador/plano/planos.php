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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/plano/planos.css">
  <title>Planos</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/planoUsuario/consultar.php');
  consultarPlanoAnalise();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>

    <h1>Planos Para a Analise</h1>

    <?php if ($planoUsuarioAnalise->num_rows > 0) : ?>
      <table>
        <thead>
          <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Plano</th>
            <th>Avaliar</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($row = $planoUsuarioAnalise->fetch_assoc()) : ?>
            <tr>
              <td><?php echo $row['nomeUsuario'] ?></td>
              <td><?php echo $row['emailUsuario'] ?></td>
              <td><?php echo $row['situacao'] ?></td>
              <td><a href="/SMILIPS/view/pages/administrador/plano/validarPlano.php?consultar=<?php echo $row['planoUsuarioID'] ?>">Avaliar</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else : ?>
      <h1>Nenhum Plano Disponível Para a Analise :(</h1>
    <?php endif; ?>

  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>
</body>

</html>