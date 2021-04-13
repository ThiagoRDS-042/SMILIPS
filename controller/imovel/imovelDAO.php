<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

if (isset($_GET['notificacao_imgs'])) {
  $msg = $_GET['notificacao_imgs'];
  if ($msg == "Formato ou Tamanho de Arquivo Inválido!") {
    exibirMsg("Formato ou Tamanho de Arquivo Inválido! (Formatos Suportados = PNG, JPG, JPEG. Tamanhos Suportados = até 1000KB)", "danger");
    header("location:/SMILIPS/view/pages/imovel/cadastro.php");
  } else if ($msg == "Número de Imagens Selecionadas Inválido!") {
    exibirMsg("Número de Imagens Selecionadas Inválido! (Suporte = 3 à 10)", "danger");
    header("location:/SMILIPS/view/pages/imovel/cadastro.php");
  } else if ($msg == "Formato de Arquivo Inválido!") {
    $id = $_GET['id'];
    exibirMsg("Formato de Arquivo Inválido! (Formatos Suportados = PNG, JPG, JPEG)", "danger");
    header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
  } else {
    $id = $_GET['id'];
    exibirMsg("Selecione uma Imagem!", "danger");
    header("location:/SMILIPS/view/pages/usuario/perfil.php?consultar=$id");
  }
} else if (isset($_POST['cadastro-imovel'])) {
  $tipo_imovel = $_POST['type'];

  if ($tipo_imovel) {
    $existe = false;
    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
      if (isset($_FILES['image']['name'][$i]) && $_FILES['image']['error'][$i] == 0) {
        $existe = true;
      }
    }
    if ($existe) {
      $rua = $_POST['endereco'];
      $bairro = $_POST['bairro'];
      $bairro = $_POST['bairro'];
      $complemento = $_POST['complemento'];
      $numero = $_POST['numero'];
      $qtdQuarto = $_POST['qtdQuarto'];
      $qtdBanheiro = $_POST['qtdBanheiro'];
      $qtdGaragem = $_POST['qtdGaragem'];
      $area = $_POST['area'];
      $descricao = $_POST['descricao'];
      $valor = $_POST['valor'];
      $id = $_POST['id'];

      $conexao->query("INSERT INTO imovel(rua, cidade, bairro, tipo, valorAluguel, qtdQuarto, qtdBanheiro, qtdGaragem, area, descricao, usuarioID) VALUES('$rua', 'Icó', '$bairro', '$tipo_imovel', '$valor', '$qtdQuarto', '$qtdBanheiro', '$qtdGaragem', '$area', '$descricao', '$id')") or die($conexao->error);

      $imovel = $conexao->query("SELECT MAX(imovelID) FROM imovel") or die($conexao->error);
      $imovel = $imovel->fetch_array();
      $idImovel =  $imovel[0];

      $imgs_imovel = $_FILES['image'];

      for ($j = 0; $j < count($imgs_imovel['name']); $j++) {
        $caminhoTemp = $imgs_imovel['tmp_name'][$j];
        $tamanhoImg = $imgs_imovel['size'][$j];

        $handle = fopen($caminhoTemp, "r");
        $image  = addslashes(fread($handle, $tamanhoImg));
        $conexao->query("INSERT INTO imgImovel(imagem, imovelID) VALUES('$image', '$idImovel')") or die($conexao->error);

        fclose($handle);
      }

      exibirMsg("Imóvel Cadastrado com Sucesso!", "success");
      header("location:/SMILIPS/view/pages/imovel/cadastro.php");
    } else {
      exibirMsg("Selecione Imagens do Imóvel!", "danger");
      header("location:/SMILIPS/view/pages/imovel/cadastro.php");
    }
  } else {
    exibirMsg("Selecione um Tipo de Imóvel!", "danger");
    header("location:/SMILIPS/view/pages/imovel/cadastro.php");
  }
}
