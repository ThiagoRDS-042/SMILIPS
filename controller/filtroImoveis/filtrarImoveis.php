<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['filtar_imoveis'])) {

  if ($_POST['rua'] != null and $_POST['type'] != null and $_POST['cidade'] != null and $_POST['bairro'] != null) {
    $_SESSION['rua'] = $_POST['rua'];
    $_SESSION['tipo'] = $_POST['type'];
    $_SESSION['cidade'] = $_POST['cidade'];
    $_SESSION['bairro'] = $_POST['bairro'];

    if ($_POST['dormitorio'] != null) {
      $_SESSION['quarto'] = $_POST['dormitorio'];
    } else {
      unset($_SESSION['quarto']);
    }

    if ($_POST['suite'] != null) {
      $_SESSION['banheiro'] = $_POST['suite'];
    } else {
      unset($_SESSION['banheiro']);
    }

    if ($_POST['garagem'] != null) {
      $_SESSION['garagem'] = $_POST['garagem'];
    } else {
      unset($_SESSION['garagem']);
    }

    if ($_POST['valorI'] != null) {
      $_SESSION['valorMinimo'] = $_POST['valorI'];
    } else {
      unset($_SESSION['valorMinimo']);
    }

    if ($_POST['valorF'] != null) {
      $_SESSION['valorMaximo'] = $_POST['valorF'];
    } else {
      unset($_SESSION['valorMaximo']);
    }

    if ($_POST['area'] != null) {
      $_SESSION['area'] = $_POST['area'];
    } else {
      unset($_SESSION['area']);
    }

    header("location:/SMILIPS/view/pages/sistema/imoveis.php?filtro");
  } else {
    unset($_SESSION['rua']);
    unset($_SESSION['tipo']);
    unset($_SESSION['cidade']);
    unset($_SESSION['bairro']);
    exibirMsg("Pesquise por rua, tipo de imóvel, cidade e bairro!", "danger");
    header("location:/SMILIPS/view/pages/sistema/home.php");
  }
}

