let email = $('#email');

email.keyup(function buscar() {
    $.ajax({
        url: '/SMILIPS/controller/usuario/campoValidoCadastro.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "email": email.val()
        },
        success: function(msg) {
            $(".input-field #msgEmail").html(msg);
            if (msg == '<font color= "#055160"><b>Email Válido!</b></font>') {
                $(".input-field #email").css({ 'box-shadow': '1px 2px 3px #2ecc71' });
            } else {
                $(".input-field #email").css({ 'box-shadow': '1px 2px 3px #e74c3c' });
            }
        }
    });
});

email.blur(function buscar() {
    $.ajax({
        url: '/SMILIPS/controller/usuario/campoValidoCadastro.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "email": email.val()
        },
        success: function(msg) {
            if (msg == '<font color= "#055160"><b>Email Válido!</b></font>') {
                $(".input-field #msgEmail").html('');
                $(".input-field #email").css({ 'box-shadow': 'none' });
            } else {
                $(".input-field #email").css({ 'box-shadow': '1px 2px 3px #e74c3c' });
                $(".input-field #msgEmail").html('<font color= "#842029"><b>Email Inválido!</b></font>');
            }
        }
    });
});