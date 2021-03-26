<?php
    require_once('/xampp/htdocs/SMILIPS/controller/conexao/conexao.php');
    $id = "";
    $nomeUsuario = "";
    $cpf_cnpj = "";
    $emailUsuario = "";
    $telefone = "";
    $bairro = "";
    $endereco = "";
    $complemento = "";
    $ftPerfil = "";
    $situacao = "";

    if (isset($_GET['consultar'])) {
        $id = $_GET['consultar'];
        $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);

        if ($usuario->num_rows == 1) {
            $usuario = $usuario->fetch_array();

            $id = $usuario['usuarioID'];
            $nomeUsuario = $usuario['nomeUsuario'];
            $cpf_cnpj = $usuario['cpf_cnpj'];
            $emailUsuario = $usuario['emailUsuario'];
            $bairro = $usuario['bairro'];
            $endereco = $usuario['endereco'];
            $complemento = $usuario['complemento'];
            $telefone = $usuario['telefone'];
            $ftPerfil = $usuario['ftPerfil'];
        }
    }

    function consultarFtPerfil(){
        global $conexao, $ftPerfil;
        $id = $_SESSION['usuarioID'];

        $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
        $usuario = $usuario->fetch_array();
        $ftPerfil = $usuario['ftPerfil'];
    }

    function consultarSituacao(){
        global $conexao, $situacao;
        $id = $_SESSION['usuarioID'];

        $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
        $usuario = $usuario->fetch_array();
        $situacao = $usuario['situacao'];
    }

    function consultarNome(){
        global $conexao, $nomeUsuario;
        $id = $_SESSION['usuarioID'];

        $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
        $usuario = $usuario->fetch_array();
        $nomeUsuario = $usuario['nomeUsuario'];
    }
    
?>