<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

$id = "";
$nomeUsuario = "";
$emailUsuario = "";
$telefone = "";
$bairro = "";
$rua = "";
$numero = '';
$complemento = "";
$ftPerfil = "";
$situacao = "";

if (isset($_GET['consultar'])) {
  $id = $_GET['consultar'];
  //consultando do banco todos os dados do usurio em questao
  $usuario = $conexao->query("SELECT * FROM usuario AS u INNER JOIN enderecoUsuario AS eu ON u.usuarioID = '$id' AND u.usuarioID = eu.usuarioID") or die($conexao->error);

  if ($usuario->num_rows == 1) {
    //verificando se encontrou algo
    $usuario = $usuario->fetch_array();
    // tranformando em array

    // capturando os dados
    $id = $usuario['usuarioID'];
    $nomeUsuario = $usuario['nomeUsuario'];
    $emailUsuario = $usuario['emailUsuario'];
    $bairro = $usuario['bairro'];
    $rua = $usuario['rua'];
    $numero = $usuario['numero'];
    $complemento = $usuario['complemento'];
    $telefone = $usuario['telefone'];
    $ftPerfil = $usuario['ftPerfil'];
  }
}

// funcao pra retornar a ft de perfil do usurio
function consultarFtPerfil()
{
  // decalrando q sao variveis globais
  global $conexao, $ftPerfil;
  $id = $_SESSION['usuarioID'];

  // consulta no banco transforma em array e armazena na variavel
  //nao faco a verificacao pra saber se retornou aldo, pq assumo q essa funcao so sera chamada caso aja um usuario logado
  $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
  $usuario = $usuario->fetch_array();
  $ftPerfil = $usuario['ftPerfil'];
}

// funcao pra retornar a situacao do usurio
function consultarSituacao()
{
  global $conexao, $situacao;
  $id = $_SESSION['usuarioID'];

  // consulta no banco transforma em array e armazena na variavel
  //nao faco a verificacao pra saber se retornou aldo, pq assumo q essa funcao so sera chamada caso aja um usuario logado
  $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
  $usuario = $usuario->fetch_array();
  $situacao = $usuario['situacao'];
}

// funcao pra retornar o nome  do usurio
function consultarNome()
{
  global $conexao, $nomeUsuario;
  $id = $_SESSION['usuarioID'];

  // consulta no banco transforma em array e armazena na variavel
  //nao faco a verificacao pra saber se retornou aldo, pq assumo q essa funcao so sera chamada caso aja um usuario logado
  $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
  $usuario = $usuario->fetch_array();
  $nomeUsuario = $usuario['nomeUsuario'];
}

function consultarUsuarios()
{
  global $conexao, $usuarios;

  $usuarios = $conexao->query("SELECT * FROM usuario AS u INNER JOIN enderecoUsuario AS eu ON u.usuarioID = eu.usuarioID") or die($conexao->error);
}

function consultarPlanoUsuario()
{
  $id = $_SESSION['usuarioID'];

  global $conexao, $planoUsuario, $planoName;

  $planoUsuario = $conexao->query("SELECT * FROM planoUsuario WHERE usuarioID = '$id' AND situacao = 'Ativado'") or die($conexao->error);

  if ($planoUsuario->num_rows == 0) {
    exibirMsg("Escolha e Efetive um Plano para poder Cadastrar Anuncios!", "notify");
    $url = str_replace("/Novo/", "", $_SERVER["REQUEST_URI"]);
    if ($url != "/SMILIPS/view/pages/plano/escolherPlano.php" && $url != "/SMILIPS/view/pages/plano/escolherPlano.php?planoNome") {
      header("location:/SMILIPS/view/pages/plano/escolherPlano.php");
    }
    $planoUsuario = $planoUsuario->fetch_assoc();
    $planoName = '';
  } else {
    $planoUsuario = $planoUsuario->fetch_assoc();

    $planoName = $conexao->query("SELECT * FROM plano WHERE planoID = " . $planoUsuario['planoID']) or die($conexao->error);
    $planoName = $planoName->fetch_assoc();
    $planoName = $planoName['nome'];
  }
}


function consultarQtdNotificacoesUsuario()
{
  global $conexao, $qtdNotificacoes, $notificacaoImovel, $notificacaoPropaganda, $notificacaoPlano, $notificacaoServicoUsuario;
  $id = $_SESSION['usuarioID'];

  $notificacaoImovel = $conexao->query("SELECT * FROM notificacaoAnaliseImovel AS nai INNER JOIN usuario AS u ON nai.usuarioID = u.usuarioID WHERE u.usuarioID = '$id' AND nai.exibida = 0") or die($conexao->error);
  $notificacaoPropaganda = $conexao->query("SELECT * FROM notificacaoAnalisePropaganda AS nap INNER JOIN usuario AS u ON nap.usuarioID = u.usuarioID WHERE u.usuarioID = '$id' AND nap.exibida = 0") or die($conexao->error);
  $notificacaoPlano = $conexao->query("SELECT * FROM notificacaoAnalisePlano AS nap INNER JOIN usuario AS u ON nap.usuarioID = u.usuarioID WHERE u.usuarioID = '$id' AND nap.exibida = 0") or die($conexao->error);
  $notificacaoServicoUsuario = $conexao->query("SELECT * FROM notificacaoServico AS ns INNER JOIN usuario AS u ON ns.usuarioID = u.usuarioID WHERE u.usuarioID = '$id' AND ns.exibida = 0") or die($conexao->error);

  $qtdNotificacoes = $notificacaoImovel->num_rows + $notificacaoPropaganda->num_rows + $notificacaoPlano->num_rows + $notificacaoServicoUsuario->num_rows;
}
