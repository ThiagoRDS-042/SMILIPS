<?php
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

    // passo o tipo da pagina para image/jpg
	Header("Content-type: image/jpg");
    
    // e exibo  a imagem
	echo $usuario['ftPerfil'];
?>