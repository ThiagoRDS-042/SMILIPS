<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['salvar'])) {
  $id = $_SESSION['usuarioID'];

  // pesquisa a qtd de anuncios q o usuario possui e quantos anuncios seu plano lhe permite o cadastro
  $propagandas = $conexao->query("SELECT * FROM propaganda WHERE usuarioID = '$id'") or die($conexao->error);
  $qtdAnuncio = $conexao->query("SELECT * FROM planoUsuario INNER JOIN plano ON planoUsuario.usuarioID = '$id' AND plano.planoID = planoUsuario.planoID") or die($conexao->error);
  $qtdAnuncio = $qtdAnuncio->fetch_assoc();
  $qtdAnuncio = $qtdAnuncio['qtdAnuncio'];

  if ($propagandas->num_rows < $qtdAnuncio) {
    // verifica se foi enviada a propaganda
    if (isset($_FILES['propaganda']['name']) && $_FILES['propaganda']['error'] == 0) {
      // setando a situacao
      $situacao = 'Em Analise';
      $propaganda = $_FILES['propaganda'];

      $caminhoTemp = $propaganda['tmp_name'];
      $tamanhoImg = $propaganda['size'];

      // abre o arquivo para leitura
      $handle = fopen($caminhoTemp, "r");
      // prepara o arquivo pra o cadastro
      $propaganda  = addslashes(fread($handle, $tamanhoImg));

      // cadastra a propaganda
      $conexao->query("INSERT INTO propaganda(propaganda, situacao, usuarioID) VALUES ('$propaganda', '$situacao', '$id')") or die($conexao->error);

      // fecha
      fclose($handle);

      exibirMsg("Propaganda Enviada para a Analise!", "success");
      header("location:/SMILIPS/view/pages/propaganda/cadastro.php");
    } else {
      exibirMsg("Selecione uma Imagem!", "danger");
      header("location:/SMILIPS/view/pages/propaganda/cadastro.php");
    }
  } else {
    exibirMsg("Limite de Propagandas Atingido!", "danger");
    header("location:/SMILIPS/view/pages/propaganda/cadastro.php");
  }
} else if (isset($_GET['img_propaganda'])) {
  // exibindo as mensagens de tamanho ou extencao invalida
  $msg = $_GET['img_propaganda'];
  if ($msg == 'Tamanho de Arquivo Inválido!') {
    exibirMsg("Tamanho de Arquivo Inválido! (Tamanho Máximo = 1000kb)", "danger");
  } else {
    exibirMsg("Formato de Arquivo Inválido! (Formato Suportado = PNG, JPG, JPEG)", "danger");
  }

  // verifica se esta editando ou cadastrando, para saber para onde redirecionar
  if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    if (isset($_SESSION['idAdm'])) {
      $idUser = $_POST['idUser'];
      header("location:/SMILIPS/view/pages/administrador/propaganda/gerenciarPropaganda.php?editar=$id&&usuarioID=$idUser");
    } else {
      header("location:/SMILIPS/view/pages/propaganda/editar.php?editar=$id");
    }
  } else {
    header("location:/SMILIPS/view/pages/propaganda/cadastro.php");
  }
} else if (isset($_POST['editar'])) {
  // verifica se foi enviada a propaganda
  if (isset($_FILES['propaganda']['name']) && $_FILES['propaganda']['error'] == 0) {
    $id = $_POST['id'];
    // setando a situacao
    $situacao = 'Em Analise';
    $propaganda = $_FILES['propaganda'];

    $caminhoTemp = $propaganda['tmp_name'];
    $tamanhoImg = $propaganda['size'];

    // abre o arquivo para leitura
    $handle = fopen($caminhoTemp, "r");
    // prepara o arquivo pra o cadastro
    $propaganda  = addslashes(fread($handle, $tamanhoImg));

    // atualiza a propaganda
    $conexao->query("UPDATE propaganda SET propaganda = '$propaganda', situacao = '$situacao' WHERE propagandaID = '$id'") or die($conexao->error);

    // fecha
    fclose($handle);

    exibirMsg("Propaganda Enviada para a Analise!", "success");
    if (isset($_SESSION['idAdm'])) {
      $idUser = $_POST['idUser'];
      header("location:/SMILIPS/view/pages/administrador/propaganda/gerenciarPropaganda.php?editar=$id&&usuarioID=$idUser");
    } else {
      header("location:/SMILIPS/view/pages/propaganda/editar.php?editar=$id");
    }
  } else {
    $id = $_POST['id'];
    exibirMsg("Propaganda Atualizada com Sucesso!", "success");
    if (isset($_SESSION['idAdm'])) {
      $idUser = $_POST['idUser'];
      header("location:/SMILIPS/view/pages/administrador/propaganda/gerenciarPropaganda.php?editar=$id&&usuarioID=$idUser");
    } else {
      header("location:/SMILIPS/view/pages/propaganda/editar.php?editar=$id");
    }
  }
} else if (isset($_POST['situacao'])) {
  // setando a situacao da propaganda, para desativada, ativada, e em casos especificos excluindo ela
  $id  = $_POST['id'];
  if (isset($_SESSION['idAdm'])) {

    if ($_POST['motivo'] != null) {
      $motivo = $_POST['motivo'];

      $idUser = $_POST['idUser'];

      $conexao->query("DELETE FROM propaganda WHERE propagandaID = '$id'") or die($conexao->error);

      $conexao->query("INSERT INTO notificacaoAnalisePropaganda(mensagem, situacao, usuarioID, exibida) VALUES ('$motivo', 'Excluida', '$idUser', 0)") or die($conexao->error);

      exibirMsg("Propaganda Deletada!", "success");
      header("location:/SMILIPS/view/pages/administrador/usuario/gerenciarUsuario.php?consultar=$idUser");
    } else {
      exibirMsg("Por Favor Informe o Motivo Para a Deleção da Propaganda", "danger");
      header("location:/SMILIPS/view/pages/administrador/propaganda/gerenciarPropaganda.php?editar=$id&&usuarioID=$idUser");
    }
  } else {
    $idUser = $_SESSION['usuarioID'];
    $senha = md5($_POST['senha']);
    $situacao = $_POST['situacao'];

    $senhaUsuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$idUser'") or die($conexao->error);
    $senhaUsuario = $senhaUsuario->fetch_assoc();
    $senhaUsuario = $senhaUsuario['senhaUsuario'];

    if ($senha == $senhaUsuario) {
      if ($situacao == 'Excluida') {
        $conexao->query("DELETE FROM propaganda WHERE propagandaID = '$id'") or die($conexao->error);
        exibirMsg("Propaganda $situacao com Sucesso!", "success");
        header("location:/SMILIPS/view/pages/usuario/home.php");
      } else {
        $planoUsuario = $conexao->query("SELECT * FROM planoUsuario WHERE usuarioID = '$idUser' AND situacao = 'Ativado'") or die($conexao->error);
        if ($planoUsuario->num_rows > 0) {
          $conexao->query("UPDATE propaganda SET situacao = '$situacao' WHERE propagandaID = '$id'") or die($conexao->error);
          exibirMsg("Propaganda $situacao com Sucesso!", "success");
          header("location:/SMILIPS/view/pages/usuario/home.php");
        } else {
          exibirMsg("Impossivel Ativar uma Propaganda sem um Plano ativo!", "danger");
          header("location:/SMILIPS/view/pages/propaganda/editar.php?editar=$id");
        }
      }
    } else {
      exibirMsg("Senha Invalida!", "danger");
      header("location:/SMILIPS/view/pages/propaganda/editar.php?editar=$id");
    }
  }
}
