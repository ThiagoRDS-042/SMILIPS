const cards = document.querySelectorAll("main .card-container .card");
cards.forEach((card) => {
  card.addEventListener("click", () => {
    card === cards[0]
      ? (location = "/SMILIPS/view/pages/usuario/imovel/cadastro.php")
      : card === cards[1]
      ? (location = "#")
      : (location = "#");
  });
});
