<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

// consulta os planos exbirados dos usuarios
function consultarDataFim()
{
  global $conexao;
  $dataHoje = preg_split("/-/", date("Y-m-d"));

  // pesquisando todos os planos ativos dos usuarios
  $planoUsuario = $conexao->query("SELECT * FROM planoUsuario WHERE situacao = 'Ativado'") or die($conexao->error);


  while ($row = $planoUsuario->fetch_assoc()) {

    // comparando a data de expiração do plano com a data atual, para desativar o plano e todas as prpagandas q o usuario possuir
    $dataPlano = preg_split("/-/", $row['dataFim']);

    if ($dataPlano[0] < $dataHoje[0]) {
      $conexao->query("UPDATE planoUsuario SET situacao = 'Desativado' WHERE planoUsuarioID = " . $row['planoUsuarioID']) or die($conexao->error);
      $conexao->query("UPDATE propaganda SET situacao = 'Desativada' WHERE usuarioID =" . $row['usuarioID'] . " AND situacao = 'Ativada'") or die($conexao->error);
    } else if ($dataPlano[0] == $dataHoje[0] && $dataPlano[1] < $dataHoje[1]) {
      $conexao->query("UPDATE planoUsuario SET situacao = 'Desativado' WHERE planoUsuarioID = " . $row['planoUsuarioID']) or die($conexao->error);
      $conexao->query("UPDATE propaganda SET situacao = 'Desativada' WHERE usuarioID =" . $row['usuarioID'] . " AND situacao = 'Ativada'") or die($conexao->error);
    } else if ($dataPlano[0] == $dataHoje[0] && $dataPlano[1] == $dataHoje[1] && $dataPlano[2] > $dataHoje[2]) {
      $conexao->query("UPDATE planoUsuario SET situacao = 'Desativado' WHERE planoUsuarioID = " . $row['planoUsuarioID']) or die($conexao->error);
      $conexao->query("UPDATE propaganda SET situacao = 'Desativada' WHERE usuarioID =" . $row['usuarioID'] . " AND situacao = 'Ativada'") or die($conexao->error);
    }
  }
}

// consulta os planos q n estao desativados dos usuarios
function consultarPlano()
{

  global $conexao, $planoUsuario, $plano;
  $id = $_SESSION['usuarioID'];

  // pesquisando os planos n desativados
  $planoUsuario = $conexao->query("SELECT * FROM planoUsuario INNER JOIN plano on planoUsuario.usuarioID = '$id' AND planoUsuario.situacao != 'Desativado' AND plano.planoID = planoUsuario.planoID") or die($conexao->error);

  if ($planoUsuario->num_rows > 0) {

    $url = str_replace("/Novo/", "", $_SERVER["REQUEST_URI"]);
    if ($url != "/SMILIPS/view/pages/plano/situacaoPlano.php" && $url != '/SMILIPS/view/pages/plano/escolherPlano.php?planoNome') {
      header("location:/SMILIPS/view/pages/plano/situacaoPlano.php");
    }

    $planoUsuario = $planoUsuario->fetch_assoc();
    // pegando o nome do plano
    $plano = $planoUsuario['nome'];
  }
}

// consulta os planos em analise
function consultarPlanoAnalise()
{

  global $conexao, $planoUsuarioAnalise;

  // peaquisando os planos em analise
  $planoUsuarioAnalise = $conexao->query("SELECT u.nomeUsuario, u.emailUsuario, pu.situacao, pu.planoUsuarioID FROM planoUsuario AS pu INNER JOIN usuario AS u ON pu.situacao = 'Em Analise' AND u.usuarioID = pu.usuarioID") or die($conexao->error);
}


// pesquisando o plano do usuario especifico
if (isset($_GET['consultar'])) {
  $idPlanoUsuario = $_GET['consultar'];

  $planoUsuario = $conexao->query("SELECT * FROM planoUsuario AS pu INNER JOIN usuario AS u ON pu.planoUsuarioID = '$idPlanoUsuario' AND pu.usuarioID = u.usuarioID INNER JOIN enderecoUsuario AS eu ON u.usuarioID = eu.usuarioID") or die($conexao->error);

  $planoUsuario = $planoUsuario->fetch_assoc();
}

// consulta os planos em analise
function consultarTipoPlanoUsuario()
{

  global $conexao, $planoUsuario;
  $id = $_SESSION['usuarioID'];

  // peaquisando os planos em analise
  $planoUsuario = $conexao->query("SELECT * FROM planoUsuario AS pu INNER JOIN plano AS p ON pu.planoID = p.planoID WHERE pu.usuarioID = '$id'") or die($conexao->error);
  $planoUsuario = $planoUsuario->fetch_assoc();
}
