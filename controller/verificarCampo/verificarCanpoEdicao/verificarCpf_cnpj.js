let cpf_cnpj = $('#cpf_cnpj');
let idUser = $('#id');

cpf_cnpj.keyup(function buscar() {
    $.ajax({
        url: '/SMILIPS/controller/usuario/campoValidoEdicao.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "cpf_cnpj": cpf_cnpj.val(),
            "id": idUser.val()
        },
        success: function(msg) {
            $("#msgCpf_cnpj").html(msg);
        }
    });
});

cpf_cnpj.blur(function buscar() {
    $.ajax({
        url: '/SMILIPS/controller/usuario/campoValidoEdicao.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "cpf_cnpj": cpf_cnpj.val(),
            "id": idUser.val()
        },
        success: function(msg) {
            if (msg == '<i class="fas fa-check" style= "color:#27ae60;"></i>') {
                $("#msgCpf_cnpj").html('');
            } else {
                $("#msgCpf_cnpj").html('<i class="fas fa-check" style= "color:#e74c3c;"></i>');
            }
        }
    });
});