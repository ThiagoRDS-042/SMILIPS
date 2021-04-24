const telefone = $("#telefone");

// mesma coisa so q pra edicao
telefone.keyup(function buscar() {
  if (
    /^(\+\d{2}\s)?(\(\d{2}\)\s)?(9\.|9)?\d{4}[-]?\d{4}$/.test(telefone.val())
  ) {
    $("#msgTelefone").html(
      '<i class="fas fa-check" style= "color:#27ae60;"></i>'
    );
  } else {
    $("#msgTelefone").html(
      '<i class="fas fa-check" style= "color:#e74c3c;"></i>'
    );
  }
});

telefone.blur(function buscar() {
  if (
    /^(\+\d{2}\s)?(\(\d{2}\)\s)?(9\.|9)?\d{4}[-]?\d{4}$/.test(telefone.val())
  ) {
    $("#msgTelefone").html("");
  } else {
    $("#msgTelefone").html(
      '<i class="fas fa-check" style= "color:#e74c3c;"></i>'
    );
  }
});
