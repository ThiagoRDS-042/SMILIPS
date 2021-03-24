<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolher Imagem de Perfil</title>
</head>
<body>
<h1>IMG</h1>

<button>enviar</button>

<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    require_once('/xampp/htdocs/SMILIPS/controller/usuario/consultar.php');
    echo "<script>
        document.querySelector('button').onclick = () => window.opener.location.href = '/SMILIPS/view/pages/usuario/perfil.php?consultar=$_SESSION[usuarioID]';
    </script>";
?>
   
    
    <script src="/SMILIPS/view/js/usuario/escolherImg.js"></script>
</body>
</html>