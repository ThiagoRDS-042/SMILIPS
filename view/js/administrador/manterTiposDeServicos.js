const body = document.querySelector("body");
const txtTipoDeServico = document.querySelector("input[name=tipo-de-servico]");

body.addEventListener("load", () => {
  txtTipoDeServico.value = "";
});

const checkboxs = document.querySelectorAll(
  "table tbody tr td input[type=checkbox]"
);
const incosDelete = document.querySelectorAll(
  "table tbody tr td i.fa-trash-alt"
);

incosDelete.forEach((iconDelete, index) => {
  iconDelete.addEventListener("click", () => {
    checkboxs.forEach((checkbox) => {
      if (checkbox !== checkboxs[index]) {
        checkbox.checked = false;
      }
    });
  });
});

const btnsNao = document.querySelectorAll("table tbody tr td .excluir .btnNao");

btnsNao.forEach((btnNao, index) => {
  btnNao.addEventListener("click", () => {
    checkboxs[index].checked = false;
  });
});
