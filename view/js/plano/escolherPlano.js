const numeracoes = document.querySelectorAll(".numeracao");
let count = 1;

numeracoes.forEach((numeracao) => {
  numeracao.innerText = count;
  count++;
});
