<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

if (isset($_GET['notificacao_imgs_cadastro'])) {
  $msg = $_GET['notificacao_imgs_cadastro'];

  if ($msg == "Formato ou Tamanho de Arquivo Inválido!") {

    exibirMsg("Formato ou Tamanho de Arquivo Inválido! (Formatos Suportados = PNG, JPG, JPEG. Tamanhos Suportados = até 1000KB)", "danger");
    header("location:/SMILIPS/view/pages/imovel/cadastro.php");
  } else {

    exibirMsg("Número de Imagens Selecionadas Inválido! (Suporte = 3 à 10)", "danger");
    header("location:/SMILIPS/view/pages/imovel/cadastro.php");
  }
} else if (isset($_GET['notificacao_imgs_edicao'])) {
  $msg = $_GET['notificacao_imgs_edicao'];
  $id = $_GET['id'];

  if ($msg == "Tamanho de Arquivo Inválido!") {

    exibirMsg("Tamanho de Arquivo Inválido! (Tamanhos Suportados = até 1000KB)", "danger");
    header("location:/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=$id");
  } else {

    exibirMsg("Fortato de Arquivo Inválido! (Formatos Suportados = PNG, JPG, JPEG)", "danger");
    header("location:/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=$id");
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

      $conexao->query("INSERT INTO imovel(rua, numero, cidade, bairro, complemento, tipo, valorAluguel, qtdQuarto, qtdBanheiro, qtdGaragem, area, descricao, usuarioID) VALUES('$rua', '$numero', 'Icó', '$bairro', '$complemento', '$tipo_imovel', '$valor', '$qtdQuarto', '$qtdBanheiro', '$qtdGaragem', '$area', '$descricao', '$id')") or die($conexao->error);

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
} else if (isset($_POST['editar-imovel'])) {

  $id = $_POST['id'];
  $rua = $_POST['rua'];
  $numero = $_POST['numero'];
  $bairro = $_POST['bairro'];
  $complemento = $_POST['complemento'];
  $qtdQuarto = $_POST['qtdQuarto'];
  $qtdBanheiro = $_POST['qtdBanheiro'];
  $qtdGaragem = $_POST['qtdGaragem'];
  $area = $_POST['area'];
  $descricao = $_POST['descricao'];
  $tipo = $_POST['type'];
  $valor = $_POST['valor'];

  $nomeImagens = [];
  $imagens = '';
  $imagensJaCadastradas = [];
  $idImagens = [];

  $conexao->query("UPDATE imovel SET rua = '$rua', numero = '$numero', bairro = '$bairro', complemento = '$complemento', qtdQuarto = '$qtdQuarto', qtdBanheiro = '$qtdBanheiro', qtdGaragem = '$qtdGaragem', area = '$area', descricao = '$descricao', tipo = '$tipo', valorAluguel = '$valor' WHERE imovelID = '$id'") or die($conexao->error);

  $imgImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID = '$id'") or die($conexao->error);

  while ($row = $imgImovel->fetch_assoc()) {
    $nomeImagens[] = "imagem" . $row['imgImovelID'];
    $imagensJaCadastradas[] = $row['imagem'];
    $idImagens[] = $row['imgImovelID'];
  }

  for ($i = 0; $i < count($nomeImagens); $i++) {
    if ($_FILES[$nomeImagens[$i]]['error'] == 0) {
      $imagens = $_FILES[$nomeImagens[$i]];
      $caminhoTemp = $imagens['tmp_name'];
      $tamanhoImg = $imagens['size'];
      $handle = fopen($caminhoTemp, "r");
      $imagens  = addslashes(fread($handle, $tamanhoImg));
      fclose($handle);
    } else {
      $imagens = addslashes($imagensJaCadastradas[$i]);
    }
    $idImgImovel = $idImagens[$i];
    $conexao->query("UPDATE imgImovel SET imagem = '$imagens' WHERE imgImovelID = '$idImgImovel'") or die($conexao->error);
  }

  exibirMsg("Imóvel Editado com Sucesso!", "success");
  header("location:/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=$id");
}
