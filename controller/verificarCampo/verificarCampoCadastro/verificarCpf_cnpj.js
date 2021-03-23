let cpf_cnpj = $('#cpf_cnpj');

cpf_cnpj.keyup(function buscar() {
    $.ajax({
        url: '/SMILIPS/controller/usuario/campoValidoCadastro.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "cpf_cnpj": cpf_cnpj.val()
        },
        success: function(msg) {
            $(".input-field #msgCpf_cnpj").html(msg);
            if (msg == '<font color= "#055160"><b>CPF ou CNPJ Válido!</b></font>') {
                $(".input-field #cpf_cnpj").css({ 'box-shadow': '1px 2px 3px #2ecc71' });
            } else {
                $(".input-field #cpf_cnpj").css({ 'box-shadow': '1px 2px 3px #e74c3c' });
            }
        }
    });
});

cpf_cnpj.blur(function buscar() {
    $.ajax({
        url: '/SMILIPS/controller/usuario/campoValidoCadastro.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "cpf_cnpj": cpf_cnpj.val()
        },
        success: function(msg) {
            if (msg == '<font color= "#055160"><b>CPF ou CNPJ Válido!</b></font>') {
                $(".input-field #msgCpf_cnpj").html('');
                $(".input-field #cpf_cnpj").css({ 'box-shadow': 'none' });
            } else {
                $(".input-field #cpf_cnpj").css({ 'box-shadow': '1px 2px 3px #e74c3c' });
                $(".input-field #msgCpf_cnpj").html('<font color= "#842029"><b>CPF ou CNPJ Inválido!</b></font>');
            }
        }
    });
});