<?php
    //função para automatizar a mensagem
    function exibirMsg($msg,$tipoMsg){
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['mensagem'] = $msg;
        $_SESSION['tipo_msg'] = $tipoMsg;
    }
?>