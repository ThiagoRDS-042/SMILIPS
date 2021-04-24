<link rel="stylesheet" href="/SMILIPS/view/css/notificacao/notificacao.css">
<!-- Mensagem q vai ser exibida, que rebece via sessao seu conteudo e tipo de mensagem -->
<?php if (isset($_SESSION['mensagem'])) : ?>
    <div class="alert <?php echo $_SESSION['tipo_msg'] //passando o tipo de mensagem
                        ?>">
        <?php
        // exibindo a mensagem
        echo $_SESSION['mensagem'];
        // destroindo as variaveis de sessao criadas anteriormente
        unset($_SESSION['mensagem']);
        unset($_SESSION['tipo_msg']);
        ?>
    </div>
<?php endif; ?>