// capturando todos os cards
const cards = document.querySelectorAll("main .card");

// redirecionando ao clicar nos cards na tela inicial do usuario
cards.forEach((card) => {
  card.addEventListener("click", () => {
    card === cards[0]
      ? (location = "/SMILIPS/view/pages/administrador/manterPlanos.php")
      : card === cards[1]
      ? (location = "/SMILIPS/view/pages/administrador/manterServicos.php")
      : card === cards[2]
      ? (location = "/SMILIPS/view/pages/administrador/usuarios.php")
      : card === cards[3]
      ? (location = "/SMILIPS/view/pages/administrador/imoveis.php")
      : (location = "/SMILIPS/view/pages/administrador/denuncias.php");
  });
});
