<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    function usuarioLogadoNEntra(){
        if (isset($_SESSION['usuarioID']) and isset($_SESSION['emailUsuario']) and isset($_SESSION['senhaUsuario'])) {
            header("location:/SMILIPS/view/pages/usuario/home.php");
        }
    }
    
    function usuarioLogadoEntra(){
        if (!isset($_SESSION['usuarioID']) and !isset($_SESSION['emailUsuario']) and !isset($_SESSION['senhaUsuario'])) {
            header("location:/SMILIPS/view/pages/login.php");
        }
    }
?>