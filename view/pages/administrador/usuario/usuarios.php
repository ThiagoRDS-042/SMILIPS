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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/usuarios.css">
  <title>Usuários</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/usuario/consultar.php');
  consultarUsuarios();
  ?>

  <main>
    <h1>Usuários</h1>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Detalhes</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $usuarios->fetch_assoc()) : ?>
          <tr>
            <td><?php echo $row['nomeUsuario'] ?></td>
            <td><?php echo $row['emailUsuario'] ?></td>
            <td><a href="/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=<?php echo $row['usuarioID'] ?>">Detalhes</a></td>
          </tr>
        <?php endwhile; ?>
      </tbody>

    </table>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/footer.php');
  ?>
</body>

</html>