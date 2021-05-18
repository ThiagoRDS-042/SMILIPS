<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['salvar'])) {

  if (isset($_FILES['propaganda']['name']) && $_FILES['propaganda']['error'] == 0) {
    $id = $_SESSION['usuarioID'];
    $situacao = 'Em Analise';
    $propaganda = $_FILES['propaganda'];

    $caminhoTemp = $propaganda['tmp_name'];
    $tamanhoImg = $propaganda['size'];

    $handle = fopen($caminhoTemp, "r");
    $propaganda  = addslashes(fread($handle, $tamanhoImg));

    //salvando o usurio
    $conexao->query("INSERT INTO propaganda(propaganda, situacao, usuarioID) VALUES ('$propaganda', '$situacao', '$id')") or die($conexao->error);

    fclose($handle);

    exibirMsg("Propaganda Enviada para a Analise!", "success");
    header("location:/SMILIPS/view/pages/usuario/home.php");
  } else {
    exibirMsg("Selecione uma Imagem!", "danger");
    header("location:/SMILIPS/view/pages/propaganda/cadastro.php");
  }
} else if (isset($_GET['img_propaganda'])) {
  $msg = $_GET['img_propaganda'];
  if ($msg == 'Tamanho de Arquivo Inválido!') {
    exibirMsg("Tamanho de Arquivo Inválido! (Tamanho Máximo = 1000kb)", "danger");
  } else {
    exibirMsg("Formato de Arquivo Inválido! (Formato Suportado = PNG, JPG, JPEG)", "danger");
  }
  header("location:/SMILIPS/view/pages/propaganda/cadastro.php");
}
