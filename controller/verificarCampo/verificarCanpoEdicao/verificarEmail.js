const email = $("#email");
const idUser = $("#id");
const idAdm = $("#idAdm");

// ja explicado anteriormente porem a gora ao campo de edicao
email.keyup(function buscar() {
  const url = idUser.val()
    ? "/SMILIPS/controller/usuario/campoValidoEdicao.php"
    : "/SMILIPS/controller/administrador/campoValidoEdicao.php";
  const id = idUser.val() ? idUser.val() : idAdm.val();

  $.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: {
      email: email.val(),
      id: id,
    },
    success: function (msg) {
      $("#msgEmail").html(msg);
    },
  });
});

email.blur(function buscar() {
  const url = idUser.val()
    ? "/SMILIPS/controller/usuario/campoValidoEdicao.php"
    : "/SMILIPS/controller/administrador/campoValidoEdicao.php";
  const id = idUser.val() ? idUser.val() : idAdm.val();

  $.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: {
      email: email.val(),
      id: id,
    },
    success: function (msg) {
      if (msg == '<i class="fas fa-check" style= "color:#27ae60;"></i>') {
        $("#msgEmail").html("");
      } else {
        $("#msgEmail").html(
          '<i class="fas fa-check" style= "color:#e74c3c;"></i>'
        );
      }
    },
  });
});
