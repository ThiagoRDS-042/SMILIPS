// funcao pra so deixar marca um checkbox por vez
function selecionarUm(incosDelete, checkboxs) {
  // percorrendo todos os icones
  incosDelete.forEach((iconDelete, index) => {
    // adicionando um evento de click ao icone
    iconDelete.addEventListener("click", () => {
      // percorrendo todos os checkboxs
      checkboxs.forEach((checkbox) => {
        // se o checkbox q o forEach esta agora for diferente do que foi clicado, ele recebe false
        // fazendo como q so seja possivel marca um checkbox por vez
        if (checkbox !== checkboxs[index]) {
          checkbox.checked = false;
        }
      });
    });
  });
}

// funcao para fechar o popup ao clicar no btn nao
function fecharPopupExcluir(btnsNao, checkboxs) {
  // percorrendo todos os btn nao
  btnsNao.forEach((btnNao, index) => {
    // adicionando um evento de click ao btn nao
    btnNao.addEventListener("click", () => {
      // desmarcando o checkbox e fechando o popup
      checkboxs[index].checked = false;
    });
  });
}

// exportando as duas funcoes
export { selecionarUm, fecharPopupExcluir };
