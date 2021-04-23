function selecionarUm(incosDelete, checkboxs) {
  incosDelete.forEach((iconDelete, index) => {
    iconDelete.addEventListener("click", () => {
      checkboxs.forEach((checkbox) => {
        if (checkbox !== checkboxs[index]) {
          checkbox.checked = false;
        }
      });
    });
  });
}

function fecharPopupExcruir(btnsNao, checkboxs) {
  btnsNao.forEach((btnNao, index) => {
    btnNao.addEventListener("click", () => {
      checkboxs[index].checked = false;
    });
  });
}

export { selecionarUm, fecharPopupExcruir };
