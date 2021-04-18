<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');


if (isset($_POST['editar-imovel'])) {
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
  $imagens = [];
  $imagensJaCadastradas = [];

  $imgImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID ='$id'") or die($conexao->error);

  while ($row = $imgImovel->fetch_assoc()) {
    $nomeImagens[] = "imagem" . $row['imgImovelID'];
    $imagensJaCadastradas[] = $row['imagem'];
  }

  for ($i = 0; $i < count($nomeImagens); $i++) {
    if ($_FILES[$nomeImagens[$i]]['error'] == 0) {
      $imagens[$i] = $_FILES[$nomeImagens[$i]];
    } else {
      $imagens[$i] = $imagensJaCadastradas[$i];
    }
  }

  for ($i = 0; $i < count($imagens); $i++) {
    if (is_array($imagens[$i])) {
      echo 'e';
    } else {
      echo 'n e';
    }
  }



  echo '<pre>';
  var_dump($nomeImagens);
  // var_dump($imagens);
  // var_dump($imagensJaCadastradas);



  // echo $rua;
  // echo '<br>';
  // echo $numero;
  // echo '<br>';
  // echo $bairro;
  // echo '<br>';
  // echo $complemento;
  // echo '<br>';
  // echo $qtdQuarto;
  // echo '<br>';
  // echo $qtdBanheiro;
  // echo '<br>';
  // echo $qtdGaragem;
  // echo '<br>';
  // echo $area;
  // echo '<br>';
  // echo $descricao;
  // echo '<br>';
  // echo $tipo;
  // echo '<br>';
  // echo $valor;
}
