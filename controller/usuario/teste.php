<?php
// print_r($image['name']); nome
// print_r($image['type']); tipo/extensao
// print_r($image['tmp_name']); caminho temporario
// print_r($image['error']); erro
// print_r($image['size']); tamanho 
// require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

if (isset($_POST['cadastro-imovel'])) {
  $error = false;

  for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
    if (isset($_FILES['image']['name'][$i]) && $_FILES['image']['error'][$i] == 0) {
      print_r($_FILES['image']['size'][$i]);
      preg_match("/\.(png|jpg|jpeg)$/i", $_FILES['image']['name'][$i], $extensao);
      if (!$extensao) {
        $error = true;
        echo "há algum arquivo com Extensão Inválida!";
        break;
      } else {
        if ($_FILES['image']['size'][$i] >= 1022924) {
          $error = true;
          echo "arquivo grande d+";
          break;
        }
      }
    } else {
      $error = true;
      echo "Escolha uma Imagem antes de tentar Salvar!";
    }
  }

  if (!$error) {
    $conexao->query("INSERT INTO imovel(rua, cidade, bairro, tipo, valorAluguel, qtdQuarto, qtdSuite, qtdGaragem, area, usuarioID) VALUES('ALTO DO CRUZEIRO', 'ORÓS', 'GUASSUSSÊ', 'APARTAMENTO', 1500, 4, 2, 1, '45m²',3)") or die($conexao->error);

    $images = $_FILES['image'];

    for ($j = 0; $j < count($images['name']); $j++) {
      $caminhoTemp = $images['tmp_name'][$j];
      $tamanhoImg = $images['size'][$j];

      $handle = fopen($caminhoTemp, "r");
      $image  = addslashes(fread($handle, $tamanhoImg));
      $conexao->query("INSERT INTO imgImovel(imagem, imovelID) VALUES('$image', 1)") or die($conexao->error);

      fclose($handle);
    }
    echo 'salvo com sucesso';
  }
}

$imgImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID = 1") or die($conexao->error);

while ($row = $imgImovel->fetch_assoc()) {
  echo "<img src='data:image/jpg;base64," . base64_encode($row['imagem']) . "' style='width: 250; height: 250; border-radius: 50%;'/>";
}
// $tamanho = filesize("/xampp/htdocs/SMILIPS/view/images/Usuario/user.png");
// $handle = fopen("/xampp/htdocs/SMILIPS/view/images/Usuario/user.png", "r");
// $ftPerfil  = addslashes(fread($handle, $tamanho));
// fclose($handle);
// ?>
// <div>
//   <img src="/SMILIPS/view/images/Usuario/user.png" alt="">
// </div>