<?php
    require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
    usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        require_once('/xampp/htdocs/SMILIPS/view/head.html');
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
            require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/menu.html');
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
                        <div class="field-edit">
                            <input type="text" name="nome">
                            <span data-placeholder="Nome*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" name="cpf_cnpj">
                            <span data-placeholder="CPF/CNPJ*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" name="email">
                            <span data-placeholder="Email*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" name="telefone">
                            <span data-placeholder="Telefone*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" name="endereco">
                            <span data-placeholder="Endereco*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" name="bairro">
                            <span data-placeholder="Bairro*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" name="comlemento">
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