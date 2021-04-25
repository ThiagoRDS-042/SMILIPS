// funcao pra add classe active ao select, isso abrirar a lista de options
function addClass(select, listsOption) {
    // se o select for clicado add/remove a classe active
  select.addEventListener("click", () => {
    listsOption.classList.toggle("active");
  });
}

// funcao para sobrescrever o texto do select pelo option selecionado
function editSelect(listOption, select, listsOption) {
  // percorrendo a lista de options
  listOption.forEach((option) => {
    // add o evento de click a cada option da lista
    option.addEventListener("click", () => {
      // sobrescrevendo o valor do select pelo valor do option clicado
      select.innerHTML = option.querySelector("span").innerHTML;
      // removendo a classe active do select, isso fechar a lista de options
      listsOption.classList.remove("active");
    });
  });
}

// exportando as duas funcoes
export { addClass, editSelect };
