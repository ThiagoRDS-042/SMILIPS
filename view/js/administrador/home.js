const cards = document.querySelectorAll("main .card");
cards.forEach((card) => {
  card.addEventListener("click", () => {
    card === cards[0]
      ? (location = "/SMILIPS/view/pages/administrador/manterPlanos.php")
      : card === cards[1]
      ? (location =
          "/SMILIPS/view/pages/administrador/manterTiposDeServicos.php")
      : (location = "/SMILIPS/view/pages/administrador/gerenciarUsuarios.php");
  });
});
