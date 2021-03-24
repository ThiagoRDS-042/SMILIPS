<?php
    //destruindo as variaveis session de usuario.
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['usuarioID'])){
        unset($_SESSION['usuarioID']);
        unset($_SESSION['emailUsuario']);
        unset($_SESSION['senhaUsuario']);
        unset($_SESSION['nomeUsuario']);
    }
    header("location:/SMILIPS/view/pages/login.php");

?>