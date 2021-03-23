<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['usuarioID']) and isset($_SESSION['emailUsuario']) and isset($_SESSION['senhaUsuario'])) {
        header("location:/SMILIPS/view/pages/usuario/home.php");
    }else{
        header("location:/SMILIPS/view/pages/home.php");
    }
?>