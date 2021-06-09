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
  <link rel="stylesheet" href="/SMILIPS/view/css/administrador/usuario/usuarios.css">
  <title>Usuários</title>
</head>

<body>
  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/header.php');
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/menu.php');
  require_once('/xampp/htdocs/SMILIPS/controller/DAO/usuario/consultar.php');
  consultarUsuarios();
  ?>

  <main>
    <?php
    require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
    ?>
    <h1>Usuários</h1>

    <?php if ($usuarios->num_rows > 0) : ?>
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
    <?php else : ?>
      <h1>O Sistema Não Possui Usuários Cadastrados :(</h1>
    <?php endif; ?>
  </main>


  <?php
  require_once('/xampp/htdocs/SMILIPS/view/pages/administrador/adm/footer.php');
  ?>
</body>

</html>