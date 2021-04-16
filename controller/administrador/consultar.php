<?php
require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
$id = "";
$email = "";

if (isset($_GET['consultar'])) {
    $id = $_GET['consultar'];
    //consultando do banco todos os dados do administrador em questao
    $administrador = $conexao->query("SELECT * FROM administrador WHERE administradorID = '$id'") or die($conexao->error);

    if ($administrador->num_rows == 1) {
        //verificando se encontrou algo
        $administrador = $administrador->fetch_array();
        // tranformando em array

        // capturando os dados
        $id = $administrador['administradorID'];
        $email = $administrador['email'];
    }
}
