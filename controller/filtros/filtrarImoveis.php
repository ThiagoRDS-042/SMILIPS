<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');
if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['filtrar_imoveis'])) {

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
    $url = $_SERVER['HTTP_REFERER'];
    exibirMsg("Pesquise por rua, tipo de imóvel, cidade e bairro!", "danger");
    if ($url == "http://localhost/SMILIPS/view/pages/sistema/home.php") {
      header("location:/SMILIPS/view/pages/sistema/home.php");
    } else {
      header("location:/SMILIPS/view/pages/sistema/imoveis.php");
    }
  }
}

function filtrarImoveis()
{
  $rua = $_SESSION['rua'];
  $tipo = $_SESSION['tipo'];
  $cidade = $_SESSION['cidade'];
  $bairro = $_SESSION['bairro'];

  global $conexao, $matrizImoveis, $matrizImgsImovel, $imoveis, $filtro;

  $imoveis = $conexao->query("SELECT * FROM imovel AS i INNER JOIN enderecoImovel AS ei ON i.situacao = 'Ativado' AND i.imovelID = ei.imovelID WHERE ei.rua = '$rua' AND i.tipo = '$tipo' AND ei.cidade = '$cidade' AND ei.bairro = '$bairro' ORDER BY i.valorAluguel ASC") or die($conexao->error);

  if ($imoveis->num_rows == 0) {
    $imoveis = null;
  } else {

    while ($row = $imoveis->fetch_assoc()) {
      $filtro[] = $row;
    }

    if (isset($_SESSION['quarto'])) {
      $qtd = count($filtro);
      $qtdQuarto = $_SESSION['quarto'];
      for ($i = 0; $i < $qtd; $i++) {
        if ($filtro[$i]['qtdQuarto'] != $qtdQuarto) {
          unset($filtro[$i]);
        }
      }
      $filtro = array_slice($filtro, 0);
    }

    if (count($filtro) > 0) {
      if (isset($_SESSION['banheiro'])) {
        $qtd = count($filtro);
        $qtdBanheiro = $_SESSION['banheiro'];
        for ($i = 0; $i < $qtd; $i++) {
          if ($filtro[$i]['qtdBanheiro'] != $qtdBanheiro) {
            unset($filtro[$i]);
          }
        }
        $filtro = array_slice($filtro, 0);
      }
    }

    if (count($filtro) > 0) {
      if (isset($_SESSION['garagem'])) {
        $qtd = count($filtro);
        $qtdGaragem = $_SESSION['garagem'];
        for ($i = 0; $i < $qtd; $i++) {
          if ($filtro[$i]['qtdGaragem'] != $qtdGaragem) {
            unset($filtro[$i]);
          }
        }
        $filtro = array_slice($filtro, 0);
      }
    }

    if (count($filtro) > 0) {
      if (isset($_SESSION['valorMinimo'])) {
        $qtd = count($filtro);
        $valorMinimo = $_SESSION['valorMinimo'];
        for ($i = 0; $i < $qtd; $i++) {
          if ($filtro[$i]['valorAluguel'] < $valorMinimo) {
            unset($filtro[$i]);
          }
        }
        $filtro = array_slice($filtro, 0);
      }
    }

    if (count($filtro) > 0) {
      if (isset($_SESSION['valorMaximo'])) {
        $qtd = count($filtro);
        $valorMaximo = $_SESSION['valorMaximo'];
        for ($i = 0; $i < $qtd; $i++) {
          if ($filtro[$i]['valorAluguel'] > $valorMaximo) {
            unset($filtro[$i]);
          }
        }
        $filtro = array_slice($filtro, 0);
      }
    }

    if (count($filtro) > 0) {
      if (isset($_SESSION['area'])) {
        $qtd = count($filtro);
        $area = explode("a", $_SESSION['area']);
        if (count($area) == 2) {
          $areaMin = $area[0];
          $areaMax = $area[1];
          for ($i = 0; $i < $qtd; $i++) {
            $areaExplode = explode(" ", $filtro[$i]['area']);
            if ($areaExplode[0] < $areaMin || $filtro[$i]['area'][0] > $areaMax) {
              unset($filtro[$i]);
            }
          }
        } else if ($area[0] == 50) {
          for ($i = 0; $i < $qtd; $i++) {
            $areaExplode = explode(" ", $filtro[$i]['area']);
            if ($areaExplode[0] > $area[0]) {
              unset($filtro[$i]);
            }
          }
        } else {
          for ($i = 0; $i < $qtd; $i++) {
            $areaExplode = explode(" ", $filtro[$i]['area']);
            if ($areaExplode[0] < $area[0]) {
              unset($filtro[$i]);
            }
          }
        }
        $filtro = array_slice($filtro, 0);
      }
    }
  }

  if ($imoveis != null and $filtro != null) {
    $matrizImoveis = $filtro;
    // pesquidando todas as imgs dos imoveis
    for ($i = 0; $i < count($filtro); $i++) {
      // $matrizImoveis[] = $imoveis->fetch_assoc();
      $imgsImovel = $conexao->query("SELECT * FROM imgImovel WHERE imovelID = " . $matrizImoveis[$i]['imovelID'] . " LIMIT 5") or die($conexao->error);

      for ($j = 0; $j < $imgsImovel->num_rows; $j++) {
        $matrizImgsImovel[] = $imgsImovel->fetch_assoc();
      }
    }
  }
}
