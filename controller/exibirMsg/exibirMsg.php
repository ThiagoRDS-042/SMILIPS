<?php
//função para automatizar a mensagem, onde recebe a mensagem e o tipo, e passa as variaveis para uma sessao
function exibirMsg($msg, $tipoMsg)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['mensagem'] = $msg;
    $_SESSION['tipo_msg'] = $tipoMsg;
}
