<link rel="stylesheet" href="/SMILIPS/view/css/notificacao/notificacao.css">
<?php if (isset($_SESSION['mensagem'])) : //separei para não ter que repetir em cada pagina, assim eu so uso o require_once e pronto?>
    <div class="alert <?php echo $_SESSION['tipo_msg'] ?>">
        <?php
            echo $_SESSION['mensagem'];
            unset($_SESSION['mensagem']);
        ?>
    </div>
<?php endif; ?>
