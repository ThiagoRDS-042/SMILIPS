const toggle = document.querySelector(".toggle");
const icons = document.querySelectorAll(".toggle i");
const navegation = document.querySelector(".navigation");

// alternado de icones e de tamanho do navigation
toggle.addEventListener("click", () => {
  icons.forEach((icon) => {
    icon.classList.toggle("hide");
  });
  toggle.classList.toggle("active");
  navegation.classList.toggle("active");
});
