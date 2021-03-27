let email = $('#email');
//obs: separei em pastas diferentes a verificacao de campos de cadastro e edicao, pois ambos diferem nas mensagens a serem mostradas ao usaurio
// capturando o campo email

// acionando a funcao ao se digitar na campo
email.keyup(function buscar() {
    //usando a funcao ajax
    $.ajax({
        //url pra de onde virar as informacoes
        url: '/SMILIPS/controller/usuario/campoValidoCadastro.php',
        //tipo de envio
        type: 'POST',
        //tipo de dado
        dataType: 'html',
        data: {
            //o dado a ser enviando
            "email": email.val()
        },
        // funcao executada se a funcao ajax for be sucedida
        success: function(msg) {
            //passando para o campo msgEmail a mensagem retornada da url anterior
            $(".input-field #msgEmail").html(msg);
            if (msg == '<font color= "#055160"><b>Email Válido!</b></font>') {
                //atribuindo stilos ao campo email
                $(".input-field #email").css({ 'box-shadow': '1px 2px 3px #2ecc71' });
            } else {
                $(".input-field #email").css({ 'box-shadow': '1px 2px 3px #e74c3c' });
            }
        }
    });
});


//msma da de cima mas agora acionando a funcao ao campo email perder focu
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
            } else if ($(".input-field #email").val() == '') {
                $(".input-field #msgEmail").html('');
                $(".input-field #email").css({ 'box-shadow': 'none' });
            } else {
                $(".input-field #email").css({ 'box-shadow': '1px 2px 3px #e74c3c' });
                $(".input-field #msgEmail").html('<font color= "#842029"><b>Email Inválido!</b></font>');
            }
        }
    });
});