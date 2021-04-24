// capturando os elementos da DOM
const toggle = document.querySelector(".toggle");
const icons = document.querySelectorAll(".toggle i");
const navegation = document.querySelector(".navigation");

// adicionando/removendo a classe hide do icon e adicionando/removendo a classe active do navegation e toggle, sempre que o toggle e clicado
toggle.addEventListener("click", () => {
  icons.forEach((icon) => {
    icon.classList.toggle("hide");
  });
  toggle.classList.toggle("active");
  navegation.classList.toggle("active");
});