function filtrarImoveis()
{
  $rua = $_SESSION['rua'];
  $tipo = $_SESSION['tipo'];
  $cidade = $_SESSION['cidade'];
  $bairro = $_SESSION['bairro'];
  $filtro = [];

  global $conexao, $matrizImoveis, $matrizImgsImovel, $imoveis;

  // if (isset($_SESSION['quarto']) and isset($_SESSION['banheiro']) and isset($_SESSION['garagem']) and isset($_SESSION['valorMinimo']) and isset($_SESSION['valorMaximo']) and isset($_SESSION['area'])) {
  //   if (count($area) == 2) {
  //     $areaMin = $area[0];
  //     $areaMax = $area[1];
  //     $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' AND i.qtdQuarto = '$qtdQuarto' AND i.qtdGaragem = '$qtdGaragem' AND i.qtdBanheiro = '$qtdBanheiro' AND i.valorAluguel >= '$valorMinimo' AND i.valorAluguel <= '$valorMaximo' AND i.area AND i.area >= '$areaMin' AND i.area <= '$areaMax' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  //   } else if ($area[0] == 50) {
  //     $areaMax = $area[0];
  //     $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' AND i.qtdQuarto = '$qtdQuarto' AND i.qtdGaragem = '$qtdGaragem' AND i.qtdBanheiro = '$qtdBanheiro' AND i.valorAluguel >= '$valorMinimo' AND i.valorAluguel <= '$valorMaximo' AND i.area AND i.area <= '$areaMax' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  //   } else {
  //     $areaMax = $area[0];
  //     $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' AND i.qtdQuarto = '$qtdQuarto' AND i.qtdGaragem = '$qtdGaragem' AND i.qtdBanheiro = '$qtdBanheiro' AND i.valorAluguel >= '$valorMinimo' AND i.valorAluguel <= '$valorMaximo' AND i.area AND i.area <= '$areaMax' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  //   }
  // } else if (isset($_SESSION['quarto']) and isset($_SESSION['banheiro']) and isset($_SESSION['garagem']) and isset($_SESSION['valorMinimo']) and isset($_SESSION['valorMaximo'])) {
  //   $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' AND i.qtdQuarto = '$qtdQuarto' AND i.qtdGaragem = '$qtdGaragem' AND i.qtdBanheiro = '$qtdBanheiro' AND i.valorAluguel >= '$valorMinimo' AND i.valorAluguel <= '$valorMaximo' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  // } else if (isset($_SESSION['quarto']) and isset($_SESSION['banheiro']) and isset($_SESSION['garagem']) and isset($_SESSION['valorMinimo'])) {
  //   $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' AND i.qtdQuarto = '$qtdQuarto' AND i.qtdGaragem = '$qtdGaragem' AND i.qtdBanheiro = '$qtdBanheiro' AND i.valorAluguel >= '$valorMinimo' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  // } else if (isset($_SESSION['quarto']) and isset($_SESSION['banheiro']) and isset($_SESSION['garagem'])) {
  //   $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' AND i.qtdQuarto = '$qtdQuarto' AND i.qtdGaragem = '$qtdGaragem' AND i.qtdBanheiro = '$qtdBanheiro' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  // } else if (isset($_SESSION['quarto']) and isset($_SESSION['banheiro'])) {
  //   $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' AND i.qtdQuarto = '$qtdQuarto' AND i.qtdGaragem = '$qtdGaragem' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  // } else if (isset($_SESSION['quarto'])) {
  //   $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' AND i.qtdQuarto = '$qtdQuarto' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  // }

  $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' ORDER BY i.valorAluguel ASC") or die($conexao->error);

  $i = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  $j = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  $k = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  $l = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  $m = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' ORDER BY i.valorAluguel ASC") or die($conexao->error);
  $n = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = 'Rua Alto do Cruzeiro' ORDER BY i.valorAluguel ASC") or die($conexao->error);

  if (isset($_SESSION['quarto'])) {
    $qtdQuarto = $_SESSION['quarto'];
    if ($qtdQuarto != null) {
      while ($row = $i->fetch_assoc()) {
        echo "quarto " . $row['qtdQuarto'] . $qtdQuarto;
        if ($row['qtdQuarto'] != $qtdQuarto) {
          $imoveis = null;
          break;
        }
      }
    }
  }

  if (isset($_SESSION['banheiro'])) {
    $qtdBanheiro = $_SESSION['banheiro'];
    if ($qtdBanheiro != null) {
      while ($row = $j->fetch_assoc()) {
        echo "banheiro " . $row['qtdBanheiro'] . $qtdBanheiro;
        if ($row['qtdBanheiro'] != $qtdBanheiro) {
          $imoveis = null;
          break;
        }
      }
    }
  }

  if (isset($_SESSION['garagem'])) {
    $qtdGaragem = $_SESSION['garagem'];
    if ($qtdGaragem != null) {
      while ($row = $k->fetch_assoc()) {
        echo "garagem " . $row['qtdGaragem'] . $qtdGaragem;
        if ($row['qtdGaragem'] != $qtdGaragem) {
          $imoveis = null;
          break;
        }
      }
    }
  }

  if (isset($_SESSION['valorMinimo'])) {
    $valorMinimo = $_SESSION['valorMinimo'];
    if ($valorMinimo != null) {
      while ($row = $l->fetch_assoc()) {
        echo "valorMinimo " . $row['valorAluguel'] . $valorMinimo;
        if ($row['valorAluguel'] < $valorMinimo) {
          $imoveis = null;
          break;
        }
      }
    }
  }

  if (isset($_SESSION['valorMaximo'])) {
    $valorMaximo = $_SESSION['valorMaximo'];
    if ($valorMaximo != null) {
      while ($row = $m->fetch_assoc()) {
        echo "valorMaximo " . $row['valorAluguel'] . $valorMaximo;
        if ($row['valorAluguel'] > $valorMaximo) {
          $imoveis = null;
          break;
        }
      }
    }
  }

  if (isset($_SESSION['area'])) {
    $area = explode("a", $_SESSION['area']);

    if (count($area) == 2) {
      $areaMin = $area[0];
      $areaMax = $area[1];
      while ($row = $n->fetch_assoc()) {
        $row['area'] = explode(" ", $row['area']);
        echo "area " . $row['area'][0] . $areaMin . $areaMax;
        if ($row['area'][0] < $areaMin || $row['area'][0] > $areaMax) {
          $imoveis = null;
          break;
        }
      }
    } else if ($area[0] == 50) {
      while ($row = $n->fetch_assoc()) {
        $row['area'] = explode(" ", $row['area']);
        echo "area " . $row['area'][0] . $area[0];
        if ($row['area'][0] > $area[0]) {
          $imoveis = null;
          break;
        }
      }
    } else {
      while ($row = $n->fetch_assoc()) {
        $row['area'] = explode(" ", $row['area']);
        echo "area " . $row['area'][0] . $area[0];
        if ($row['area'][0] < $area[0]) {
          $imoveis = null;
          break;
        }
      }
    }
  }

  if ($imoveis != null) {
    // pesquidando todas as imgs dos imoveis
    for ($i = 0; $i < $imoveis->num_rows; $i++) {
      $matrizImoveis[] = $imoveis->fetch_assoc();
      $imgsImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID =" . $matrizImoveis[$i]['imovelID'] . " LIMIT 5") or die($conexao->error);

      for ($j = 0; $j < $imgsImovel->num_rows; $j++) {
        $matrizImgsImovel[] = $imgsImovel->fetch_assoc();
      }
    }
  }
}
