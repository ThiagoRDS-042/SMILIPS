// capturando todos os elementos numeracao
const numeracoes = document.querySelectorAll(".numeracao");
// iniciando o contador
let count = 1;

// adicionando o valor do contador a cada elemento numeracao e incrementeando o contador
numeracoes.forEach((numeracao) => {
  numeracao.innerText = count;
  count++;
});
