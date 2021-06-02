const perguntas = document.querySelectorAll(".pergunta");

perguntas.forEach((pergunta, index) => {
  const iconDrop = pergunta.querySelector("i");
  console.log(iconDrop);
  iconDrop.addEventListener("click", () => {
    perguntas[index].classList.toggle("Active");
  });
});
