<?php
    require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
    $id = $_SESSION['usuarioID'];

    $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
    $usuario = $usuario->fetch_array();
    $ftPerfilHeader = $usuario['ftPerfil'];

?>