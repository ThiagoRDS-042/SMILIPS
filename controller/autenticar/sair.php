<?php
    //destruindo as variaveis sesion de usuario.
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['usuarioID'])){
        unset($_SESSION['usuarioID']);
        unset($_SESSION['emailUsuario']);
        unset($_SESSION['senhaUsuario']);
        unset($_SESSION['nomeUsuario']);
        session_destroy();
    }
    header("location:/SMILIPS/view/pages/login.php");

?>