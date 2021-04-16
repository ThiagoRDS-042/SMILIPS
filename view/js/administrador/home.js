const cards = document.querySelectorAll("main .card");
// redirecionando ao clicar nos cards na tela inicial do usuario
cards.forEach((card) => {
  card.addEventListener("click", () => {
    card === cards[0]
      ? (location = "/SMILIPS/view/pages/administrador/manterPlanos.php")
      : card === cards[1]
      ? (location =
          "/SMILIPS/view/pages/administrador/manterTiposDeServicos.php")
      : card === cards[2]
      ? (location = "/SMILIPS/view/pages/administrador/gerenciarUsuarios.php")
      : (location =
          "/SMILIPS/view/pages/administrador/gerenciarAdministradores.php");
  });
});
