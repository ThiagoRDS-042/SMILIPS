let senha = $('#senha');

//mesma coisa da pagina de email porem sem usar ajax pq n pretendo fazer requisicoes ao DB
senha.keyup(function buscar() {

    //verificando se a senha possui formato valido
    if (/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/.test(senha.val())) {

        // adicionando conteudo a msgSenha e estilo ao campo senha
        $(".input-field #msgSenha").html('<font color="#055160"><b>Senha Válida!</b></font>');
        $(".input-field #senha").css({ 'box-shadow': '1px 2px 3px #2ecc71' });

    } else {

        $(".input-field #msgSenha").html('<font color="#842029"><b>Senha Inválida!</b></font>');
        $(".input-field #senha").css({ 'box-shadow': '1px 2px 3px #e74c3c' });

    }

});

senha.blur(function buscar() {

    //mesma coisa da do email so q sem ajax
    if (/(?=^\w{8,35}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])/.test(senha.val())) {
        $(".input-field #msgSenha").html('');
        $(".input-field #senha").css({ 'box-shadow': 'none' });
    } else if (senha.val() == '') {
        $(".input-field #msgSenha").html('');
        $(".input-field #senha").css({ 'box-shadow': 'none' });
    } else {
        $(".input-field #msgSenha").html('<font color="#842029"><b>Senha Inválida!</b></font>');
        $(".input-field #senha").css({ 'box-shadow': '1px 2px 3px #e74c3c' });
    }

});