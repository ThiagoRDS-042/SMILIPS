<?php
require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/exibirMsg.php');

// se enviar_email existir
if (isset($_POST['enviar_email'])) {

  // se n forem nulos
  if ($_POST['nome'] != null and $_POST['email'] != null and $_POST['problema'] != null) {
    // pegando os valores
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['problema'];

    // sobrescrevendo o host smtp e quem envia o email
    ini_set("SMTP", "ASPMX.L.GOOGLE.COM");
    ini_set("sendmail_from", $email);

    // pra quem vai o email
    $to = "projetopi089@gmail.com";

    // titulo
    $subject = "SMILIPS";

    // corpo da mensagem
    $body = $mensagem;

    // os cabeçalhos
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html;charset=utf-8" . "\r\n";
    $headers .= "From: $nome<$email>";

    // mandando o email e recuperando seu valor, true se der certo e false se der errado
    $send_mail = mail($to, $subject, $body, $headers);

    if ($send_mail) {
      // enviando a msn
      exibirMsg("Email Enviado!", "success");
    } else {
      // enviando a msn
      exibirMsg("Falha ao Enviar o Email!", "danger");
    }
  } else {
    // enviando a msn
    exibirMsg("Preencha todos os Campos!", "danger");
  }
  // redirecionando
  header("location:/SMILIPS/view/pages/sistema/sobre.php");
}
