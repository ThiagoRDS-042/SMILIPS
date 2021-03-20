let senha = $('#senha');

senha.keyup(function buscar() {

    if (/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])/.test(senha.val())) {

        $(".input-field #msgSenha").html('<font color="#055160"><b>Senha Válida!</b></font>');
        $(".input-field #senha").css({ 'box-shadow': '1px 2px 3px #2ecc71' });

    } else {

        $(".input-field #msgSenha").html('<font color="#842029"><b>Senha Inválida!</b></font>');
        $(".input-field #senha").css({ 'box-shadow': '1px 2px 3px #e74c3c' });

    }

});

senha.blur(function buscar() {

    if (/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])/.test(senha.val())) {
        $(".input-field #msgSenha").html('');
        $(".input-field #senha").css({ 'box-shadow': 'none' });
    } else {
        $(".input-field #msgSenha").html('<font color="#842029"><b>Senha Inválida!</b></font>');
        $(".input-field #senha").css({ 'box-shadow': '1px 2px 3px #e74c3c' });
    }

});

senha.focus(function buscar() {
    console.log(senha.val() == '');
    if (senha.val() == '') {

    } else if (/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])/.test(senha.val())) {

        $(".input-field #msgSenha").html('<font color="#055160"><b>Senha Válida!</b></font>');
        $(".input-field #senha").css({ 'box-shadow': '1px 2px 3px #2ecc71' });

    } else {

        $(".input-field #msgSenha").html('<font color="#842029"><b>Senha Inválida!</b></font>');
        $(".input-field #senha").css({ 'box-shadow': '1px 2px 3px #e74c3c' });

    }

});