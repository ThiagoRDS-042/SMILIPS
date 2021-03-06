let telefone = $("#telefone");
//como ja expliquei nas paginas anteriores, e ambas as funcoes sao muito semelhantes na explicarei aqui novamente

telefone.keyup(function buscar() {
  if (
    /^(\+\d{2}\s)?(\(\d{2}\)\s)?(9\.|9)?\d{4}[-]?\d{4}$/.test(telefone.val())
  ) {
    $(".input-field #msgTelefone").html(
      '<font color="#27ae60"><b>Telefone Válido!</b></font>'
    );
    $(".input-field #telefone").css({ "box-shadow": "1px 2px 3px #2ecc71" });
  } else if (telefone.val() == "") {
    $(".input-field #msgTelefone").html(
      '<font color="#e74c3c"><b>Telefone Inválido! (Preencha o Campo)</b></font>'
    );
    $(".input-field #telefone").css({ "box-shadow": "1px 2px 3px #e74c3c" });
  } else {
    $(".input-field #msgTelefone").html(
      '<font color="#e74c3c"><b>Telefone Inválido! (Formato Inválido)</b></font>'
    );
    $(".input-field #telefone").css({ "box-shadow": "1px 2px 3px #e74c3c" });
  }
});

telefone.blur(function buscar() {
  if (
    /^(\+\d{2}\s)?(\(\d{2}\)\s)?(9\.|9)?\d{4}[-]?\d{4}$/.test(telefone.val()) ||
    telefone.val() == ""
  ) {
    $(".input-field #msgTelefone").html("");
    $(".input-field #telefone").css({ "box-shadow": "none" });
  } else {
    $(".input-field #msgTelefone").html(
      '<font color="#e74c3c"><b>Telefone Inválido! (Formato Inválido)</b></font>'
    );
    $(".input-field #telefone").css({ "box-shadow": "1px 2px 3px #e74c3c" });
  }
});
