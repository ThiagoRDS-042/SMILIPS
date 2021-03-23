<?php
    require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
    usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        require_once('/xampp/htdocs/SMILIPS/view/head.html');
        require_once('/xampp/htdocs/SMILIPS/controller/usuario/consultar.php');
    ?>
    <link rel="stylesheet" href="/SMILIPS/view/css/usuario/perfil.css">
    <title>Perfil</title>
</head>
<body>

    <?php
        require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.html');
    ?>
    
    <section>
        <?php
            require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.php');
        ?>
    </section>

    <main>
        
        <div class="title-perfil">     
            <h1>Informações Pessoais</h1>
        </div>

        <div class="perfil">
            <?php
                require_once('/xampp/htdocs/SMILIPS/controller/exibirMsg/notificacao.php');
            ?>
            <div class="img-user">
                <a href="#">
                    <img src="/SMILIPS/view/images/user.png" alt="Imagem do Usuário">
                    <span><i class="far fa-edit"></i>Editar</span>
                </a>
            </div>
            <div class="content">
                <form action="/SMILIPS/controller/usuario/usuarioDAO.php" method="post">
                    <div class="info-user">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="field-edit">
                            <input type="text" class="focus" name="nome" value="<?php echo $nomeUsuario ?>">
                            <span data-placeholder="Nome*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="cpf_cnpj" value="<?php echo $cpf_cnpj ?>">
                            <span data-placeholder="CPF/CNPJ*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="email" value="<?php echo $emailUsuario ?>">
                            <span data-placeholder="Email*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="telefone" value="<?php echo $telefone ?>">
                            <span data-placeholder="Telefone*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="endereco" value="<?php echo $endereco ?>">
                            <span data-placeholder="Endereco*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="bairro" value="<?php echo $bairro ?>">
                            <span data-placeholder="Bairro*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="complemento" value="<?php echo $complemento ?>">
                            <span data-placeholder="Complemento"></span>
                        </div>
                        
                    </div>
                    <div class="editar">
                        <button type="submit" name="editar">Editar</button>
                    </div>
                </form>
            </div>
        </div>
        
    </main>

    <script src="/SMILIPS/view/js/usuario/perfil.js"></script>
    
</body>
</html>