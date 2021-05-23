<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['salvar'])) {
  $senha = md5($_POST['senha']);
  $planoId = $_POST['planoID'];
  $id = $_SESSION['usuarioID'];

  $senhaUsuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
  $senhaUsuario = $senhaUsuario->fetch_assoc();
  $senhaUsuario = $senhaUsuario['senhaUsuario'];

  if ($senhaUsuario == $senha) {
    if (isset($_FILES['comprovante']['name']) && $_FILES['comprovante']['error'] == 0) {

      preg_match("/\.(png|jpg|jpeg)$/i", $_FILES['comprovante']['name'], $extensao);
      if ($extensao) {
        // Obtém o tamanho do arquivo para a leitura
        $tamanhoImg = $_FILES['comprovante']['size'];

        if ($tamanhoImg <= 1022924) {
          $comprovante = $_FILES['comprovante'];
          $caminhoTemp = $_FILES['comprovante']['tmp_name'];
          $id = $_SESSION['usuarioID'];
          $situacao = 'Em Analise';

          // fopen() - Abre um arquivo ou URL, nesse caso o 'r' especifica que o arquivo esta sendo aberto somente para leitura
          // fread() - Leitura binary-safe de arquivo, Retorna a string lida ou false em caso de erro.
          // addslashes() - Adiciona barras a uma string, Retorna uma string com barras adicionadas antes de caracteres que precisam ser escapados
          $handle = fopen($caminhoTemp, "r");
          $comprovante  = addslashes(fread($handle, $tamanhoImg));

          $plano = $conexao->query("SELECT * FROM plano WHERE planoID = '$planoId'") or die($conexao->error);
          $plano = $plano->fetch_assoc();

          $dataInicio = date("Y-m-d");
          $dataFim =  preg_split("/-/", $dataInicio);
          $dataFim[2] += $plano['duracao'];
          while ($dataFim[2] > 30) {
            $dataFim[2] -= 30;
            $dataFim[1] += 1;

            while ($dataFim[1] > 12) {
              $dataFim[1] -= 12;
              $dataFim[0] += 1;
            }
          }

          if ($dataFim[2] < 10) {
            $dataFim[2] = '0' . $dataFim[2];
          }
          if ($dataFim[1] < 10) {
            $dataFim[1] = '0' . $dataFim[1];
          }

          $dataFim = implode("-", $dataFim);

          $planoUsuario = $conexao->query("SELECT * FROM planoUsuario WHERE usuarioID = '$id'") or die($conexao->error);

          if ($planoUsuario->num_rows > 0) {
            // atualizando a foto de perfil do usuario
            $planoUsuario = $planoUsuario->fetch_assoc();
            $conexao->query("UPDATE planoUsuario SET  planoID = '$planoId', dataInicio = '$dataInicio', dataFim = '$dataFim', situacao = '$situacao', comprovante = '$comprovante' WHERE planoUsuarioID = " . $planoUsuario['planoUsuarioID']) or die($conexao->error);
          } else {
            // atualizando a foto de perfil do usuario
            $conexao->query("INSERT INTO planoUsuario (usuarioID, planoID, dataInicio, dataFim, situacao, comprovante) VALUES ('$id', '$planoId', '$dataInicio', '$dataFim', '$situacao', '$comprovante')") or die($conexao->error);
          }

          // dando close no fopen para parar a leitura do arquivo
          fclose($handle);

          //volta pra pagina de perfil com a varivel consultar e o id do usuario e exibe a mensagem
          exibirMsg("Comprovante Enviado!", "success");
          header("location:/SMILIPS/view/pages/usuario/home.php");
        } else {
          exibirMsg("Tamanho de Arquivo não Suportada! (max : 1000 KB)", "danger");
          header("location:/SMILIPS/view/pages/plano/efetivarPlano.php?efetivar=$planoId");
        }
      } else {
        // se a extensao do arquivo selecionado e invalida
        exibirMsg("Extensão Inválida!", "danger");
        header("location:/SMILIPS/view/pages/plano/efetivarPlano.php?efetivar=$planoId");
      }
    } else {
      exibirMsg("Selecione o Comprovante!", "danger");
      header("location:/SMILIPS/view/pages/plano/efetivarPlano.php?efetivar=$planoId");
    }
  } else {
    exibirMsg("Senha invalida!", "danger");
    header("location:/SMILIPS/view/pages/plano/efetivarPlano.php?efetivar=$planoId");
  }
}
