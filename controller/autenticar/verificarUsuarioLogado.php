<?php
    // iniciando sessao
    if (!isset($_SESSION)) {
        session_start();
    }

    // funcao para so deixar usuarios logados entrarem em dadas paginas
    function usuarioLogadoNEntra(){
        if (isset($_SESSION['usuarioID']) and isset($_SESSION['emailUsuario']) and isset($_SESSION['senhaUsuario'])) {
            header("location:/SMILIPS/view/pages/usuario/home.php");
        }
    }
    
    // funcao para so deixar usuarios nao logados entrarem em dadas paginas
    function usuarioLogadoEntra(){
        if (!isset($_SESSION['usuarioID']) and !isset($_SESSION['emailUsuario']) and !isset($_SESSION['senhaUsuario'])) {
            header("location:/SMILIPS/view/pages/login.php");
        }
    }
?>