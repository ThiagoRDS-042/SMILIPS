<?php
    require_once('/xampp/htdocs/SMILIPS/controller/autenticar/verificarUsuarioLogado.php');
    usuarioLogadoEntra();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        require_once('/xampp/htdocs/SMILIPS/view/head.php');
        require_once('/xampp/htdocs/SMILIPS/controller/usuario/consultar.php');
    ?>
    <link rel="stylesheet" href="/SMILIPS/view/css/usuario/perfil.css">
    <title>Perfil</title>
</head>
<body>

    <?php
        require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/header.php');
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
            <input type="checkbox" id="btn">
            <label for="btn">
                <div class="img-user">
                    <img src="/SMILIPS/view/images/user.png" alt="Imagem do Usuário">
                    <span><i class="fas fa-camera"></i></span>
                </div>
            </label>
                <form action="#" method="post" class="escolher-img">
                    <div class="title-escolher-img">
                        <h1>Selecionar Foto de Perfil</h1>
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="content-escolher-img">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <input type="file" name="perfil">
                    </div>
                    <div class="footer-escolher-img">
                        <button class="btn-cancelar" type="button">Cancelar</button>
                        <button class="btn-selecionar" type="submit">Selecionar</button>
                    </div>   
                </form>
            <div class="content">
                <form action="/SMILIPS/controller/usuario/usuarioDAO.php" method="post">
                    <div class="info-user">
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                        <div class="field-edit">
                            <input type="text" class="focus" name="nome" value="<?php echo $nomeUsuario ?>">
                            <span class="info" data-placeholder="Nome*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="cpf_cnpj" id="cpf_cnpj" value="<?php echo $cpf_cnpj ?>">
                            <span class="info" data-placeholder="CPF/CNPJ*"></span>
                            <span id="msgCpf_cnpj" class="msg"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="email" id="email" value="<?php echo $emailUsuario ?>">
                            <span class="info" data-placeholder="Email*"></span>
                            <span id="msgEmail" class="msg"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="telefone" id="telefone" value="<?php echo $telefone ?>">
                            <span class="info" data-placeholder="Telefone*"></span>
                            <span id="msgTelefone" class="msg"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="endereco" value="<?php echo $endereco ?>">
                            <span class="info" data-placeholder="Endereco*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="bairro" value="<?php echo $bairro ?>">
                            <span class="info" data-placeholder="Bairro*"></span>
                        </div>
                        <div class="field-edit">
                            <input type="text" class="focus" name="complemento" value="<?php echo $complemento ?>">
                            <span class="info" data-placeholder="Complemento"></span>
                        </div>
                        
                    </div>
                    <div class="editar">
                        <button type="submit" name="editarInfo">Editar</button>
                    </div>
                </form>
            </div>
        </div>
        
    </main>

    <?php
        require_once('/xampp/htdocs/SMILIPS/view/pages/usuario/footer.php');
    ?>

    <script src="/SMILIPS/view/js/usuario/perfil.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarEmail.js"></script>
    <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarCpf_cnpj.js"></script>
    <script src="/SMILIPS/controller/verificarCampo/verificarCanpoEdicao/verificarTelefone.js"></script>
</body>
</html>