<?php
    // iniciando sessao
    if(!isset($_SESSION)){
        session_start();
    }
    //destruindo as variaveis session de usuario para encerra a sesao
    if(isset($_SESSION['usuarioID'])){
        unset($_SESSION['usuarioID']);
        unset($_SESSION['emailUsuario']);
        unset($_SESSION['senhaUsuario']);
        unset($_SESSION['nomeUsuario']);
    }
    // redirecinando
    header("location:/SMILIPS/view/pages/login.php");

?>