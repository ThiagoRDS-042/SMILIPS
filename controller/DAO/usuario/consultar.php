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
    $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);

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

    $usuarios = $conexao->query("SELECT * FROM usuario") or die($conexao->error);
}

function consultarMsgImovelInvalido()
{
    $id = $_SESSION['usuarioID'];
    global $conexao, $msgImovelInvalido;

    $msgImovelInvalido = $conexao->query("SELECT * FROM msgImovelInvalido WHERE usuarioID = '$id' ORDER BY msgImovelInvalidoID DESC") or die($conexao->error);

    if ($msgImovelInvalido->num_rows > 0) {
        $msgImovelInvalido = $msgImovelInvalido->fetch_assoc();
        $msgImovelInvalido = $msgImovelInvalido['mensagem'];
        // exibirMsg("Seu Imóvel não foi Aceito por apresentar $msgImovelInvalido", "danger");
    }
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
