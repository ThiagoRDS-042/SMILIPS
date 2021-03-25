<?php
    require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');

    if (!isset($_SESSION)) {
        session_start();
    }
    
    $id = $_SESSION['usuarioID'];

    $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);

    $usuario = $usuario->fetch_array();

	Header("Content-type: image/jpg");
    
	echo $usuario['ftPerfil'];
?>