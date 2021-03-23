let email = $('#email');
let id = $('#id');

email.keyup(function buscar() {
    $.ajax({
        url: '/SMILIPS/controller/usuario/campoValidoEdicao.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "email": email.val(),
            'id': id.val()
        },
        success: function(msg) {
            $("#msgEmail").html(msg);
        }
    });
});

email.blur(function buscar() {
    $.ajax({
        url: '/SMILIPS/controller/usuario/campoValidoEdicao.php',
        type: 'POST',
        dataType: 'html',
        data: {
            "email": email.val(),
            'id': id.val()
        },
        success: function(msg) {
            if (msg == '<i class="fas fa-check" style= "color:#27ae60;"></i>') {
                $("#msgEmail").html('');
            } else {
                $("#msgEmail").html('<i class="fas fa-check" style= "color:#e74c3c;"></i>');
            }
        }
    });
});