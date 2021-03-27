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
        //consultando do banco todos os dados do usurio em questao
        $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);

        if ($usuario->num_rows == 1) {
            //verificando se encontrou algo
            $usuario = $usuario->fetch_array();
            // tranformando em array

            // capturando os dados
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

    // funcao pra retornar a ft de perfil do usurio
    function consultarFtPerfil(){
        // decalrando q sao variveis globais
        global $conexao, $ftPerfil;
        $id = $_SESSION['usuarioID'];

        // consulta no banco transforma em array e armazena na variavel
        //nao faco a verificacao pra saber se retornou aldo, pq assumo q essa funcao so sera chamada caso aja um usuario logado
        $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
        $usuario = $usuario->fetch_array();
        $ftPerfil = $usuario['ftPerfil'];
    }

    // funcao pra retornar a situacao do usurio
    function consultarSituacao(){
        global $conexao, $situacao;
        $id = $_SESSION['usuarioID'];

        // consulta no banco transforma em array e armazena na variavel
        //nao faco a verificacao pra saber se retornou aldo, pq assumo q essa funcao so sera chamada caso aja um usuario logado
        $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
        $usuario = $usuario->fetch_array();
        $situacao = $usuario['situacao'];
    }

    // funcao pra retornar o nome  do usurio
    function consultarNome(){
        global $conexao, $nomeUsuario;
        $id = $_SESSION['usuarioID'];

        // consulta no banco transforma em array e armazena na variavel
        //nao faco a verificacao pra saber se retornou aldo, pq assumo q essa funcao so sera chamada caso aja um usuario logado
        $usuario = $conexao->query("SELECT * FROM usuario WHERE usuarioID = '$id'") or die($conexao->error);
        $usuario = $usuario->fetch_array();
        $nomeUsuario = $usuario['nomeUsuario'];
    }
    
?>