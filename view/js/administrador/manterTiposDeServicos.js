const body = document.querySelector("body");
const txtTipoDeServico = document.querySelector("input[name=tipo-de-servico]");

body.addEventListener("load", () => {
  txtTipoDeServico.value = "";
});
