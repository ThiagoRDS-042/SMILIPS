<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_GET['notificacao_imgs_cadastro'])) {
  $msg = $_GET['notificacao_imgs_cadastro'];

  // retornando as msn de cadastro das imgs do imovel
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

  // retornando as msn de edicao das imgs do imovel
  if ($msg == "Tamanho de Arquivo Inválido!") {

    exibirMsg("Tamanho de Arquivo Inválido! (Tamanhos Suportados = até 1000KB)", "danger");
    if (isset($_SESSION['idAdm'])) {
      $iduser = $_GET['usuarioID'];
      header("location:/SMILIPS/view/pages/administrador/imovel/gerenciarImovel.php?imovelID=$id&&usuarioID=$iduser");
    } else {
      header("location:/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=$id");
    }
  } else {

    exibirMsg("Fortato de Arquivo Inválido! (Formatos Suportados = PNG, JPG, JPEG)", "danger");
    if (isset($_SESSION['idAdm'])) {
      $iduser = $_GET['usuarioID'];
      header("location:/SMILIPS/view/pages/administrador/imovel/gerenciarImovel.php?imovelID=$id&&usuarioID=$iduser");
    } else {
      header("location:/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=$id");
    }
  }
} else if (isset($_POST['cadastro-imovel'])) {
  $tipo_imovel = $_POST['type'];
  $qtdQuarto = $_POST['qtdQuarto'];
  $qtdBanheiro = $_POST['qtdBanheiro'];

  // verificando se foi passado o tipo de imovel
  if ($tipo_imovel) {

    // verificando se foi passado o pelo menos 1 banheiro e 1 quarto
    if ($qtdQuarto >= 1 && $qtdBanheiro >= 1) {

      $error = false;
      // verificando se foi enviada alguma img
      for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
        if (isset($_FILES['image']['name'][$i]) && $_FILES['image']['error'][$i] == 0) {
          $error = true;
        }
      }

      if ($error) {
        $rua = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $bairro = $_POST['bairro'];
        $complemento = $_POST['complemento'];
        $numero = $_POST['numero'];
        $qtdGaragem = $_POST['qtdGaragem'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $id = $_POST['id'];
        $situacao = 'Em Analise';

        // usando regex para add o M² depois dos numeros
        $area = $_POST['area'];
        preg_match("/(\d+)/", $area, $area);
        $area = $area[0] . " M²";

        $valor = str_replace('.', '', $valor);
        echo $valor;

        // cadastrando o imovel
        $conexao->query("INSERT INTO imovel(tipo, valorAluguel, qtdQuarto, qtdBanheiro, qtdGaragem, area, descricao, situacao, usuarioID) VALUES('$tipo_imovel', '$valor', '$qtdQuarto', '$qtdBanheiro', '$qtdGaragem', '$area', '$descricao', '$situacao', '$id')") or die($conexao->error);

        // pegando o id do ultimo imovel cadastrado, tranformando em array e armazenando o id na variavel idImovel
        $imovel = $conexao->query("SELECT MAX(imovelID) FROM imovel") or die($conexao->error);
        $imovel = $imovel->fetch_assoc();
        $idImovel =  $imovel['MAX(imovelID)'];

        $conexao->query("INSERT INTO enderecoImovel(rua, numero, cidade, bairro, complemento, imovelID) VALUES('$rua', '$numero', 'Icó', '$bairro', '$complemento', '$idImovel')") or die($conexao->error);

        // pegando as imgs passadas
        $imgs_imovel = $_FILES['image'];

        // cadastrando cada img com o for
        for ($j = 0; $j < count($imgs_imovel['name']); $j++) {
          $caminhoTemp = $imgs_imovel['tmp_name'][$j];
          $tamanhoImg = $imgs_imovel['size'][$j];

          // abrindo o arquivo para leitura
          $handle = fopen($caminhoTemp, "r");

          // converte o binario para string e add barras antes de caracteres especiais
          $image  = addslashes(fread($handle, $tamanhoImg));

          // cadastra as imgs
          $conexao->query("INSERT INTO imgImovel(imagem, imovelID) VALUES('$image', '$idImovel')") or die($conexao->error);

          // fecha o arquivo aberto
          fclose($handle);
        }

        exibirMsg("Imóvel Enviado para a Analise!", "success");
        header("location:/SMILIPS/view/pages/imovel/cadastro.php");
      } else {
        exibirMsg("Selecione Imagens do Imóvel!", "danger");
        header("location:/SMILIPS/view/pages/imovel/cadastro.php");
      }
    } else {
      exibirMsg("Número de Quarto(s) ou Nanheiro(s) Inválido! (Necessário pelo menos um quarto e um banheiro!)", "danger");
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
  $descricao = $_POST['descricao'];
  $tipo = $_POST['type'];
  $valor = $_POST['valor'];

  if ($qtdQuarto != 0 && $qtdBanheiro != 0) {
    // usando regex para add o M² depois dos numeros
    $area = $_POST['area'];
    preg_match("/(\d+)/", $area, $area);
    $area = $area[0] . " M²";

    $nomeImagens = [];
    $imagens = '';
    $imagensJaCadastradas = [];
    $idImagens = [];

    // att a tabela de imovel
    $conexao->query("UPDATE imovel SET qtdQuarto = '$qtdQuarto', qtdBanheiro = '$qtdBanheiro', qtdGaragem = '$qtdGaragem', area = '$area', descricao = '$descricao', tipo = '$tipo', valorAluguel = '$valor', situacao = 'Em Analise' WHERE imovelID = '$id'") or die($conexao->error);
    $conexao->query("UPDATE enderecoImovel SET rua = '$rua', numero = '$numero', bairro = '$bairro', complemento = '$complemento' WHERE imovelID = '$id'") or die($conexao->error);

    // pegando todos as img do imovel
    $imgImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID = '$id'") or die($conexao->error);

    // pegando o nome o codigo da imagem e o id de cada img
    while ($row = $imgImovel->fetch_assoc()) {
      $nomeImagens[] = "imagem" . $row['imgImovelID'];
      $imagensJaCadastradas[] = $row['imagem'];
      $idImagens[] = $row['imgImovelID'];
    }

    // fazendo a mesma coisa do cadastro so q com cada img
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
      // att a tabela de imgImovel
      $conexao->query("UPDATE imgImovel SET imagem = '$imagens' WHERE imgImovelID = '$idImgImovel'") or die($conexao->error);
    }

    exibirMsg("Imóvel Editado com Sucesso!", "success");
    if (isset($_SESSION['idAdm'])) {
      $idUser = $_POST['usuarioID'];
      header("location:/SMILIPS/view/pages/administrador/imovel/gerenciarImovel.php?imovelID=$id&&usuarioID=$idUser");
    } else {
      header("location:/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=$id");
    }
  } else {
    exibirMsg("Um Imovel Deve Possuir ao Menos um Quarto e um Banheiro!", "danger");
    header("location:/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=$id");
  }
} else if (isset($_POST['situacao-imovel'])) {
  $idUser = $_POST['usuarioID'];
  $idImovel = $_POST['imovelID'];
  $situacao = $_POST['situacao'];

  if (isset($_SESSION['usuarioID'])) {
    $senha = md5($_POST['senha']);
    // pesquisando um usuario pelo id passado e transformando em array
    $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$idUser'") or die($conexao->error);
    $usuario = $usuario->fetch_assoc();
    // comparando se a senha digitada e igual a cadastrada no DB
    if ($senha == $usuario['senhaUsuario']) {

      if ($situacao == 'Em Analise') {
        // excluindo o imovel pelo id
        $conexao->query("DELETE FROM imovel WHERE imovelID = '$idImovel'") or die($conexao->error);
        exibirMsg("Imóvel Excluido com Sucesso!", "success");
      } else {
        $conexao->query("UPDATE imovel SET situacao = '$situacao' WHERE imovelID = '$idImovel'") or die($conexao->error);
      }

      if ($situacao == 'Ativado') {
        exibirMsg("Imóvel Ativado com Sucesso!", "success");
      } else if ($situacao == 'Desativado') {
        exibirMsg("Imóvel Desativado com Sucesso!", "success");
      }

      header("location:/SMILIPS/view/pages/usuario/home.php");
    } else {
      exibirMsg("Senha Inválida!", "danger");
      header("location:/SMILIPS/view/pages/imovel/editarImovel.php?imovelID=$idImovel");
    }
  } else {
    $conexao->query("DELETE FROM imovel WHERE imovelID = '$idImovel'") or die($conexao->error);
    exibirMsg("Imóvel Excluido com Sucesso!", "success");
    header("location:/SMILIPS/view/pages/administrador/imovel/gerenciarUsuario.php?consultar=$idUser");
  }
}
