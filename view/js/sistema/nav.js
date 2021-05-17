// pegando o span que contem os dois icones
const icon = document.querySelector("nav .icon");
const icons = document.querySelectorAll("nav .icon i");

// add um evento de click no span para alternar de icone
icon.addEventListener("click", () => {
  icons[0].classList.toggle("hide");
  icons[1].classList.toggle("hide");
});

window.addEventListener("scroll", () => {
  const nav = document.querySelector("nav");
  const a = document.querySelector("nav a");

  if (window.scrollY > 570) {
    // nav.style.background = "#ff6914";
    nav.classList.add("active");
  } else {
    // nav.style.background = "rgba(0, 0, 0, 0.5)";
    nav.classList.remove("active");
  }
});
