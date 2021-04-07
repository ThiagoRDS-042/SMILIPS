<?php
// passo o tipo da pagina para image/jpg
// cabeçalho http
Header("Content-type: image/jpg");
// página q ira carregar a imagem de perfil do usuario
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

//inicio a sessao
if (!isset($_SESSION)) {
    session_start();
}

//pego o id do usuairo
$id = $_SESSION['usuarioID'];

//trago suas informacoes
$usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);

//transformo em array
$usuario = $usuario->fetch_array();

// e exibo  a imagem
echo $usuario['ftPerfil'];
