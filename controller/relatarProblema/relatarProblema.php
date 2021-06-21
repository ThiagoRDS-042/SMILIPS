<?php
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

if (isset($_POST['enviar_email'])) {

  if ($_POST['nome'] != null and $_POST['email'] != null and $_POST['problema'] != null) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['problema'];

    ini_set("SMTP", "ASPMX.L.GOOGLE.COM");
    ini_set("sendmail_from", $email);

    $to = "projetopi089@gmail.com";

    $subject = "SMILIPS";

    $body = $mensagem;

    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8" . "\r\n";
    $headers .= "From: $nome<$email>";

    $send_mail = mail($to, $subject, $body, $headers);

    if ($send_mail) {
      exibirMsg("Email Enviado!", "success");
    } else {
      exibirMsg("Falha ao Enviar o Email!", "danger");
    }
  } else {
    exibirMsg("Preencha todos os Campos!", "danger");
  }
  header("location:/SMILIPS/view/pages/sistema/sobre.php");
}
